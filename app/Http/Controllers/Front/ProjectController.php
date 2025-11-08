<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     */
    public function index(Request $request)
    {
        $query = Project::with(['category', 'categorySecondary'])
            ->published()
            ->ordered();

        // Filter by category if provided
        $selectedCategory = null;
        if ($request->has('category') && $request->category) {
            $selectedCategory = ProjectCategory::where('slug', $request->category)->first();
            if ($selectedCategory) {
                $query->inCategory($selectedCategory->id);
            }
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->search($request->search);
        }

        // Paginate results
        $projects = $query->paginate(9)->appends($request->except('page'));

        // Get all active categories for sidebar
        $categories = ProjectCategory::active()
            ->ordered()
            ->withCount(['projects' => function($q) {
                $q->where('status', 'published');
            }])
            ->get();

        // Get featured projects
        $featuredProjects = Project::published()
            ->featured()
            ->ordered()
            ->limit(3)
            ->get();

        return view('front.projects', compact('projects', 'categories', 'featuredProjects', 'selectedCategory'));
    }

    /**
     * Display the specified project
     */
    public function show($slug)
    {
        $project = Project::with(['category', 'categorySecondary'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment view count
        $project->incrementViewCount();

        // Get related projects (same primary/secondary categories)
        $categoryIds = collect([
            $project->project_category_id,
            $project->project_category_id_2,
        ])->filter();

        $relatedQuery = Project::with(['category', 'categorySecondary'])
            ->where('id', '!=', $project->id);

        if ($categoryIds->isNotEmpty()) {
            $relatedQuery->where(function($query) use ($categoryIds) {
                $query->whereIn('project_category_id', $categoryIds)
                      ->orWhereIn('project_category_id_2', $categoryIds);
            });
        }

        $relatedProjects = $relatedQuery
            ->published()
            ->ordered()
            ->limit(3)
            ->get();

        return view('front.projectDetails', compact('project', 'relatedProjects'));
    }

    /**
     * Display projects by category
     */
    public function byCategory($slug)
    {
        $category = ProjectCategory::where('slug', $slug)
            ->active()
            ->firstOrFail();

        $projects = Project::with(['category', 'categorySecondary'])
            ->published()
            ->inCategory($category->id)
            ->ordered()
            ->paginate(9);

        // Get all categories for sidebar
        $categories = ProjectCategory::active()
            ->ordered()
            ->withCount(['projects' => function($q) {
                $q->where('status', 'published');
            }])
            ->get();

        $featuredProjects = Project::published()
            ->featured()
            ->ordered()
            ->limit(3)
            ->get();

        return view('front.projects', compact('projects', 'categories', 'featuredProjects', 'category'));
    }
}
