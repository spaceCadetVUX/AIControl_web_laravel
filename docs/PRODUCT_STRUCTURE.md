# Product System Structure & Flow

## Overview
The Product system manages smart home products with advanced SEO, multi-category support, and comprehensive e-commerce features.

---

## 📊 Database Layer

### Main Table: `products`
**Status:** ⚠️ Migration file not found (table exists via direct SQL import)

**Key Columns:**
```
├── id (Primary Key)
├── name, slug, old_slug, sku (Identifiers)
├── brand, function_category, catalog (Classification)
├── short_description, description, features (Content)
├── specifications (JSON - tech specs)
├── image_url, image_alt, gallery_images (JSON array)
├── video_url, manual_url, datasheet_url (Resources)
├── price, sale_price, currency (Pricing)
├── stock_quantity, stock_status, min_order_quantity (Inventory)
├── tags (JSON array), related_products (JSON array)
├── weight, dimensions, color, material (Physical)
├── warranty_period, manufacturer_country, origin
├── meta_title, meta_description, meta_keywords (SEO)
├── canonical_url, og_image, og_title, og_description
├── structured_data (JSON - Schema.org)
├── view_count, click_count, search_count (Analytics)
├── order_count, rating, review_count
├── indexable (boolean - SEO control)
├── status (draft/published), visibility (visible/hidden)
├── featured, is_new, is_bestseller (Flags)
├── language, custom_fields (JSON)
├── published_at (timestamp)
├── created_at, updated_at
└── deleted_at (SoftDeletes)
```

### Pivot Table: `category_product`
**Migration:** `2025_11_06_000002_create_category_product_table.php`

```
├── id (Primary Key)
├── category_id (Foreign Key → categories.id)
├── product_id (Foreign Key → products.id)
├── created_at
└── updated_at
```

### Related Table: `categories`
**Migration:** `2025_11_06_000001_create_categories_table.php`

```
├── id (Primary Key)
├── name (Category name)
├── slug (URL-friendly)
├── description
├── parent_id (Self-referencing for hierarchy)
├── order (Display order)
├── is_active (boolean)
├── created_at
├── updated_at
└── deleted_at (SoftDeletes)
```

### Related Table: `brands`
**Migration:** `2025_11_03_045621_create_brands_table.php`

```
├── id (Primary Key)
├── name
├── slug
├── description
├── logo_url
├── website
├── status (boolean)
├── created_at
└── updated_at
```

---

## 🎯 Model Layer

### File: `app/Models/Product.php`

**Key Features:**
- ✅ SoftDeletes enabled
- ✅ Many-to-Many relationship with Categories
- ✅ JSON casting for: features, specifications, gallery_images, tags, related_products, custom_fields, structured_data
- ✅ Auto-casting: price, sale_price, rating (decimal:2)
- ✅ Boolean fields: featured, is_new, is_bestseller, indexable

**Relationships:**
```php
public function categories()
{
    return $this->belongsToMany(Category::class, 'category_product')
                ->withTimestamps();
}
```

**Important Scopes:**
```php
scopePublished($query)   // status='published' AND visibility='visible'
scopeFeatured($query)    // featured=1
scopeByBrand($query, $brand)
```

**Accessors:**
```php
getImageUrlFullAttribute() // Returns asset('storage/' . image_url)
```

**⚠️ Critical Fix Applied:**
- Removed `'categories'` from `$casts` array (conflicted with relationship)
- Removed `'categories'` from `$fillable` array
- Categories now managed via `categories()` relationship only

---

## 🎨 Frontend (User Display)

### Route Group: `/shop` + `/product`
**File:** `routes/web.php` (Lines 65-71)

```php
Route::controller(App\Http\Controllers\ProductController::class)->group(function() {
    Route::get('/shop', 'index')->name('shop');
    Route::get('/product/{slug}', 'show')->name('product.show');
    Route::get('/brand/{brand}', 'byBrand')->name('brand.products');
    Route::get('/search', 'search')->name('product.search');
    Route::get('/api/products/autocomplete', 'autocomplete')->name('product.autocomplete');
});
```

### Controller: `app/Http/Controllers/ProductController.php`

**Methods:**
1. **`index()`** - Product listing page
   - Fetches: `Product::published()->with('categories')->paginate()`
   - View: `resources/views/front/shop.blade.php`
   - Features: Filtering by brand, category, price range

