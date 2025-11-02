<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Add indexes to frequently queried columns for better performance
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Index for slug (used in product detail page)
            $table->index('slug');
            
            // Index for brand (used in filtering and related products)
            $table->index('brand');
            
            // Index for status (published/draft filtering)
            $table->index('status');
            
            // Index for stock_status (in_stock/out_of_stock filtering)
            $table->index('stock_status');
            
            // Index for featured flag (sorting)
            $table->index('featured');
            
            // Composite index for brand + status (common query pattern)
            $table->index(['brand', 'status']);
            
            // Index for created_at (sorting by newest)
            $table->index('created_at');
            
            // Index for view_count (sorting by popularity)
            $table->index('view_count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop indexes in reverse order
            $table->dropIndex(['products_slug_index']);
            $table->dropIndex(['products_brand_index']);
            $table->dropIndex(['products_status_index']);
            $table->dropIndex(['products_stock_status_index']);
            $table->dropIndex(['products_featured_index']);
            $table->dropIndex(['products_brand_status_index']);
            $table->dropIndex(['products_created_at_index']);
            $table->dropIndex(['products_view_count_index']);
        });
    }
};
