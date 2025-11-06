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
        // Get product statistics
        $totalProducts = \App\Models\Product::count();
        $publishedProducts = \App\Models\Product::where('status', 'published')->count();
        
        // Get blog statistics
        $totalBlogs = \App\Models\Blog::count();
        $publishedBlogs = \App\Models\Blog::where('is_published', true)->count();
        $draftBlogs = \App\Models\Blog::where('is_published', false)->count();
        
        // Get top 10 most clicked products (sorted by clicks descending)
        $topClickedProducts = \App\Models\Product::orderBy('click_count', 'desc')
            ->orderBy('view_count', 'desc')
            ->take(10)
            ->get(['name', 'click_count', 'view_count', 'brand']);
        
        // Get product click stats for chart (top 10 by clicks)
        $productClickStats = \App\Models\Product::select('name', 'click_count', 'view_count', 'brand')
            ->orderBy('click_count', 'desc')
            ->take(10)
            ->get();
        
        // Get product view stats for chart (top 10 by views)
        $productViewStats = \App\Models\Product::select('name', 'click_count', 'view_count', 'brand')
            ->orderBy('view_count', 'desc')
            ->take(10)
            ->get();
        
        return view('admin.dashboard', compact('totalProducts', 'publishedProducts', 'totalBlogs', 'publishedBlogs', 'draftBlogs', 'topClickedProducts', 'productClickStats', 'productViewStats'));
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

    /**
     * Display users management
     */
    public function users()
    {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    /**
     * Toggle user active status
     */
    public function toggleUserStatus(\App\Models\User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'You cannot deactivate your own account.');
        }

        $user->update(['is_active' => !$user->is_active]);
        
        $status = $user->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "User {$user->name} has been {$status}.");
    }

    /**
     * Display products management
     */
    public function products(Request $request)
    {
        $query = \App\Models\Product::query();
        
        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('sku', 'LIKE', "%{$search}%");
            });
        }
        
        $products = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();
        $brands = \App\Models\Brand::active()->orderBy('name')->pluck('name');
        $statuses = ['draft', 'published', 'archived'];
        
        // If AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json([
                'products' => $products->items(),
                'total' => $products->total(),
                'hasResults' => $products->count() > 0
            ]);
        }
        
        return view('admin.products', compact('products', 'brands', 'statuses'));
    }

    /**
     * Show create product form
     */
    public function createProduct()
    {
        $brands = \App\Models\Brand::active()->orderBy('name')->get();
        return view('admin.products-create', compact('brands'));
    }

    /**
     * Store new product
     */
    public function storeProduct(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:100',
                'sku' => 'nullable|string|max:100|unique:products,sku',
            'function_category' => 'nullable|string|max:100',
            'catalog' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string',
            'spec_keys' => 'nullable|array',
            'spec_keys.*' => 'nullable|string',
            'spec_values' => 'nullable|array',
            'spec_values.*' => 'nullable|string',
            'image_url' => 'nullable|string|max:500',
            'image_alt' => 'nullable|string|max:255',
            'video_url' => 'nullable|string|max:500',
            'manual_url' => 'nullable|string|max:500',
            'datasheet_url' => 'nullable|string|max:500',
            'price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'currency' => 'nullable|string|max:10',
            'stock_quantity' => 'nullable|integer|min:0',
            'stock_status' => 'nullable|in:in_stock,out_of_stock,on_backorder',
            'min_order_quantity' => 'nullable|integer|min:1',
            'tags' => 'nullable|string',
            'categories' => 'nullable|string',
            'related_products' => 'nullable|string',
            'weight' => 'nullable|string|max:50',
            'dimensions' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:50',
            'material' => 'nullable|string|max:100',
            'warranty_period' => 'nullable|string|max:100',
            'manufacturer_country' => 'nullable|string|max:100',
            'origin' => 'nullable|string|max:100',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|string|max:500',
            'og_image' => 'nullable|string|max:500',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:500',
            'structured_data' => 'nullable|string',
            'indexable' => 'nullable|boolean',
            'status' => 'nullable|in:draft,published,archived',
            'visibility' => 'nullable|in:visible,hidden',
            'featured' => 'nullable|boolean',
            'is_new' => 'nullable|boolean',
            'is_bestseller' => 'nullable|boolean',
            'language' => 'nullable|string|max:10',
            'custom_fields' => 'nullable|string',
            'gallery_images' => 'nullable|array',
            'gallery_images.*.url' => 'nullable|string|max:500',
            'gallery_images.*.alt' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            'action' => 'nullable|in:draft,publish',
        ]);

        // Generate slug from name
        $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
        
        // Auto-generate SEO fields if not provided (SEO best practices)
        if (empty($validated['meta_title'])) {
            $validated['meta_title'] = $request->name . ' | ' . ($request->brand ?? 'Products');
        }
        
        if (empty($validated['meta_description'])) {
            $description = $request->short_description ?: strip_tags($request->description ?? '');
            $validated['meta_description'] = \Illuminate\Support\Str::limit($description, 155);
        }
        
        if (empty($validated['canonical_url'])) {
            $validated['canonical_url'] = url('/product/' . $validated['slug']);
        }
        
        if (empty($validated['og_title'])) {
            $validated['og_title'] = $validated['meta_title'];
        }
        
        if (empty($validated['og_description'])) {
            $validated['og_description'] = $validated['meta_description'];
        }
        
        // Auto-generate meta keywords if not provided
        if (empty($validated['meta_keywords'])) {
            $keywords = [];
            if ($request->name) $keywords[] = $request->name;
            if ($request->brand) $keywords[] = $request->brand;
            if ($request->function_category) $keywords[] = $request->function_category;
            if (!empty($keywords)) {
                $validated['meta_keywords'] = implode(', ', array_unique($keywords));
            }
        }
        
        // Convert checkbox values
        $validated['featured'] = $request->has('featured') ? 1 : 0;
        $validated['is_new'] = $request->has('is_new') ? 1 : 0;
        $validated['is_bestseller'] = $request->has('is_bestseller') ? 1 : 0;
        $validated['indexable'] = $request->has('indexable') ? 1 : 0;
        
        // Convert comma-separated strings to arrays for JSON fields
        $jsonFields = ['tags', 'categories', 'related_products'];
        foreach ($jsonFields as $field) {
            if (isset($validated[$field]) && is_string($validated[$field])) {
                $validated[$field] = array_filter(array_map('trim', explode(',', $validated[$field])));
            }
        }
        
        // Handle gallery_images array - filter out empty values and ensure proper structure
        if (isset($validated['gallery_images']) && is_array($validated['gallery_images'])) {
            $validated['gallery_images'] = array_values(array_filter($validated['gallery_images'], function($image) {
                return !empty(trim($image['url'] ?? ''));
            }));
        }
        
        // Handle features array - filter out empty values
        if (isset($validated['features']) && is_array($validated['features'])) {
            $validated['features'] = array_values(array_filter($validated['features'], function($feature) {
                return !empty(trim($feature));
            }));
        }
        
        // Handle specifications - combine keys and values into associative array
        if (isset($validated['spec_keys']) && isset($validated['spec_values'])) {
            $specifications = [];
            $keys = $validated['spec_keys'];
            $values = $validated['spec_values'];
            
            for ($i = 0; $i < count($keys); $i++) {
                $key = trim($keys[$i] ?? '');
                $value = trim($values[$i] ?? '');
                
                if (!empty($key) && !empty($value)) {
                    $specifications[$key] = $value;
                }
            }
            
            $validated['specifications'] = !empty($specifications) ? $specifications : null;
            
            // Remove the temporary arrays
            unset($validated['spec_keys']);
            unset($validated['spec_values']);
        }
        
        // Convert JSON strings to arrays for complex JSON fields (excluding features and specifications)
        $complexJsonFields = ['custom_fields', 'structured_data'];
        foreach ($complexJsonFields as $field) {
            if (isset($validated[$field]) && is_string($validated[$field]) && !empty($validated[$field])) {
                $decoded = json_decode($validated[$field], true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $validated[$field] = $decoded;
                }
            }
        }
        
        // Handle action button - override status based on button clicked
        if ($request->action === 'publish') {
            $validated['status'] = 'published';
            if (!$request->published_at) {
                $validated['published_at'] = now();
            }
        } else {
            // Explicitly set as draft when not publishing (draft button or no action)
            $validated['status'] = 'draft';
            // Clear published_at if saving as draft
            $validated['published_at'] = null;
        }
        
        // SEO validation and warnings
        if ($validated['status'] === 'published') {
            $warnings = [];
            
            if (empty($validated['meta_title']) && empty($request->name)) {
                $warnings[] = 'Product name is required for SEO optimization';
            }
            
            if (empty($validated['meta_description']) && empty($request->short_description) && empty($request->description)) {
                $warnings[] = 'Product description is recommended for better SEO';
            }
            
            if (empty($validated['image_alt']) && !empty($validated['image_url'])) {
                $warnings[] = 'Image alt text is recommended for accessibility and SEO';
            }
            
            if (!empty($warnings)) {
                \Illuminate\Support\Facades\Log::info('SEO Warnings for Product Creation', $warnings);
            }
        }

        // Log for debugging
        \Illuminate\Support\Facades\Log::info('Product Creation', [
            'action' => $request->action,
            'final_status' => $validated['status'],
            'published_at' => $validated['published_at'] ?? null
        ]);

        $product = \App\Models\Product::create($validated);
        
        // Sync categories if provided
        if ($request->has('category_ids')) {
            $product->categories()->sync($request->category_ids);
        }
        
        $message = $request->action === 'publish' ? 'Product published successfully!' : 'Product saved as draft!';
        return redirect()->route('admin.products')->with('success', $message);
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Improve SKU duplicate error message
            $errors = $e->errors();
            if (isset($errors['sku'])) {
                return redirect()->back()->withInput()->withErrors([
                    'sku' => 'This SKU is already used by another product. Each product must have a unique SKU. Please use a different SKU.'
                ]);
            }
            throw $e;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Product creation error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    /**
     * Show edit product form
     */
    public function editProduct(\App\Models\Product $product)
    {
        $brands = \App\Models\Brand::active()->orderBy('name')->get();
        return view('admin.products-edit', compact('product', 'brands'));
    }

    /**
     * Update product
     */
    public function updateProduct(Request $request, \App\Models\Product $product)
    {
        try {
            // Log incoming data for debugging
            \Illuminate\Support\Facades\Log::info('Update Product Request', [
                'product_id' => $product->id,
                'request_data' => $request->all()
            ]);
            
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'brand' => 'required|string|max:100',
                'sku' => [
                    'nullable',
                    'string',
                    'max:100',
                    \Illuminate\Validation\Rule::unique('products')->ignore($product->id)->whereNull('deleted_at')
                ],
                'function_category' => 'nullable|string|max:100',
                'catalog' => 'nullable|string|max:100',
                'short_description' => 'nullable|string',
                'description' => 'nullable|string',
                'features' => 'nullable|array',
                'features.*' => 'nullable|string',
                'spec_keys' => 'nullable|array',
                'spec_keys.*' => 'nullable|string',
                'spec_values' => 'nullable|array',
                'spec_values.*' => 'nullable|string',
                'image_url' => 'nullable|string|max:500',
                'image_alt' => 'nullable|string|max:255',
                'video_url' => 'nullable|string|max:500',
                'manual_url' => 'nullable|string|max:500',
                'datasheet_url' => 'nullable|string|max:500',
                'price' => 'nullable|numeric|min:0',
                'sale_price' => 'nullable|numeric|min:0',
                'currency' => 'nullable|string|max:10',
                'stock_quantity' => 'nullable|integer|min:0',
                'stock_status' => 'nullable|in:in_stock,out_of_stock,on_backorder',
                'min_order_quantity' => 'nullable|integer|min:1',
                'tags' => 'nullable|string',
                'categories' => 'nullable|string',
                'related_products' => 'nullable|string',
                'weight' => 'nullable|string|max:50',
                'dimensions' => 'nullable|string|max:100',
                'color' => 'nullable|string|max:50',
                'material' => 'nullable|string|max:100',
                'warranty_period' => 'nullable|string|max:100',
                'manufacturer_country' => 'nullable|string|max:100',
                'origin' => 'nullable|string|max:100',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string|max:500',
                'meta_keywords' => 'nullable|string|max:500',
                'canonical_url' => 'nullable|string|max:500',
                'og_image' => 'nullable|string|max:500',
                'og_title' => 'nullable|string|max:255',
                'og_description' => 'nullable|string|max:500',
                'structured_data' => 'nullable|string',
                'indexable' => 'nullable|boolean',
                'status' => 'nullable|in:draft,published,archived',
                'visibility' => 'nullable|in:visible,hidden',
                'featured' => 'nullable|boolean',
                'is_new' => 'nullable|boolean',
                'is_bestseller' => 'nullable|boolean',
                'language' => 'nullable|string|max:10',
                'custom_fields' => 'nullable|string',
                'gallery_images' => 'nullable|array',
                'gallery_images.*.url' => 'nullable|string|max:500',
                'gallery_images.*.alt' => 'nullable|string|max:255',
                'published_at' => 'nullable|date',
                'action' => 'nullable|in:draft,publish',
            ]);

            // Update slug if name changed and save old slug
            if ($request->name !== $product->name) {
                $validated['old_slug'] = $product->slug;
                $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
            }
            
            // Auto-update SEO fields if not provided or if name/content changed (SEO best practices)
            if (empty($validated['meta_title']) || $request->name !== $product->name) {
                $validated['meta_title'] = $request->name . ' | ' . ($request->brand ?? 'Products');
            }
            
            if (empty($validated['meta_description']) || 
                $request->short_description !== $product->short_description) {
                $description = $request->short_description ?: strip_tags($request->description ?? '');
                if (!empty($description)) {
                    $validated['meta_description'] = \Illuminate\Support\Str::limit($description, 155);
                }
            }
            
            if (empty($validated['canonical_url']) || isset($validated['slug'])) {
                $slug = $validated['slug'] ?? $product->slug;
                $validated['canonical_url'] = url('/product/' . $slug);
            }
            
            if (empty($validated['og_title'])) {
                $validated['og_title'] = $validated['meta_title'] ?? $product->meta_title;
            }
            
            if (empty($validated['og_description'])) {
                $validated['og_description'] = $validated['meta_description'] ?? $product->meta_description;
            }
            
            // Auto-update meta keywords if not provided or if key attributes changed
            if (empty($validated['meta_keywords']) || 
                $request->name !== $product->name || 
                $request->brand !== $product->brand) {
                $keywords = [];
                if ($request->name) $keywords[] = $request->name;
                if ($request->brand) $keywords[] = $request->brand;
                if ($request->function_category) $keywords[] = $request->function_category;
                if (!empty($keywords)) {
                    $validated['meta_keywords'] = implode(', ', array_unique($keywords));
                }
            }
            
            // Convert checkbox values
            $validated['featured'] = $request->has('featured') ? 1 : 0;
            $validated['is_new'] = $request->has('is_new') ? 1 : 0;
            $validated['is_bestseller'] = $request->has('is_bestseller') ? 1 : 0;
            $validated['indexable'] = $request->has('indexable') ? 1 : 0;
            
            // Convert comma-separated strings to arrays for JSON fields
            $jsonFields = ['tags', 'categories', 'related_products'];
            foreach ($jsonFields as $field) {
                if (isset($validated[$field]) && is_string($validated[$field])) {
                    $validated[$field] = array_filter(array_map('trim', explode(',', $validated[$field])));
                }
            }
            
            // Handle gallery_images array - filter out empty values and ensure proper structure
            if (isset($validated['gallery_images']) && is_array($validated['gallery_images'])) {
                $validated['gallery_images'] = array_values(array_filter($validated['gallery_images'], function($image) {
                    return !empty(trim($image['url'] ?? ''));
                }));
            }
            
            // Handle features array - filter out empty values
            if (isset($validated['features']) && is_array($validated['features'])) {
                $validated['features'] = array_values(array_filter($validated['features'], function($feature) {
                    return !empty(trim($feature));
                }));
            }
            
            // Handle specifications - combine keys and values into associative array
            if (isset($validated['spec_keys']) && isset($validated['spec_values'])) {
                $specifications = [];
                $keys = $validated['spec_keys'];
                $values = $validated['spec_values'];
                
                for ($i = 0; $i < count($keys); $i++) {
                    $key = trim($keys[$i] ?? '');
                    $value = trim($values[$i] ?? '');
                    
                    if (!empty($key) && !empty($value)) {
                        $specifications[$key] = $value;
                    }
                }
                
                $validated['specifications'] = !empty($specifications) ? $specifications : null;
                
                // Remove the temporary arrays
                unset($validated['spec_keys']);
                unset($validated['spec_values']);
            }
            
            // Convert JSON strings to arrays for complex JSON fields (excluding features and specifications)
            $complexJsonFields = ['custom_fields', 'structured_data'];
            foreach ($complexJsonFields as $field) {
                if (isset($validated[$field]) && is_string($validated[$field]) && !empty($validated[$field])) {
                    $decoded = json_decode($validated[$field], true);
                    if (json_last_error() === JSON_ERROR_NONE) {
                        $validated[$field] = $decoded;
                    }
                }
            }
            
            // Handle action button - override status based on button clicked
            if ($request->action === 'publish') {
                $validated['status'] = 'published';
                if (!$request->published_at && !$product->published_at) {
                    $validated['published_at'] = now();
                }
            } else {
                // Explicitly set as draft when not publishing (draft button or no action)
                $validated['status'] = 'draft';
                // Don't clear published_at for updates if it was previously set
            }
            
            // Log before update
            \Illuminate\Support\Facades\Log::info('Before Update', [
                'validated_data' => $validated,
                'product_before' => $product->toArray()
            ]);
            
            $product->update($validated);
            
            // Sync categories if provided
            if ($request->has('category_ids')) {
                $product->categories()->sync($request->category_ids);
            }
            
            // Log after update
            \Illuminate\Support\Facades\Log::info('After Update', [
                'product_after' => $product->fresh()->toArray()
            ]);
            
            $message = $request->action === 'publish' ? 'Product updated and published!' : 'Product updated successfully!';
            return redirect()->route('admin.products')->with('success', $message);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Improve SKU duplicate error message
            $errors = $e->errors();
            if (isset($errors['sku'])) {
                return redirect()->back()->withInput()->withErrors([
                    'sku' => 'This SKU is already used by another product. Each product must have a unique SKU. Please use a different SKU like "' . ($request->sku ?? '') . '-1"'
                ]);
            }
            throw $e;
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Product update error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Error updating product: ' . $e->getMessage());
        }
    }

    /**
     * Delete product
     */
    public function deleteProduct(\App\Models\Product $product)
    {
        $product->delete();
        
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
    }

    /**
     * Toggle product status
     */
    public function toggleProductStatus(\App\Models\Product $product)
    {
        $newStatus = $product->status === 'published' ? 'draft' : 'published';
        $product->update(['status' => $newStatus]);
        
        return redirect()->back()->with('success', "Product status changed to {$newStatus}.");
    }

    /**
     * Display brands management
     */
    public function brands()
    {
        $brands = \App\Models\Brand::orderBy('name')->paginate(20);
        return view('admin.brands', compact('brands'));
    }

    /**
     * Show create brand form
     */
    public function createBrand()
    {
        return view('admin.brands-create');
    }

    /**
     * Store new brand
     */
    public function storeBrand(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name',
            'description' => 'nullable|string',
            'logo_url' => 'nullable|url|max:500',
            'website' => 'nullable|url|max:500',
            'status' => 'nullable|boolean',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
        $validated['status'] = $request->has('status') ? 1 : 0;
        
        \App\Models\Brand::create($validated);
        
        return redirect()->route('admin.brands')->with('success', 'Brand created successfully!');
    }

    /**
     * Show edit brand form
     */
    public function editBrand(\App\Models\Brand $brand)
    {
        return view('admin.brands-edit', compact('brand'));
    }

    /**
     * Update brand
     */
    public function updateBrand(Request $request, \App\Models\Brand $brand)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $brand->id,
            'description' => 'nullable|string',
            'logo_url' => 'nullable|url|max:500',
            'website' => 'nullable|url|max:500',
            'status' => 'nullable|boolean',
        ]);

        if ($request->name !== $brand->name) {
            $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
        }
        
        $validated['status'] = $request->has('status') ? 1 : 0;
        
        $brand->update($validated);
        
        return redirect()->route('admin.brands')->with('success', 'Brand updated successfully!');
    }

    /**
     * Delete brand
     */
    public function deleteBrand(\App\Models\Brand $brand)
    {
        $brand->delete();
        
        return redirect()->route('admin.brands')->with('success', 'Brand deleted successfully!');
    }

    /**
     * Manage Categories
     */
    public function categories()
    {
        $categories = \App\Models\Category::with('children', 'parent')
                                         ->roots()
                                         ->orderBy('order')
                                         ->orderBy('name')
                                         ->get();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show create category form
     */
    public function createCategory(Request $request)
    {
        $parentCategories = \App\Models\Category::active()
                                                ->roots()
                                                ->orderBy('name')
                                                ->get();
        $parentId = $request->get('parent');
        return view('admin.categories-create', compact('parentCategories', 'parentId'));
    }

    /**
     * Store new category
     */
    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
        $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['order'] = $request->order ?? 0;
        
        \App\Models\Category::create($validated);
        
        return redirect()->route('admin.categories')->with('success', 'Category created successfully!');
    }

    /**
     * Show edit category form
     */
    public function editCategory(\App\Models\Category $category)
    {
        $parentCategories = \App\Models\Category::active()
                                                ->roots()
                                                ->where('id', '!=', $category->id)
                                                ->orderBy('name')
                                                ->get();
        return view('admin.categories-edit', compact('category', 'parentCategories'));
    }

    /**
     * Update category
     */
    public function updateCategory(Request $request, \App\Models\Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'status' => 'nullable|boolean',
            'order' => 'nullable|integer|min:0',
        ]);

        // Prevent setting self as parent
        if ($request->parent_id == $category->id) {
            return back()->withErrors(['parent_id' => 'A category cannot be its own parent.'])->withInput();
        }

        if ($request->name !== $category->name) {
            $validated['slug'] = \Illuminate\Support\Str::slug($request->name);
        }
        
        $validated['status'] = $request->has('status') ? 1 : 0;
        $validated['order'] = $request->order ?? 0;
        
        $category->update($validated);
        
        return redirect()->route('admin.categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Delete category
     */
    public function deleteCategory(\App\Models\Category $category)
    {
        // Check if category has products
        if ($category->products()->count() > 0) {
            return back()->with('error', 'Cannot delete category with associated products. Please reassign or remove products first.');
        }

        // Check if category has child categories
        if ($category->children()->count() > 0) {
            return back()->with('error', 'Cannot delete category with subcategories. Please delete or reassign subcategories first.');
        }

        $category->delete();
        
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully!');
    }

    /**
     * Display blog categories management
     */
    public function blogCategories()
    {
        $rootCategories = \App\Models\BlogCategory::roots()
            ->with('children')
            ->orderBy('order')
            ->get();

        return view('admin.blog-categories', compact('rootCategories'));
    }

    /**
     * Show form to create a new blog category
     */
    public function createBlogCategory(Request $request)
    {
        $parentId = $request->get('parent');
        $parentCategory = $parentId ? \App\Models\BlogCategory::find($parentId) : null;
        
        return view('admin.blog-categories-create', compact('parentCategory'));
    }

    /**
     * Store a new blog category
     */
    public function storeBlogCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name',
            'slug' => 'nullable|string|max:255|unique:blog_categories,slug',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:blog_categories,id',
            'status' => 'required|boolean',
            'order' => 'required|integer|min:0',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);
        }

        \App\Models\BlogCategory::create($validated);

        $redirectRoute = $request->parent_id 
            ? route('admin.blog-categories') 
            : route('admin.blog-categories');

        return redirect($redirectRoute)->with('success', 'Blog category created successfully!');
    }

    /**
     * Show form to edit a blog category
     */
    public function editBlogCategory(\App\Models\BlogCategory $blogCategory)
    {
        // Get all categories except current and its children for parent selection
        $availableParents = \App\Models\BlogCategory::where('id', '!=', $blogCategory->id)
            ->whereNull('parent_id')
            ->get();

        return view('admin.blog-categories-edit', compact('blogCategory', 'availableParents'));
    }

    /**
     * Update a blog category
     */
    public function updateBlogCategory(Request $request, \App\Models\BlogCategory $blogCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:blog_categories,name,' . $blogCategory->id,
            'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:blog_categories,id',
            'status' => 'required|boolean',
            'order' => 'required|integer|min:0',
        ]);

        // Prevent setting itself as parent
        if ($validated['parent_id'] == $blogCategory->id) {
            return back()->with('error', 'A category cannot be its own parent.');
        }

        $blogCategory->update($validated);

        return redirect()->route('admin.blog-categories')->with('success', 'Blog category updated successfully!');
    }

    /**
     * Delete a blog category
     */
    public function deleteBlogCategory(\App\Models\BlogCategory $blogCategory)
    {
        // Check if category has blogs
        if ($blogCategory->blogs()->count() > 0) {
            return back()->with('error', 'Cannot delete category with associated blogs. Please reassign or remove blogs first.');
        }

        // Check if category has child categories
        if ($blogCategory->children()->count() > 0) {
            return back()->with('error', 'Cannot delete category with subcategories. Please delete or reassign subcategories first.');
        }

        $blogCategory->delete();
        
        return redirect()->route('admin.blog-categories')->with('success', 'Blog category deleted successfully!');
    }

    /**
     * Upload image and store in public/assets/aicontrol_imgs/AllProductImages
     */
    public function uploadImage(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // Max 5MB
            ]);

            if (!$request->hasFile('image')) {
                return response()->json([
                    'success' => false,
                    'message' => 'No image file provided'
                ], 400);
            }

            $image = $request->file('image');
            $originalName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $baseFileName = pathinfo($originalName, PATHINFO_FILENAME);
            
            // Define the upload directory
            $uploadPath = public_path('assets/aicontrol_imgs/AllProductImages');
            
            // Create directory if it doesn't exist
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            // Check if file with same name exists
            $fileName = $originalName;
            $filePath = $uploadPath . '/' . $fileName;
            $fileExists = file_exists($filePath);
            
            // If file exists, create a unique name
            if ($fileExists) {
                $counter = 1;
                while (file_exists($uploadPath . '/' . $fileName)) {
                    $fileName = $baseFileName . '_' . $counter . '.' . $extension;
                    $counter++;
                }
                
                // Move the file with new name
                $image->move($uploadPath, $fileName);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Warning: A file with the same name already exists. Renamed to: ' . $fileName,
                    'path' => 'assets/aicontrol_imgs/AllProductImages/' . $fileName,
                    'filename' => $fileName,
                    'originalName' => $originalName,
                    'renamed' => true
                ]);
            } else {
                // Move the file with original name
                $image->move($uploadPath, $fileName);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Image uploaded successfully',
                    'path' => 'assets/aicontrol_imgs/AllProductImages/' . $fileName,
                    'filename' => $fileName,
                    'renamed' => false
                ]);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Upload failed: ' . $e->getMessage()
            ], 500);
        }
    }
}
