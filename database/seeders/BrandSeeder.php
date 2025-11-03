<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'ABB',
                'slug' => 'abb',
                'description' => 'ABB is a pioneering technology leader in electrification and automation.',
                'website' => 'https://new.abb.com',
                'status' => 1,
            ],
            [
                'name' => 'Legrand',
                'slug' => 'legrand',
                'description' => 'Legrand is the global specialist in electrical and digital building infrastructures.',
                'website' => 'https://www.legrand.com',
                'status' => 1,
            ],
            [
                'name' => 'CP Electronics',
                'slug' => 'cp-electronics',
                'description' => 'CP Electronics specializes in lighting control and energy management solutions.',
                'website' => 'https://www.cpelectronics.co.uk',
                'status' => 1,
            ],
            [
                'name' => 'Vantage',
                'slug' => 'vantage',
                'description' => 'Vantage provides luxury home automation and lighting control systems.',
                'website' => 'https://www.vantagecontrols.com',
                'status' => 1,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']],
                $brand
            );
        }
    }
}
