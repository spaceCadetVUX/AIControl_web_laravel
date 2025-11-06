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
        Schema::create('blog_blog_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_category_id');
            $table->unsignedBigInteger('blog_id');
            $table->timestamps();

            // Foreign keys
            $table->foreign('blog_category_id')
                  ->references('id')
                  ->on('blog_categories')
                  ->onDelete('cascade');
                  
            $table->foreign('blog_id')
                  ->references('id')
                  ->on('blogs')
                  ->onDelete('cascade');

            // Prevent duplicate relationships
            $table->unique(['blog_category_id', 'blog_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_blog_category');
    }
};
