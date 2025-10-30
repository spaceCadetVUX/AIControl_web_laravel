<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    // Allow mass assignment for these fields
    protected $fillable = [
        'name', 'brand', 'function_category', 'catalog', 'sku',
        'description', 'short_description', 'features', 'specifications',
        'image_url', 'gallery_images', 'video_url', 'manual_url', 'datasheet_url',
        'price', 'sale_price', 'currency', 'stock_quantity', 'stock_status', 'min_order_quantity',
        'slug', 'meta_title', 'meta_description', 'meta_keywords', 'canonical_url',
        'og_image', 'og_title', 'og_description',
        'tags', 'categories', 'related_products',
        'weight', 'dimensions', 'color', 'material', 'warranty_period', 'manufacturer_country', 'origin',
        'status', 'visibility', 'featured', 'is_new', 'is_bestseller',
        'view_count', 'click_count', 'search_count', 'order_count', 'rating', 'review_count',
        'sitemap_priority', 'sitemap_changefreq', 'indexable', 'last_crawled_at',
        'custom_fields', 'published_at'
    ];

    // Cast JSON fields to arrays
    protected $casts = [
        'features' => 'array',
        'specifications' => 'array',
        'gallery_images' => 'array',
        'tags' => 'array',
        'categories' => 'array',
        'related_products' => 'array',
        'custom_fields' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'rating' => 'decimal:2',
        'featured' => 'boolean',
        'is_new' => 'boolean',
        'is_bestseller' => 'boolean',
        'indexable' => 'boolean',
        'published_at' => 'datetime',
        'last_crawled_at' => 'datetime',
    ];

    // Accessor for full image URL
    public function getImageUrlFullAttribute()
    {
        return $this->image_url ? asset('storage/' . $this->image_url) : null;
    }

    // Scope for published products
    public function scopePublished($query)
    {
        return $query->where('status', 'published')->where('visibility', 'visible');
    }

    // Scope for featured products
    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    // Scope for brand
    public function scopeByBrand($query, $brand)
    {
        return $query->where('brand', $brand);
    }
}
