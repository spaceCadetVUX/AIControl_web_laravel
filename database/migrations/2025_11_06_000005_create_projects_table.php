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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            // Basic Information
            $table->string('title'); // Project title (h1)
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->text('short_description')->nullable(); // For listing page
            
            // Categories - Foreign Keys
            $table->foreignId('project_category_id')->nullable()->constrained('project_categories')->onDelete('set null');
            $table->foreignId('project_category_id_2')->nullable()->constrained('project_categories')->onDelete('set null');
            
            // Project Details (4 detail boxes)
            $table->string('detail_1_title')->nullable(); // e.g., "Client"
            $table->string('detail_1_value')->nullable(); // e.g., "Envato"
            $table->string('detail_2_title')->nullable(); // e.g., "Role"
            $table->string('detail_2_value')->nullable(); // e.g., "Branding"
            $table->string('detail_3_title')->nullable(); // e.g., "Duration"
            $table->string('detail_3_value')->nullable(); // e.g., "8 March 2025"
            $table->string('detail_4_title')->nullable(); // e.g., "Designer"
            $table->string('detail_4_value')->nullable(); // e.g., "ThemePure"
            
            // Banner Image
            $table->text('banner_image')->nullable(); // Main large banner
            $table->text('thumbnail_image')->nullable(); // For grid listing
            
            // Overview Section (TinyMCE content)
            $table->string('overview_title')->nullable()->default('Thông tin dự án'); // Section title
            $table->longText('overview_content')->nullable(); // Rich text content (TinyMCE)
            
            // Slider Images (multiple images)
            $table->json('slider_images')->nullable(); // Array of slider image paths
            
            // Secondary Section (optional repeatable)
            $table->string('secondary_title')->nullable(); // Big title above steps
            $table->json('detail_steps')->nullable(); // Array of [{title, description}]
            
            // Bottom Gallery (3 images)
            $table->text('gallery_image_1')->nullable(); // Large full-width image
            $table->text('gallery_image_2')->nullable(); // Left half image
            $table->text('gallery_image_3')->nullable(); // Right half image
            
            // Project Status
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('featured')->default(false);
            $table->integer('order')->default(0);
            
            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_image')->nullable();
            
            // Analytics
            $table->unsignedBigInteger('view_count')->default(0);
            $table->timestamp('published_at')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('slug');
            $table->index('status');
            $table->index('featured');
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
