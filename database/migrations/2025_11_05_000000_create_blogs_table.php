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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            
            // Basic blog information
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('featured_image')->nullable();
            
            // Author and categorization
            $table->foreignId('author_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('category')->nullable();
            $table->json('tags')->nullable();
            
            // Publishing
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_published')->default(false);
            
            // SEO fields
            $table->boolean('indexable')->default(true);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            
            $table->timestamps();
            
            // Indexes for performance
            $table->index('slug');
            $table->index('is_published');
            $table->index('published_at');
            $table->index('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
