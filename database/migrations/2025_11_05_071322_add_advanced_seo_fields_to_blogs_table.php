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
        Schema::table('blogs', function (Blueprint $table) {
            // ============================================
            // MEDIA ENHANCEMENTS
            // ============================================
            $table->string('featured_image_alt', 255)->nullable()->after('featured_image')->comment('Alt text for featured image (SEO)');
            $table->json('gallery_images')->nullable()->after('featured_image_alt')->comment('Additional images with alt text');
            
            // ============================================
            // PUBLISHING & VISIBILITY
            // ============================================
            $table->enum('status', ['draft', 'published', 'scheduled', 'archived'])->default('draft')->after('is_published')->index();
            $table->timestamp('scheduled_at')->nullable()->after('status')->comment('Future publish date');
            
            // ============================================
            // SEO - META TAGS (Update lengths)
            // ============================================
            $table->enum('robots', ['index,follow', 'index,nofollow', 'noindex,follow', 'noindex,nofollow'])->default('index,follow')->after('indexable');
            
            // ============================================
            // SEO - OPEN GRAPH (Social Media)
            // ============================================
            $table->string('og_title', 100)->nullable()->after('robots')->comment('Facebook/LinkedIn title');
            $table->text('og_description')->nullable()->after('og_title')->comment('Facebook/LinkedIn description');
            $table->string('og_image', 500)->nullable()->after('og_description')->comment('Social media share image');
            $table->string('og_type', 50)->default('article')->after('og_image')->comment('Open Graph type');
            
            // ============================================
            // SEO - TWITTER CARD
            // ============================================
            $table->string('twitter_card', 50)->default('summary_large_image')->after('og_type')->comment('summary, summary_large_image');
            $table->string('twitter_title', 100)->nullable()->after('twitter_card');
            $table->text('twitter_description')->nullable()->after('twitter_title');
            $table->string('twitter_image', 500)->nullable()->after('twitter_description');
            
            // ============================================
            // SEO - STRUCTURED DATA (JSON-LD)
            // ============================================
            $table->json('structured_data')->nullable()->after('twitter_image')->comment('Schema.org JSON-LD markup');
            
            // ============================================
            // ANALYTICS & ENGAGEMENT
            // ============================================
            $table->unsignedBigInteger('view_count')->default(0)->after('structured_data')->comment('Total views');
            $table->unsignedBigInteger('share_count')->default(0)->after('view_count')->comment('Social shares');
            $table->unsignedInteger('reading_time')->nullable()->after('share_count')->comment('Estimated reading time in minutes');
            
            // ============================================
            // ADDITIONAL SEO SETTINGS
            // ============================================
            $table->string('focus_keyword', 100)->nullable()->after('reading_time')->comment('Primary SEO keyword');
            $table->decimal('seo_score', 5, 2)->nullable()->after('focus_keyword')->comment('SEO quality score (0-100)');
            $table->string('breadcrumb_title', 100)->nullable()->after('seo_score')->comment('Custom breadcrumb text');
            
            // ============================================
            // CONTENT VERSIONING
            // ============================================
            $table->timestamp('last_modified_at')->nullable()->after('breadcrumb_title')->comment('Content last updated');
            $table->foreignId('last_modified_by')->nullable()->after('last_modified_at')->constrained('users')->onDelete('set null');
            
            // ============================================
            // SOFT DELETES
            // ============================================
            $table->softDeletes()->after('updated_at')->comment('Soft delete for recovery');
            
            // ============================================
            // INDEXES FOR PERFORMANCE
            // ============================================
            $table->index(['category', 'is_published'], 'idx_category_published');
            $table->index('status', 'idx_status');
            
            // Full-text search index (if MySQL 5.6+ and doesn't exist)
            if (DB::connection()->getDriverName() === 'mysql') {
                // Check if index doesn't already exist
                $indexExists = DB::select("SHOW INDEX FROM blogs WHERE Key_name = 'idx_search'");
                if (empty($indexExists)) {
                    DB::statement('ALTER TABLE blogs ADD FULLTEXT INDEX idx_search (title, excerpt, content)');
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            // Drop indexes first
            $table->dropIndex('idx_category_published');
            $table->dropIndex('idx_status');
            
            // Drop full-text index
            if (DB::connection()->getDriverName() === 'mysql') {
                DB::statement('ALTER TABLE blogs DROP INDEX idx_search');
            }
            
            // Drop columns in reverse order
            $table->dropSoftDeletes();
            $table->dropForeign(['last_modified_by']);
            $table->dropColumn([
                'last_modified_by',
                'last_modified_at',
                'breadcrumb_title',
                'seo_score',
                'focus_keyword',
                'reading_time',
                'share_count',
                'view_count',
                'structured_data',
                'twitter_image',
                'twitter_description',
                'twitter_title',
                'twitter_card',
                'og_type',
                'og_image',
                'og_description',
                'og_title',
                'robots',
                'scheduled_at',
                'status',
                'gallery_images',
                'featured_image_alt',
            ]);
        });
    }
};