2. **`show($slug)`** - Product detail page
   - Fetches: `Product::where('slug', $slug)->published()->with('categories')->firstOrFail()`
   - View: `resources/views/front/productDetails.blade.php`
   - Features: Gallery, specs, related products

3. **`byBrand($brand)`** - Filter by brand
   - Fetches: `Product::byBrand($brand)->published()->paginate()`
   - View: `resources/views/front/shop.blade.php`

4. **`search(Request $request)`** - Search products
   - Fetches: `Product::where('name', 'like', "%{$q}%")->published()->paginate()`
   - View: `resources/views/front/shop.blade.php`

5. **`autocomplete(Request $request)`** - AJAX autocomplete
   - Returns: JSON array of products

### View Files:

**Product Listing:** `resources/views/front/shop.blade.php`
```
├── Product Grid/List Toggle
├── Filters (Categories, Brands, Price)
├── Sort Options
├── Pagination
└── Each Product Card:
    ├── Thumbnail (with asset() helper)
    ├── Name, SKU, Brand
    ├── Price, Sale Price
    ├── Categories (via relationship)
    ├── Short Description
    └── "View Details" Button
```

**Product Detail:** `resources/views/front/productDetails.blade.php`
```
├── Breadcrumb
├── Image Gallery (gallery_images array)
├── Product Info:
│   ├── Name, SKU, Brand
│   ├── Price, Stock Status
│   ├── Categories
│   ├── Description (TinyMCE content)
│   └── Features (JSON array)
├── Specifications Table (JSON array)
├── Downloads (manual_url, datasheet_url)
├── Related Products
└── SEO Meta Tags
```

**Image Handling Fix:**
```blade
@php
    $imageSrc = (str_starts_with($product->image_url, 'http://') || str_starts_with($product->image_url, 'https://'))
        ? $product->image_url
        : asset($product->image_url);
@endphp
<img src="{{ $imageSrc }}" alt="{{ $product->image_alt ?? $product->name }}">
```

---

## 🔐 Backend (Admin Panel)

### Route Group: `/admin/products`
**File:** `routes/web.php` (Lines 107-114)

```php
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/products', [DashboardController::class, 'products'])->name('products');
    Route::get('/products/create', [DashboardController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [DashboardController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/{product}/edit', [DashboardController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/{product}', [DashboardController::class, 'updateProduct'])->name('products.update');
    Route::delete('/products/{product}', [DashboardController::class, 'deleteProduct'])->name('products.delete');
    Route::post('/products/{product}/toggle-status', [DashboardController::class, 'toggleProductStatus'])->name('products.toggle-status');
});
```

### Controller: `app/Http/Controllers/Admin/DashboardController.php`

**Methods:**

1. **`products()`** - Admin product listing
   - Fetches: `Product::with('categories')->paginate(20)`
   - View: `resources/views/admin/products.blade.php`
   - Shows: All products (including drafts, soft-deleted)

2. **`createProduct()`** - Show create form
   - Fetches: `Category::all()`, `Brand::all()`
   - View: `resources/views/admin/products-create.blade.php`

3. **`storeProduct(Request $request)`** - Create new product
   - Validation: 35+ fields
   - Image uploads → `public/assets/AIcontrol_imgs/AllProductImages/`
   - Gallery images (JSON array)
   - Category sync: `$product->categories()->sync($request->category_ids)`
   - Auto-generates: slug, meta_title, published_at (if publishing)
   - Redirect: `admin.products` with success message

4. **`editProduct($id)`** - Show edit form ⚠️ **FIXED**
   - **Old (Broken):** `editProduct(Product $product)` - Route model binding failed
   - **New (Working):**
   ```php
   public function editProduct($id)
   {
       $product = Product::with('categories')->findOrFail($id);
       $categories = Category::all();
       $brands = Brand::all();
       return view('admin.products-edit', compact('product', 'categories', 'brands'));
   }
   ```
   - Fetches fresh categories separately
   - Eager loads product categories for checkboxes
   - View: `resources/views/admin/products-edit.blade.php`

5. **`updateProduct(Request $request, Product $product)`** - Update product
   - Validation: Same as store
   - Image handling: Deletes old images if replaced
   - Category sync: `$product->categories()->sync($request->category_ids ?? [])`
   - Auto-updates: slug (if empty), meta fields
   - Redirect: `admin.products` with success

6. **`deleteProduct(Product $product)`** - Soft delete
   - `$product->delete()`
   - Redirect: `admin.products`

