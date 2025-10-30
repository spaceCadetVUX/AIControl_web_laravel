<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Display the pages management view
     */
    public function pages()
    {
        return view('admin.pages');
    }

    /**
     * Update page content
     * Future: Add logic to edit pages or database content
     */
    public function update(Request $request)
    {
        // Validate and update page content
        // Return response
        return redirect()->route('admin.pages')->with('success', 'Page updated successfully');
    }
}
