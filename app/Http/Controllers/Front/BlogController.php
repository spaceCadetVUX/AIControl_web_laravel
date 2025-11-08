<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of published blogs
     */
    public function index(Request $request)
    {
        // Start with published blogs query
        $query = Blog::where('is_published', true);

        // Filter by blog categories (new structured categories)
        if ($request->has('blog_category') && !empty($request->blog_category)) {
            $categoryIds = $request->blog_category;
            $query->whereHas('blogCategories', function($q) use ($categoryIds) {
                $q->whereIn('blog_categories.id', $categoryIds);
            });
        }

        // Get filtered blogs
        $blogs = $query->orderBy('created_at', 'desc')->paginate(9);

        // Get all categories for sidebar (old text-based)
        $categories = Blog::where('is_published', true)
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

        // Get blog categories (new structured categories)
        $blogCategories = \App\Models\BlogCategory::roots()
            ->active()
            ->with('children')
            ->orderBy('order')
            ->get();

        // Get all tags for sidebar
        $allTags = Blog::where('is_published', true)
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        // Get latest posts for sidebar
        $latestPosts = Blog::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('front.blogs', compact('blogs', 'categories', 'blogCategories', 'allTags', 'latestPosts'));
    }

    /**
     * Display the specified blog post
     */
    public function show($slug)
    {
        // TEMPORARY: Using is_published check instead of published() scope
        // until published_at dates are set for existing blogs
        $blog = Blog::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        // Get latest posts for sidebar (excluding current)
        $latestPosts = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get all categories for sidebar
        $categories = Blog::where('is_published', true)
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

        // Get all tags for sidebar
        $allTags = Blog::where('is_published', true)
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        // Get related posts (same category, excluding current)
        $relatedPosts = Blog::where('is_published', true)
            ->where('id', '!=', $blog->id)
            ->where('category', $blog->category)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('front.blogDetails', compact('blog', 'latestPosts', 'categories', 'allTags', 'relatedPosts'));
    }

    /**
     * Filter blogs by category
     */
    public function byCategory($category)
    {
        // TEMPORARY: Using is_published check instead of published() scope
        $blogs = Blog::where('is_published', true)
            ->where('category', $category)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Get all categories for sidebar (old text-based)
        $categories = Blog::where('is_published', true)
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

        // Get blog categories (new structured categories)
        $blogCategories = \App\Models\BlogCategory::roots()
            ->active()
            ->with('children')
            ->orderBy('order')
            ->get();

        // Get all tags for sidebar
        $allTags = Blog::where('is_published', true)
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        // Get latest posts for sidebar
        $latestPosts = Blog::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('front.blogs', compact('blogs', 'categories', 'blogCategories', 'allTags', 'latestPosts', 'category'));
    }

    /**
     * Search blogs
     */
    public function search(Request $request)
    {
        $searchTerm = $request->input('q');

        // TEMPORARY: Using is_published check instead of published() scope
        $blogs = Blog::where('is_published', true)
            ->where(function($query) use ($searchTerm) {
                $query->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('excerpt', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('content', 'LIKE', "%{$searchTerm}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        // Get all categories for sidebar (old text-based)
        $categories = Blog::where('is_published', true)
            ->whereNotNull('category')
            ->select('category')
            ->groupBy('category')
            ->get()
            ->pluck('category');

        // Get blog categories (new structured categories)
        $blogCategories = \App\Models\BlogCategory::roots()
            ->active()
            ->with('children')
            ->orderBy('order')
            ->get();

        // Get all tags for sidebar
        $allTags = Blog::where('is_published', true)
            ->whereNotNull('tags')
            ->get()
            ->pluck('tags')
            ->flatten()
            ->unique()
            ->values();

        // Get latest posts for sidebar
        $latestPosts = Blog::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('front.blogs', compact('blogs', 'categories', 'blogCategories', 'allTags', 'latestPosts', 'searchTerm'));
    }
}
