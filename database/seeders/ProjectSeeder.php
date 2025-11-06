<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get categories
        $smartHome = ProjectCategory::where('slug', 'nha-thong-minh')->first();
        $villa = ProjectCategory::where('slug', 'biet-thu')->first();
        $office = ProjectCategory::where('slug', 'van-phong-thong-minh')->first();
        $automation = ProjectCategory::where('slug', 'tu-dong-hoa')->first();

        $projects = [
            [
                'title' => 'Biệt thự cao cấp Vinhomes Riverside',
                'slug' => 'biet-thu-cao-cap-vinhomes-riverside',
                'short_description' => 'Hệ thống nhà thông minh cao cấp với công nghệ ABB và Vantage, điều khiển toàn bộ chiếu sáng, HVAC, rèm cửa tự động.',
                'project_category_id' => $villa?->id,
                'project_category_id_2' => $smartHome?->id,
                'detail_1_title' => 'Khách hàng',
                'detail_1_value' => 'Gia đình Nguyễn Văn A',
                'detail_2_title' => 'Loại dự án',
                'detail_2_value' => 'Biệt thự cao cấp',
                'detail_3_title' => 'Hoàn thành',
                'detail_3_value' => '15/10/2025',
                'detail_4_title' => 'Hệ thống',
                'detail_4_value' => 'ABB / Vantage',
                'banner_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
                'thumbnail_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
                'overview_title' => 'Tổng quan dự án',
                'overview_content' => '<p>Dự án triển khai hệ thống nhà thông minh toàn diện cho biệt thự cao cấp tại Vinhomes Riverside, Hà Nội. Hệ thống tích hợp công nghệ từ ABB và Vantage, mang lại sự tiện nghi tối đa cho gia chủ.</p><ul><li>Hệ thống điều khiển chiếu sáng thông minh 100+ điểm</li><li>Điều khiển HVAC tự động theo thời gian và cảm biến</li><li>Hệ thống an ninh và camera giám sát</li><li>Rèm cửa tự động điều khiển bằng giọng nói</li><li>Quản lý năng lượng thông minh</li></ul>',
                'slider_images' => json_encode([
                    'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-2.jpg',
                    'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-3.jpg',
                    'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-4.jpg',
                ]),
                'secondary_title' => 'Quy trình triển khai chuyên nghiệp',
                'detail_steps' => json_encode([
                    [
                        'number' => '01',
                        'title' => 'Khảo sát & Tư vấn',
                        'description' => 'Đội ngũ kỹ thuật khảo sát thực địa, phân tích nhu cầu và đưa ra giải pháp tối ưu nhất cho công trình.'
                    ],
                    [
                        'number' => '02',
                        'title' => 'Thiết kế hệ thống',
                        'description' => 'Thiết kế chi tiết sơ đồ hệ thống, lựa chọn thiết bị phù hợp và lập kế hoạch triển khai.'
                    ],
                    [
                        'number' => '03',
                        'title' => 'Lắp đặt & Vận hành',
                        'description' => 'Thi công lắp đặt chuyên nghiệp, cài đặt cấu hình và hướng dẫn vận hành cho khách hàng.'
                    ]
                ]),
                'gallery_image_1' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-5.jpg',
                'gallery_image_2' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-6.jpg',
                'gallery_image_3' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-7.jpg',
                'status' => 'published',
                'featured' => true,
                'order' => 1,
                'meta_title' => 'Dự án Biệt thự Vinhomes Riverside - AIControl',
                'meta_description' => 'Hệ thống nhà thông minh cao cấp với công nghệ ABB và Vantage cho biệt thự Vinhomes Riverside.',
                'meta_keywords' => 'nhà thông minh, biệt thự, ABB, Vantage, Vinhomes',
                'view_count' => 0,
                'published_at' => now(),
            ],
            [
                'title' => 'Văn phòng thông minh Tòa nhà Detech',
                'slug' => 'van-phong-thong-minh-toa-nha-detech',
                'short_description' => 'Giải pháp văn phòng thông minh tiết kiệm năng lượng với hệ thống Legrand và Schneider Electric.',
                'project_category_id' => $office?->id,
                'project_category_id_2' => $automation?->id,
                'detail_1_title' => 'Khách hàng',
                'detail_1_value' => 'Công ty TNHH ABC',
                'detail_2_title' => 'Loại dự án',
                'detail_2_value' => 'Văn phòng 500m²',
                'detail_3_title' => 'Hoàn thành',
                'detail_3_value' => '20/09/2025',
                'detail_4_title' => 'Hệ thống',
                'detail_4_value' => 'Legrand / Schneider',
                'banner_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
                'thumbnail_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
                'overview_title' => 'Thông tin dự án',
                'overview_content' => '<p>Triển khai hệ thống văn phòng thông minh cho tòa nhà Detech, tập trung vào tiết kiệm năng lượng và tối ưu hóa môi trường làm việc.</p><ul><li>Hệ thống chiếu sáng tự động theo cảm biến ánh sáng</li><li>Điều khiển HVAC thông minh</li><li>Hệ thống kiểm soát ra vào</li><li>Quản lý năng lượng tập trung</li></ul>',
                'slider_images' => json_encode([
                    'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-2.jpg',
                    'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-3.jpg',
                ]),
                'secondary_title' => 'Giải pháp tiết kiệm năng lượng',
                'detail_steps' => json_encode([
                    [
                        'number' => '01',
                        'title' => 'Phân tích hiện trạng',
                        'description' => 'Đánh giá hệ thống hiện tại và xác định điểm cần cải thiện.'
                    ],
                    [
                        'number' => '02',
                        'title' => 'Thiết kế tối ưu',
                        'description' => 'Thiết kế hệ thống tiết kiệm năng lượng tối đa.'
                    ],
                    [
                        'number' => '03',
                        'title' => 'Triển khai',
                        'description' => 'Lắp đặt và vận hành hệ thống mới.'
                    ]
                ]),
                'gallery_image_1' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-5.jpg',
                'gallery_image_2' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-6.jpg',
                'gallery_image_3' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-7.jpg',
                'status' => 'published',
                'featured' => false,
                'order' => 2,
                'meta_title' => 'Văn phòng thông minh Detech - AIControl',
                'meta_description' => 'Giải pháp văn phòng thông minh tiết kiệm năng lượng với Legrand và Schneider.',
                'meta_keywords' => 'văn phòng thông minh, Legrand, Schneider, tiết kiệm năng lượng',
                'view_count' => 0,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Nhà phố thông minh Phú Mỹ Hưng',
                'slug' => 'nha-pho-thong-minh-phu-my-hung',
                'short_description' => 'Dự án nhà phố thông minh với hệ thống điều khiển tập trung, tích hợp giọng nói và ứng dụng di động.',
                'project_category_id' => $smartHome?->id,
                'project_category_id_2' => null,
                'detail_1_title' => 'Khách hàng',
                'detail_1_value' => 'Gia đình Trần Thị B',
                'detail_2_title' => 'Loại dự án',
                'detail_2_value' => 'Nhà phố 3 tầng',
                'detail_3_title' => 'Hoàn thành',
                'detail_3_value' => '05/11/2025',
                'detail_4_title' => 'Hệ thống',
                'detail_4_value' => 'ABB / Loxone',
                'banner_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
                'thumbnail_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
                'overview_title' => 'Tổng quan dự án',
                'overview_content' => '<p>Dự án nhà phố 3 tầng tại Phú Mỹ Hưng với hệ thống điều khiển toàn diện, tích hợp điều khiển giọng nói và app di động.</p><ul><li>Điều khiển chiếu sáng thông minh</li><li>Rèm cửa tự động</li><li>Hệ thống âm thanh đa vùng</li><li>Camera an ninh AI</li></ul>',
                'slider_images' => json_encode([
                    'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-2.jpg',
                ]),
                'secondary_title' => 'Tính năng nổi bật',
                'detail_steps' => json_encode([
                    [
                        'number' => '01',
                        'title' => 'Điều khiển giọng nói',
                        'description' => 'Tích hợp Google Home và Amazon Alexa.'
                    ],
                    [
                        'number' => '02',
                        'title' => 'App di động',
                        'description' => 'Điều khiển từ xa mọi lúc mọi nơi.'
                    ]
                ]),
                'gallery_image_1' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-5.jpg',
                'gallery_image_2' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-6.jpg',
                'gallery_image_3' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-7.jpg',
                'status' => 'published',
                'featured' => true,
                'order' => 3,
                'meta_title' => 'Nhà phố thông minh Phú Mỹ Hưng - AIControl',
                'meta_description' => 'Nhà phố 3 tầng với hệ thống điều khiển giọng nói và app di động.',
                'meta_keywords' => 'nhà phố thông minh, điều khiển giọng nói, ABB, Loxone',
                'view_count' => 0,
                'published_at' => now()->subDays(1),
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('Projects seeded successfully!');
    }
}
