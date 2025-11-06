<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display all products (shop page)
     */
    public function index(Request $request)
    {
        // Validate input
        $request->validate([
            'brand' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'q' => 'nullable|string|max:255',
            'sort' => 'nullable|in:newest,popular,price-low,price-high'
        ]);

        $query = Product::published();

        // Filter by brands
        if ($request->has('brand') && $request->brand) {
            $brands = explode(',', $request->brand);
            $query->whereIn('brand', $brands);
        }

        // Filter by categories (using relationship)
        // If a product is assigned to a root category, it should appear when filtering by any of its subcategories
        if ($request->has('category') && $request->category) {
            $categoryIds = array_filter(explode(',', $request->category));
            if (!empty($categoryIds)) {
                // Get all selected categories
                $selectedCategories = \App\Models\Category::whereIn('id', $categoryIds)->get();
                
                // Build array of category IDs to search for
                $searchCategoryIds = [];
                
                foreach ($selectedCategories as $category) {
                    // Add the selected category itself
                    $searchCategoryIds[] = $category->id;
                    
                    // If it's a subcategory, also include its parent
                    // This way products assigned to parent will show when filtering by child
                    if ($category->parent_id) {
                        $searchCategoryIds[] = $category->parent_id;
                    }
                    
                    // If it's a root category, products assigned to it should show
                    // (already included above)
                }
                
                // Remove duplicates
                $searchCategoryIds = array_unique($searchCategoryIds);
                
                $query->whereHas('categories', function($q) use ($searchCategoryIds) {
                    $q->whereIn('categories.id', $searchCategoryIds);
                });
            }
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

        // Get all active brands for the filter sidebar
        $brands = \App\Models\Brand::active()
            ->orderBy('name')
            ->get();

        // Get all active categories for the filter sidebar
        $categories = \App\Models\Category::active()
            ->with('children')
            ->roots()
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return view('front.shop', compact('products', 'brands', 'categories'));
    }

    /**
     * Display single product detail
     */
    public function show($slug)
    {
        try {
            $product = Product::where('slug', $slug)
                ->published()
                ->firstOrFail();

            // Increment view count
            $product->increment('view_count');

            // Get related products (same brand) - optimized query
            $relatedProducts = Product::published()
                ->where('brand', $product->brand)
                ->where('id', '!=', $product->id)
                ->select('id', 'name', 'slug', 'brand', 'image_url', 'price', 'sale_price', 'stock_status')
                ->limit(4)
                ->get();

            return view('front.product-detail', compact('product', 'relatedProducts'));
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Product not found - return 404
            abort(404, 'Sản phẩm không tìm thấy');
        } catch (\Exception $e) {
            // Log error and show user-friendly message
            Log::error('Error loading product: ' . $e->getMessage());
            return back()->with('error', 'Đã xảy ra lỗi khi tải sản phẩm. Vui lòng thử lại.');
        }
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

        // Get all active brands for the filter sidebar
        $brands = \App\Models\Brand::active()
            ->orderBy('name')
            ->get();

        return view('front.shop', compact('products', 'brand', 'brands'));
    }

    /**
     * Search products
     */
    public function search(Request $request)
    {
        // Validate input
        $request->validate([
            'q' => 'required|string|max:255'
        ]);

        $keyword = $request->input('q');

        // Sanitize keyword
        if ($keyword) {
            $keyword = trim($keyword);
            $keyword = str_replace(['%', '_'], ['\\%', '\\_'], $keyword);
        }

        $products = Product::published()
            ->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                      ->orWhere('description', 'LIKE', "%{$keyword}%")
                      ->orWhere('short_description', 'LIKE', "%{$keyword}%")
                      ->orWhere('tags', 'LIKE', "%{$keyword}%")
                      ->orWhere('brand', 'LIKE', "%{$keyword}%");
            })
            ->orderBy('view_count', 'desc')
            ->paginate(12);

        // Get all active brands for the filter sidebar
        $brands = \App\Models\Brand::active()
            ->orderBy('name')
            ->get();

        return view('front.shop', compact('products', 'keyword', 'brands'));
    }

    /**
     * Autocomplete search API
     */
    public function autocomplete(Request $request)
    {
        // Validate input
        $request->validate([
            'q' => 'required|string|min:2|max:100'
        ]);

        $keyword = $request->input('q');
        
        // Validate input
        if (empty($keyword) || strlen($keyword) < 2) {
            return response()->json([
                'products' => [],
                'total' => 0,
                'hasMore' => false
            ]);
        }

        // Sanitize keyword - remove special SQL characters
        $keyword = trim($keyword);
        $keyword = str_replace(['%', '_'], ['\\%', '\\_'], $keyword);

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