7. **`toggleProductStatus(Product $product)`** - Draft ↔ Published
   - Toggles: `status` field
   - Redirect: Back with success

### View Files:

**Product List:** `resources/views/admin/products.blade.php`
```
├── Search/Filter Bar
├── "Create Product" Button
├── Data Table:
│   ├── Thumbnail
│   ├── Name, SKU
│   ├── Categories (comma-separated)
│   ├── Brand
│   ├── Price
│   ├── Stock Status
│   ├── Status Badge (draft/published)
│   └── Actions (Edit, Delete, Toggle Status)
└── Pagination
```

**Create Form:** `resources/views/admin/products-create.blade.php`
```
Tabbed Interface:
├── Tab 1: Basic Info
│   ├── Name, SKU, Brand
│   ├── Categories (Multiple checkboxes) ✅
│   ├── Function Category, Catalog
│   ├── Short Description, Description (TinyMCE)
│   └── Image Upload → AllProductImages/
├── Tab 2: Pricing & Inventory
│   ├── Price, Sale Price, Currency
│   ├── Stock Quantity, Stock Status
│   └── Min Order Quantity
├── Tab 3: Details
│   ├── Features (JSON array inputs)
│   ├── Specifications (JSON array inputs)
│   ├── Gallery Images (multiple upload)
│   └── Physical Properties
├── Tab 4: SEO & Meta
│   ├── Meta Title, Description, Keywords
│   ├── Canonical URL
│   ├── OG Image, OG Title, OG Description
│   ├── Structured Data (JSON)
│   └── Indexable Checkbox
└── Tab 5: Publishing
    ├── Status (draft/published)
    ├── Visibility, Featured, Is New, Is Bestseller
    ├── Published At (datetime)
    └── Tags (JSON array)
```

**Edit Form:** `resources/views/admin/products-edit.blade.php` ⚠️ **FIXED**
- Same structure as create form
- Pre-fills all fields
- **Critical Fix:** Categories now check correctly
  ```blade
  @foreach($categories as $category)
      <input type="checkbox" name="category_ids[]" value="{{ $category->id }}"
          {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
      {{ $category->name }}
  @endforeach
  ```
- Shows existing gallery images
- Allows replacing images

---

## 🔄 Data Flow Diagrams

### Frontend Product Display Flow
```
User Request (/shop or /product/{slug})
    ↓
ProductController
    ↓
Query: Product::published()->with('categories')
    ↓
Database: products table + category_product pivot
    ↓
Eloquent Model: Product with categories relationship
    ↓
View: shop.blade.php or productDetails.blade.php
    ↓
Render: HTML with images (via asset() helper)
    ↓
User sees: Product listing or detail page
```

### Admin Product Edit Flow (Fixed)
```
Admin clicks Edit (/admin/products/{id}/edit)
    ↓
DashboardController@editProduct($id)
    ↓
Query 1: Product::with('categories')->findOrFail($id)
Query 2: Category::all()
Query 3: Brand::all()
    ↓
Database: products + category_product + categories
    ↓
View: products-edit.blade.php
    ├── Product data (all fields)
    ├── Fresh categories list
    └── Product's categories (for checkboxes)
    ↓
Render: Form with pre-filled data
    ├── Text inputs: name, sku, brand, etc.
    ├── TinyMCE: description
    ├── Checkboxes: Categories (WORKING ✅)
    ├── File uploads: images
    └── JSON arrays: features, specifications
    ↓
Admin submits form (PUT /admin/products/{product})
    ↓
DashboardController@updateProduct($request, $product)
    ↓
Validation (35+ fields)
    ↓
Image Processing:
    ├── Upload to: public/assets/AIcontrol_imgs/AllProductImages/
    ├── Delete old images if replaced
    └── Update: image_url, gallery_images (JSON)
    ↓
Category Sync:
    └── $product->categories()->sync($request->category_ids ?? [])
    ↓
Update: $product->update($validated)
    ↓
Redirect: admin.products with success message
```

### Category Relationship Flow
```
Product Model
    ↓
categories() relationship (belongsToMany)
    ↓
Pivot Table: category_product
    ├── product_id
    └── category_id
    ↓
Category Model
    ↓
Display: Category names in frontend/backend
```

---

## 📁 File Tree (Products Only)

