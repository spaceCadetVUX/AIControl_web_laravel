<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class PageController extends Controller
{
    /**
     * Display the home page
     */
    public function index() 
    { 
        $landingBlogs = Blog::with(['blogCategories:id,name,slug'])
            ->where('is_published', true)
            ->whereHas('blogCategories', function ($query) {
                $query->where(function ($q) {
                    $q->where('slug', 'landing')
                        ->orWhereRaw('LOWER(name) = ?', ['landing']);
                });
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(4)
            ->get();

        return view('front.index', compact('landingBlogs'));
    }

    /**
     * Display ABB products page
     */
    public function abb() 
    { 
        return view('front.abb'); 
    }

    /**
     * Display Legrand products page
     */
    public function legrand() 
    { 
        return view('front.legrand'); 
    }

    /**
     * Display CP Electronics products page
     */
    public function cpElectronics() 
    { 
        return view('front.cpElectronics'); 
    }

    /**
     * Display Vantage products page
     */
    public function vantage() 
    { 
        return view('front.vantage'); 
    }

    /**
     * Display lighting control solutions page
     */
    public function lightingControl() 
    { 
        return view('front.lighting_control_solutions'); 
    }

    /**
     * Display shading solutions page
     */
    public function shade() 
    { 
        return view('front.automatic_blind_solutions'); 
    }

    /**
     * Display HVAC control solutions page
     */
    public function hvacControl() 
    { 
        return view('front.hvac_control_solutions'); 
    }

    /**
     * Display security solutions page
     */
    public function security() 
    { 
        return view('front.security_solutions'); 
    }

    /**
     * Display contact us page
     */
    public function contact() 
    { 
        return view('front.contact-us-light'); 
    }

    
    /**
     * Display shop page
     */
    public function shop() 
    { 
        return view('front.shop'); 
    }

    /**
     * Display product details page
     */
    public function productDetails() 
    { 
        return view('front.productDetails'); 
    }

    /**
     * Display blog page
     */
    public function blogs() 
    { 
        return view('front.blogs'); 
    }
}



