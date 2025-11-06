# Projects Database - Single Table Structure

## Table: `projects`

### Basic Fields
| Field | Type | Description |
|-------|------|-------------|
| **id** | bigint | Primary key |
| **title** | string | Project title |
| **slug** | string (unique) | URL-friendly identifier |
| **short_description** | text | Brief summary |
| **description** | longtext | Full project description (HTML) |

### Project Details
| Field | Type | Description |
|-------|------|-------------|
| **client_name** | string | Client/customer name |
| **project_type** | string | Type (Nhà thông minh, Văn phòng, etc.) |
| **completed_date** | date | Completion date |
| **system_brand** | string | Technology brands (ABB / Vantage) |
| **location** | string | Project location |
| **categories** | string | Categories (comma-separated) |

### Images (JSON Fields)
| Field | Type | Description | Example |
|-------|------|-------------|---------|
| **banner_image** | text | Main banner image path | `assets/img/projects/banner-1.jpg` |
| **thumbnail_image** | text | Thumbnail for listing | `assets/img/projects/thumb-1.jpg` |
| **slider_images** | JSON | Array of slider images | `["img1.jpg", "img2.jpg", "img3.jpg"]` |
| **gallery_images** | JSON | Array of gallery images | `["gallery1.jpg", "gallery2.jpg"]` |

### Features (JSON Field)
| Field | Type | Description | Example |
|-------|------|-------------|---------|
| **features** | JSON | Array of feature items | See below |

**Features JSON Structure:**
```json
[
  "Hệ thống điều khiển chiếu sáng thông minh",
  "Điều khiển HVAC tự động",
  "Hệ thống an ninh và giám sát",
  "Quản lý năng lượng thông minh",
  "Tích hợp điều khiển rèm, cửa tự động"
]
```

### Steps (JSON Field)
| Field | Type | Description | Example |
|-------|------|-------------|---------|
| **steps** | JSON | Implementation process steps | See below |

**Steps JSON Structure:**
```json
[
  {
    "number": "01",
    "title": "Khảo sát & Tư vấn",
    "description": "Đội ngũ kỹ thuật khảo sát thực địa, phân tích nhu cầu và đưa ra giải pháp tối ưu nhất cho từng công trình."
  },
  {
    "number": "02",
    "title": "Thiết kế hệ thống",
    "description": "Thiết kế chi tiết sơ đồ hệ thống, lựa chọn thiết bị phù hợp và lập kế hoạch triển khai cụ thể."
  },
  {
    "number": "03",
    "title": "Lắp đặt & Vận hành",
    "description": "Thi công lắp đặt chuyên nghiệp, cài đặt cấu hình hệ thống và hướng dẫn vận hành cho khách hàng."
  }
]
```

### Status & Publishing
| Field | Type | Description |
|-------|------|-------------|
| **status** | enum | `draft`, `published`, `archived` |
| **featured** | boolean | Highlight on homepage |
| **order** | integer | Display sort order |
| **published_at** | timestamp | Publication date |

### SEO Fields
| Field | Type | Description |
|-------|------|-------------|
| **meta_title** | string | Page title for SEO (60 chars max) |
| **meta_description** | text | Meta description (160 chars max) |
| **meta_keywords** | text | SEO keywords |
| **og_image** | string | Social media share image |

### Analytics
| Field | Type | Description |
|-------|------|-------------|
| **view_count** | bigint | Page view counter |

### Timestamps
| Field | Type | Description |
|-------|------|-------------|
| **created_at** | timestamp | Record creation time |
| **updated_at** | timestamp | Last update time |
| **deleted_at** | timestamp | Soft delete (nullable) |

---

## Sample Data Example

```php
[
    'title' => 'Dự án mẫu AIControl',
    'slug' => 'du-an-mau-aicontrol',
    'short_description' => 'Hệ thống điều khiển thông minh toàn diện',
    'description' => '<p>Dự án triển khai hệ thống điều khiển thông minh...</p>',
    'client_name' => 'Tên khách hàng',
    'project_type' => 'Nhà thông minh',
    'completed_date' => '2025-11-06',
    'system_brand' => 'ABB / Vantage',
    'location' => 'Hà Nội',
    'categories' => 'Hệ thống thông minh,Tự động hóa',
    'banner_image' => 'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg',
    'thumbnail_image' => 'assets/img/portfolio/thumb-1.jpg',
    'slider_images' => json_encode([
        'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-2.jpg',
        'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-3.jpg',
        'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-4.jpg'
    ]),
    'gallery_images' => json_encode([
        'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-5.jpg',
        'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-6.jpg',
        'assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-7.jpg'
    ]),
    'features' => json_encode([
        'Hệ thống điều khiển chiếu sáng thông minh',
        'Điều khiển HVAC tự động',
        'Hệ thống an ninh và giám sát',
        'Quản lý năng lượng thông minh',
        'Tích hợp điều khiển rèm, cửa tự động'
    ]),
    'steps' => json_encode([
        [
            'number' => '01',
            'title' => 'Khảo sát & Tư vấn',
            'description' => 'Đội ngũ kỹ thuật khảo sát thực địa, phân tích nhu cầu và đưa ra giải pháp tối ưu nhất cho từng công trình.'
        ],
        [
            'number' => '02',
            'title' => 'Thiết kế hệ thống',
            'description' => 'Thiết kế chi tiết sơ đồ hệ thống, lựa chọn thiết bị phù hợp và lập kế hoạch triển khai cụ thể.'
        ],
        [
            'number' => '03',
            'title' => 'Lắp đặt & Vận hành',
            'description' => 'Thi công lắp đặt chuyên nghiệp, cài đặt cấu hình hệ thống và hướng dẫn vận hành cho khách hàng.'
        ]
    ]),
    'status' => 'published',
    'featured' => true,
    'order' => 1,
    'meta_title' => 'Dự án mẫu AIControl - Hệ thống điều khiển thông minh',
    'meta_description' => 'Khám phá dự án hệ thống điều khiển thông minh toàn diện của AIControl với công nghệ ABB, Vantage.',
    'meta_keywords' => 'nhà thông minh, điều khiển thông minh, ABB, Vantage, tự động hóa',
    'og_image' => 'assets/img/portfolio/og-image.jpg',
    'view_count' => 0,
    'published_at' => now()
]
```

---

## Advantages of Single Table

✅ **Simple to manage** - One table, one admin form  
✅ **Easy queries** - No complex joins  
✅ **Flexible** - JSON fields can store any structure  
✅ **Fast** - All data in one query  
✅ **SEO-ready** - All SEO fields included  

---

## Next Steps

1. Run migration: `php artisan migrate`
2. Create Project model
3. Create admin CRUD
4. Create seeder with sample data
