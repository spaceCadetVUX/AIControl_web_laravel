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
    public function index(Request $request)
    {
        $query = Product::published();

        // Filter by brands
        if ($request->has('brand') && $request->brand) {
            $brands = explode(',', $request->brand);
            $query->whereIn('brand', $brands);
        }

        // Filter by categories
        if ($request->has('category') && $request->category) {
            $categories = explode(',', $request->category);
            $query->where(function($q) use ($categories) {
                foreach ($categories as $category) {
                    $q->orWhere('categories', 'LIKE', '%' . $category . '%');
                }
            });
        }

        // Search by keyword
        if ($request->has('q') && $request->q) {
            $keyword = $request->q;
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', "%{$keyword}%")
                  ->orWhere('sku', 'LIKE', "%{$keyword}%")
                  ->orWhere('description', 'LIKE', "%{$keyword}%")
                  ->orWhere('short_description', 'LIKE', "%{$keyword}%")
                  ->orWhere('tags', 'LIKE', "%{$keyword}%")
                  ->orWhere('brand', 'LIKE', "%{$keyword}%");
            });
        }

        // Sorting
        $sort = $request->get('sort', 'newest');
        switch ($sort) {
            case 'popular':
                $query->orderBy('view_count', 'desc');
                break;
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
            default:
                $query->orderBy('featured', 'desc')
                      ->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(9)->withQueryString();

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

    /**
     * Autocomplete search API
     */
    public function autocomplete(Request $request)
    {
        $keyword = $request->input('q');
        
        if (empty($keyword) || strlen($keyword) < 2) {
            return response()->json([]);
        }

        $products = Product::published()
            ->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                      ->orWhere('sku', 'LIKE', "%{$keyword}%")
                      ->orWhere('brand', 'LIKE', "%{$keyword}%");
            })
            ->select('id', 'name', 'sku', 'slug', 'brand', 'image_url', 'price')
            ->distinct()
            ->orderBy('name', 'asc')
            ->limit(7)
            ->get();

        $total = Product::published()
            ->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                      ->orWhere('sku', 'LIKE', "%{$keyword}%")
                      ->orWhere('brand', 'LIKE', "%{$keyword}%");
            })
            ->distinct()
            ->count('id');

        return response()->json([
            'products' => $products,
            'total' => $total,
            'hasMore' => $total > 7
        ]);
    }
}
