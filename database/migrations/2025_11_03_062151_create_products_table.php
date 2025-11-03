<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('old_slug')->nullable();
            $table->string('sku', 100)->nullable()->unique();
            $table->string('brand', 100);
            $table->string('function_category', 100)->nullable();
            $table->string('catalog', 100)->nullable();
            
            // Descriptions
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->json('features')->nullable();
            $table->json('specifications')->nullable();
            
            // Media
            $table->string('image_url', 500)->nullable();
            $table->string('image_alt')->nullable();
            $table->json('gallery_images')->nullable();
            $table->string('video_url', 500)->nullable();
            $table->string('manual_url', 500)->nullable();
            $table->string('datasheet_url', 500)->nullable();
            
            // Pricing
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->string('currency', 10)->default('USD');
            $table->integer('stock_quantity')->default(0);
            $table->string('stock_status', 50)->default('in_stock');
            $table->integer('min_order_quantity')->default(1);
            
            // Organization
            $table->json('tags')->nullable();
            $table->json('categories')->nullable();
            $table->json('related_products')->nullable();
            
            // Physical properties
            $table->string('weight', 50)->nullable();
            $table->string('dimensions', 100)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('material', 100)->nullable();
            $table->string('warranty_period', 100)->nullable();
            $table->string('manufacturer_country', 100)->nullable();
            $table->string('origin', 100)->nullable();
            
            // SEO
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 500)->nullable();
            $table->string('canonical_url', 500)->nullable();
            $table->string('og_image', 500)->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_description', 500)->nullable();
            $table->json('structured_data')->nullable();
            
            // Analytics
            $table->integer('view_count')->default(0);
            $table->integer('click_count')->default(0);
            $table->integer('search_count')->default(0);
            $table->integer('order_count')->default(0);
            $table->decimal('rating', 3, 2)->default(0);
            $table->integer('review_count')->default(0);
            
            // Sitemap
            $table->decimal('sitemap_priority', 2, 1)->default(0.5);
            $table->string('sitemap_changefreq', 20)->default('weekly');
            $table->boolean('indexable')->default(1);
            $table->timestamp('last_crawled_at')->nullable();
            
            // Status
            $table->string('status', 20)->default('draft');
            $table->string('visibility', 20)->default('visible');
            $table->boolean('featured')->default(0);
            $table->boolean('is_new')->default(0);
            $table->boolean('is_bestseller')->default(0);
            $table->string('language', 10)->default('en');
            
            // Custom
            $table->json('custom_fields')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp('published_at')->nullable();
            
            // Indexes
            $table->index('slug');
            $table->index('brand');
            $table->index('status');
            $table->index('featured');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
