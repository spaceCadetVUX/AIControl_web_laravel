<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the blogs.
     */
    public function index(Request $request)
    {
        $query = Blog::with('author');

        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter by status
        if ($request->has('status') && $request->status != '') {
            if ($request->status == 'published') {
                $query->where('is_published', true);
            } elseif ($request->status == 'draft') {
                $query->where('is_published', false);
            }
        }

        // Get all unique categories for filter dropdown
        $categories = Blog::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        $blogs = $query->latest()->paginate(15);

        return view('admin.blogs.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new blog.
     */
    public function create()
    {
        // Get existing categories for dropdown
        $categories = Blog::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        // Get existing tags for suggestions
        $allTags = Blog::whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        return view('admin.blogs.create', compact('categories', 'allTags'));
    }

    /**
     * Store a newly created blog in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:blogs,slug',
            'excerpt' => 'required',
            'content' => 'required',
            'category' => 'nullable|max:100',
            'tags' => 'nullable|array',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'canonical_url' => 'nullable|url',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Make sure slug is unique
            $count = 1;
            $originalSlug = $validated['slug'];
            while (Blog::where('slug', $validated['slug'])->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '-' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/AIcontrol_imgs/AllBlogsImgs'), $filename);
            $validated['featured_image'] = 'assets/AIcontrol_imgs/AllBlogsImgs/' . $filename;
        }

        // Set author
        $validated['author_id'] = Auth::id();

        // Handle publish/draft action from button
        $action = $request->input('action', 'publish');
        $validated['is_published'] = ($action === 'publish') ? true : false;
        
        // Set published date - check for empty string or null
        if ($validated['is_published']) {
            if (empty($validated['published_at']) || $validated['published_at'] === '') {
                $validated['published_at'] = now();
            }
        } else {
            // If saving as draft, clear the published date
            $validated['published_at'] = null;
        }

        // Set indexable default
        $validated['indexable'] = $request->has('indexable') ? true : true; // Default to true

        $blog = Blog::create($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Bài viết đã được tạo thành công!');
    }

    /**
     * Display the specified blog.
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified blog.
     */
    public function edit(Blog $blog)
    {
        // Get existing categories for dropdown
        $categories = Blog::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');

        // Get existing tags for suggestions
        $allTags = Blog::whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        return view('admin.blogs.edit', compact('blog', 'categories', 'allTags'));
    }

    /**
     * Update the specified blog in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'nullable|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'required',
            'content' => 'required',
            'category' => 'nullable|max:100',
            'tags' => 'nullable|array',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
            'canonical_url' => 'nullable|url',
        ]);

        // Generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
            
            // Make sure slug is unique (excluding current blog)
            $count = 1;
            $originalSlug = $validated['slug'];
            while (Blog::where('slug', $validated['slug'])->where('id', '!=', $blog->id)->exists()) {
                $validated['slug'] = $originalSlug . '-' . $count;
                $count++;
            }
        }

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
                unlink(public_path($blog->featured_image));
            }

            $image = $request->file('featured_image');
            $filename = time() . '-' . Str::slug($validated['title']) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/AIcontrol_imgs/AllBlogsImgs'), $filename);
            $validated['featured_image'] = 'assets/AIcontrol_imgs/AllBlogsImgs/' . $filename;
        }

        // Handle publish status
        $validated['is_published'] = $request->has('is_published') ? true : false;
        
        // Set published date
        if ($validated['is_published'] && empty($blog->published_at) && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Set indexable
        $validated['indexable'] = $request->has('indexable') ? true : true;

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Bài viết đã được cập nhật thành công!');
    }

    /**
     * Remove the specified blog from storage.
     */
    public function destroy(Blog $blog)
    {
        // Delete featured image if exists
        if ($blog->featured_image && file_exists(public_path($blog->featured_image))) {
            unlink(public_path($blog->featured_image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Bài viết đã được xóa thành công!');
    }

    /**
     * Upload image for TinyMCE editor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/AIcontrol_imgs/AllBlogsImgs'), $filename);
            
            return response()->json([
                'location' => asset('assets/AIcontrol_imgs/AllBlogsImgs/' . $filename)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
