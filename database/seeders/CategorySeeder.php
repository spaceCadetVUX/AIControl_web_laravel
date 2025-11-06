<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeder.
     *
     * @return void
     */
    public function run()
    {
        // Clear existing categories
        DB::table('category_product')->truncate();
        Category::query()->forceDelete();

        // Create root categories
        $automation = Category::create([
            'name' => 'Home Automation',
            'slug' => 'home-automation',
            'description' => 'Smart home automation products and systems',
            'status' => true,
            'order' => 1,
        ]);

        $security = Category::create([
            'name' => 'Security Systems',
            'slug' => 'security-systems',
            'description' => 'Advanced security and surveillance solutions',
            'status' => true,
            'order' => 2,
        ]);

        $lighting = Category::create([
            'name' => 'Lighting Control',
            'slug' => 'lighting-control',
            'description' => 'Smart lighting and control systems',
            'status' => true,
            'order' => 3,
        ]);

        $hvac = Category::create([
            'name' => 'HVAC Control',
            'slug' => 'hvac-control',
            'description' => 'Heating, ventilation, and air conditioning control',
            'status' => true,
            'order' => 4,
        ]);

        $energy = Category::create([
            'name' => 'Energy Management',
            'slug' => 'energy-management',
            'description' => 'Energy monitoring and management solutions',
            'status' => true,
            'order' => 5,
        ]);

        // Create subcategories for Home Automation
        Category::create([
            'name' => 'Controllers',
            'slug' => 'controllers',
            'description' => 'Central control units and processors',
            'parent_id' => $automation->id,
            'status' => true,
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Sensors',
            'slug' => 'sensors',
            'description' => 'Motion, temperature, and environmental sensors',
            'parent_id' => $automation->id,
            'status' => true,
            'order' => 2,
        ]);

        Category::create([
            'name' => 'Touch Panels',
            'slug' => 'touch-panels',
            'description' => 'Wall-mounted and wireless control panels',
            'parent_id' => $automation->id,
            'status' => true,
            'order' => 3,
        ]);

        // Create subcategories for Security
        Category::create([
            'name' => 'CCTV Cameras',
            'slug' => 'cctv-cameras',
            'description' => 'IP and analog surveillance cameras',
            'parent_id' => $security->id,
            'status' => true,
            'order' => 1,
        ]);

        Category::create([
            'name' => 'Access Control',
            'slug' => 'access-control',
            'description' => 'Door locks and access management',
            'parent_id' => $security->id,
            'status' => true,
            'order' => 2,
        ]);

        Category::create([
            'name' => 'Alarm Systems',
            'slug' => 'alarm-systems',
            'description' => 'Intrusion detection and alarm systems',
            'parent_id' => $security->id,
            'status' => true,
            'order' => 3,
        ]);

        // Create subcategories for Lighting
        Category::create([
            'name' => 'Dimmers',
            'slug' => 'dimmers',
            'description' => 'Light dimming controls and switches',
            'parent_id' => $lighting->id,
            'status' => true,
            'order' => 1,
        ]);

        Category::create([
            'name' => 'LED Lighting',
            'slug' => 'led-lighting',
            'description' => 'Smart LED bulbs and fixtures',
            'parent_id' => $lighting->id,
            'status' => true,
            'order' => 2,
        ]);

        $this->command->info('Categories created successfully!');
        $this->command->info('Root Categories: 5');
        $this->command->info('Subcategories: 8');
        $this->command->info('Total: ' . Category::count() . ' categories');
    }
}
