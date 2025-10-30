<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all products (shop page)
     */
    public function index()
    {
        $products = Product::published()
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('front.shop', compact('products'));
    }

    /**
     * Display single product detail
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->published()
            ->firstOrFail();

        // Increment view count
        $product->increment('view_count');

        // Get related products (same brand)
        $relatedProducts = Product::published()
            ->where('brand', $product->brand)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('front.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Display products by brand
     */
    public function byBrand($brand)
    {
        $products = Product::published()
            ->byBrand($brand)
            ->orderBy('featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('front.shop', compact('products', 'brand'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        $keyword = $request->input('q');

        $products = Product::published()
            ->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                      ->orWhere('description', 'LIKE', "%{$keyword}%")
                      ->orWhere('short_description', 'LIKE', "%{$keyword}%")
                      ->orWhere('tags', 'LIKE', "%{$keyword}%");
            })
            ->orderBy('view_count', 'desc')
            ->paginate(12);

        return view('front.shop', compact('products', 'keyword'));
    }
}