```
AIControl_web_laravel_master/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── ProductController.php ..................... Frontend product display
│   │       └── Admin/
│   │           └── DashboardController.php .............. Admin CRUD (products, brands, categories)
│   └── Models/
│       ├── Product.php ................................. Product model (SoftDeletes, categories relationship)
│       ├── Category.php ................................ Category model
│       └── Brand.php ................................... Brand model
│
├── database/
│   └── migrations/
│       ├── 2025_11_03_045621_create_brands_table.php
│       ├── 2025_11_06_000001_create_categories_table.php
│       └── 2025_11_06_000002_create_category_product_table.php
│       └── (products table created via direct SQL import)
│
├── resources/
│   └── views/
│       ├── front/
│       │   ├── shop.blade.php .......................... Product listing page
│       │   └── productDetails.blade.php ................ Product detail page
│       └── admin/
│           ├── products.blade.php ...................... Admin product list
│           ├── products-create.blade.php ............... Create product form
│           └── products-edit.blade.php ................. Edit product form (FIXED ✅)
│
├── routes/
│   └── web.php ......................................... Routes for frontend + admin
│
└── public/
    └── assets/
        └── AIcontrol_imgs/
            └── AllProductImages/ ....................... All product images stored here
                ├── {timestamp}_banner_{filename}.jpg
                ├── {timestamp}_thumb_{filename}.jpg
                ├── {timestamp}_gallery_{filename}.jpg
                └── ... (all product uploads)
```

---

## 🐛 Known Issues & Fixes

### ✅ FIXED: Categories not checking on edit page
**Problem:**
- Edit form checkboxes for categories were not pre-checked
- Caused by relationship loading conflict

**Root Cause:**
1. `'categories'` was in both `$casts` and `$fillable` arrays
2. Conflicted with `categories()` relationship method
3. Route model binding in controller wasn't eager loading categories

**Solution:**
1. Removed `'categories'` from `Product.php` `$casts` array
2. Removed `'categories'` from `$fillable` array
3. Changed controller from route binding to manual ID loading:
   ```php
   // OLD (Broken):
   public function editProduct(Product $product)
   
   // NEW (Working):
   public function editProduct($id)
   {
       $product = Product::with('categories')->findOrFail($id);
       $categories = Category::all();
       ...
   }
   ```
4. Updated view to use fresh categories and relationship:
   ```blade
   {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}
   ```

### ✅ FIXED: Image URLs not displaying correctly
**Problem:**
- Image paths stored without domain
- `asset()` helper not used consistently

**Solution:**
```blade
@php
    $imageSrc = (str_starts_with($product->image_url, 'http://') || str_starts_with($product->image_url, 'https://'))
        ? $product->image_url  // External URL
        : asset($product->image_url);  // Local path
@endphp
<img src="{{ $imageSrc }}" alt="{{ $product->image_alt ?? $product->name }}">
```

---

## 💡 Best Practices

1. **Image Storage:**
   - All product images → `public/assets/AIcontrol_imgs/AllProductImages/`
   - Filename format: `{timestamp}_{type}_{original_filename}`
   - Use `asset()` helper for local paths
   - Support external URLs for flexibility

2. **Category Management:**
   - Use relationship: `$product->categories()` (NOT `$product->categories` as array)
   - Sync on update: `$product->categories()->sync($categoryIds)`
   - Eager load: `Product::with('categories')`

3. **SEO:**
   - Auto-generate: slug, meta_title, canonical_url
   - Fallback: meta_description from short_description
   - Use structured_data for rich snippets
   - Set indexable=false for internal/test products

4. **SoftDeletes:**
   - Products are soft-deleted (not permanently removed)
   - Admin can restore via database if needed
   - Filter published products in frontend

5. **JSON Fields:**
   - Always cast to 'array' in model
   - Validate as 'array' in controller
   - Use `json_encode()` when manually setting

---

## 🔍 Quick Reference

### Image Upload Paths
- **Products:** `public/assets/AIcontrol_imgs/AllProductImages/`
- **Display:** `asset('assets/AIcontrol_imgs/AllProductImages/{filename}')`

### Category Checkbox (Edit Form)
```blade
@foreach($categories as $category)
    <input type="checkbox" name="category_ids[]" value="{{ $category->id }}"
        {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}>
    <label>{{ $category->name }}</label>
@endforeach
```

### Query Published Products
```php
Product::published()  // status='published' AND visibility='visible'
    ->with('categories')
    ->featured()
    ->paginate(12);
```

### Sync Categories on Save
```php
$product->categories()->sync($request->category_ids ?? []);
```

---

**Last Updated:** November 7, 2025  
**Status:** ✅ All critical issues fixed and documented
