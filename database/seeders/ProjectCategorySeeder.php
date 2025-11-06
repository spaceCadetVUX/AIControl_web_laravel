<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Nhà thông minh',
                'slug' => 'nha-thong-minh',
                'description' => 'Dự án nhà ở thông minh với hệ thống tự động hóa toàn diện',
                'icon' => 'fas fa-home',
                'order' => 1,
                'status' => 'active',
            ],
            [
                'name' => 'Văn phòng thông minh',
                'slug' => 'van-phong-thong-minh',
                'description' => 'Giải pháp văn phòng thông minh, tiết kiệm năng lượng',
                'icon' => 'fas fa-building',
                'order' => 2,
                'status' => 'active',
            ],
            [
                'name' => 'Khách sạn',
                'slug' => 'khach-san',
                'description' => 'Hệ thống điều khiển cho khách sạn và resort',
                'icon' => 'fas fa-hotel',
                'order' => 3,
                'status' => 'active',
            ],
            [
                'name' => 'Biệt thự',
                'slug' => 'biet-thu',
                'description' => 'Dự án biệt thự cao cấp với công nghệ tiên tiến',
                'icon' => 'fas fa-crown',
                'order' => 4,
                'status' => 'active',
            ],
            [
                'name' => 'Chung cư cao cấp',
                'slug' => 'chung-cu-cao-cap',
                'description' => 'Giải pháp tự động hóa cho chung cư, căn hộ cao cấp',
                'icon' => 'fas fa-city',
                'order' => 5,
                'status' => 'active',
            ],
            [
                'name' => 'Nhà hàng',
                'slug' => 'nha-hang',
                'description' => 'Hệ thống chiếu sáng và điều khiển cho nhà hàng',
                'icon' => 'fas fa-utensils',
                'order' => 6,
                'status' => 'active',
            ],
            [
                'name' => 'Showroom',
                'slug' => 'showroom',
                'description' => 'Giải pháp điều khiển chiếu sáng cho showroom',
                'icon' => 'fas fa-store',
                'order' => 7,
                'status' => 'active',
            ],
            [
                'name' => 'Tự động hóa',
                'slug' => 'tu-dong-hoa',
                'description' => 'Các dự án tự động hóa công nghiệp và dân dụng',
                'icon' => 'fas fa-robot',
                'order' => 8,
                'status' => 'active',
            ],
        ];

        foreach ($categories as $category) {
            ProjectCategory::create($category);
        }

        $this->command->info('Project categories seeded successfully!');
    }
}
