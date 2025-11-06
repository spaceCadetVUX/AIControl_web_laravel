<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create root blog categories
        $technology = BlogCategory::create([
            'name' => 'Technology',
            'slug' => 'technology',
            'description' => 'Latest technology trends and innovations',
            'parent_id' => null,
            'status' => 1,
            'order' => 1,
        ]);

        $homeAutomation = BlogCategory::create([
            'name' => 'Home Automation',
            'slug' => 'home-automation',
            'description' => 'Smart home automation guides and tips',
            'parent_id' => null,
            'status' => 1,
            'order' => 2,
        ]);

        $tutorials = BlogCategory::create([
            'name' => 'Tutorials',
            'slug' => 'tutorials',
            'description' => 'Step-by-step guides and how-tos',
            'parent_id' => null,
            'status' => 1,
            'order' => 3,
        ]);

        $news = BlogCategory::create([
            'name' => 'News',
            'slug' => 'news',
            'description' => 'Latest news and updates',
            'parent_id' => null,
            'status' => 1,
            'order' => 4,
        ]);

        $reviews = BlogCategory::create([
            'name' => 'Reviews',
            'slug' => 'reviews',
            'description' => 'Product reviews and comparisons',
            'parent_id' => null,
            'status' => 1,
            'order' => 5,
        ]);

        // Create subcategories for Technology
        BlogCategory::create([
            'name' => 'Smart Devices',
            'slug' => 'smart-devices',
            'description' => 'Smart devices and IoT',
            'parent_id' => $technology->id,
            'status' => 1,
            'order' => 1,
        ]);

        BlogCategory::create([
            'name' => 'AI & Machine Learning',
            'slug' => 'ai-machine-learning',
            'description' => 'Artificial Intelligence and ML updates',
            'parent_id' => $technology->id,
            'status' => 1,
            'order' => 2,
        ]);

        // Create subcategories for Home Automation
        BlogCategory::create([
            'name' => 'Lighting Control',
            'slug' => 'lighting-control-blog',
            'description' => 'Smart lighting solutions and tips',
            'parent_id' => $homeAutomation->id,
            'status' => 1,
            'order' => 1,
        ]);

        BlogCategory::create([
            'name' => 'Security Systems',
            'slug' => 'security-systems-blog',
            'description' => 'Home security and surveillance',
            'parent_id' => $homeAutomation->id,
            'status' => 1,
            'order' => 2,
        ]);

        BlogCategory::create([
            'name' => 'Climate Control',
            'slug' => 'climate-control',
            'description' => 'HVAC and climate automation',
            'parent_id' => $homeAutomation->id,
            'status' => 1,
            'order' => 3,
        ]);

        // Create subcategories for Tutorials
        BlogCategory::create([
            'name' => 'Installation Guides',
            'slug' => 'installation-guides',
            'description' => 'Step-by-step installation instructions',
            'parent_id' => $tutorials->id,
            'status' => 1,
            'order' => 1,
        ]);

        BlogCategory::create([
            'name' => 'Troubleshooting',
            'slug' => 'troubleshooting',
            'description' => 'Common issues and solutions',
            'parent_id' => $tutorials->id,
            'status' => 1,
            'order' => 2,
        ]);

        echo "Blog categories seeded successfully!\n";
    }
}
