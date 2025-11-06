# Projects Database Structure - Mapped to Template

## Template Analysis & Database Mapping

### 1. **Project Header Section**
```blade
{{-- Categories (2 tags) --}}
<span>Website</span>
<span>Services</span>

{{-- Project Title --}}
<h1>Olivia Rivers</h1>
```

**Database Fields:**
- `category_1` → "Website"
- `category_2` → "Services"
- `title` → "Olivia Rivers"
- `slug` → "olivia-rivers" (auto-generated)

---

### 2. **Project Details (4 Items)**
```blade
{{-- Detail 1 --}}
<span>Client</span>
<h6>Envato</h6>

{{-- Detail 2 --}}
<span>Role</span>
<h6>Branding</h6>

{{-- Detail 3 --}}
<span>Duration</span>
<h6>8 March 2025</h6>

{{-- Detail 4 --}}
<span>Designer</span>
<h6>ThemePure</h6>
```

**Database Fields:**
- `detail_1_title` → "Client" | `detail_1_value` → "Envato"
- `detail_2_title` → "Role" | `detail_2_value` → "Branding"
- `detail_3_title` → "Duration" | `detail_3_value` → "8 March 2025"
- `detail_4_title` → "Designer" | `detail_4_value` → "ThemePure"

---

### 3. **Banner Image**
```blade
<img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg">
```

**Database Fields:**
- `banner_image` → "assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-1.jpg"
- `thumbnail_image` → "assets/img/portfolio/thumb-1.jpg" (for grid view)

---

### 4. **Overview Section (TinyMCE)**
```blade
<h2>Thông tin dự án</h2>
<div class="tp-pd-2-overview-wrap">
    <p>Content here...</p>
    <p>More content...</p>
    <ul>
        <li>Item 1</li>
        <li>Item 2</li>
    </ul>
</div>
```

**Database Fields:**
- `overview_title` → "Thông tin dự án"
- `overview_content` → Full HTML content (TinyMCE editor)

---

### 5. **Slider Images (Multiple)**
```blade
<div class="swiper-slide">
    <img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-2.jpg">
</div>
<div class="swiper-slide">
    <img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-3.jpg">
</div>
<div class="swiper-slide">
    <img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-4.jpg">
</div>
```

**Database Field (JSON):**
```json
slider_images: [
    "assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-2.jpg",
    "assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-3.jpg",
    "assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-4.jpg"
]
```

---

### 6. **Secondary Section (Title + Steps)**
```blade
<h2>Out of love for stylish & functional WP themes...</h2>

<div class="tp-pd-2-step-item">
    <h4>01. Development</h4>
    <span>A wonderful serenity has taken possession...</span>
</div>
<div class="tp-pd-2-step-item">
    <h4>02. Concept Design</h4>
    <span>A wonderful serenity has taken possession...</span>
</div>
<div class="tp-pd-2-step-item">
    <h4>03. Implementation</h4>
    <span>A wonderful serenity has taken possession...</span>
</div>
```

**Database Fields:**
- `secondary_title` → "Out of love for stylish & functional WP themes..."
- `detail_steps` (JSON):
```json
[
    {
        "number": "01",
        "title": "Development",
        "description": "A wonderful serenity has taken possession..."
    },
    {
        "number": "02",
        "title": "Concept Design",
        "description": "A wonderful serenity has taken possession..."
    },
    {
        "number": "03",
        "title": "Implementation",
        "description": "A wonderful serenity has taken possession..."
    }
]
```

---

### 7. **Bottom Gallery (3 Images)**
```blade
{{-- Full width image --}}
<div class="col-lg-12">
    <img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-5.jpg">
</div>

{{-- Two half-width images --}}
<div class="col-lg-6">
    <img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-6.jpg">
</div>
<div class="col-lg-6">
    <img src="assets/img/portfolio/portfolio-details-2/portfolio-details-thumb-7.jpg">
</div>
```

**Database Fields:**
- `gallery_image_1` → "assets/img/.../thumb-5.jpg" (full width)
- `gallery_image_2` → "assets/img/.../thumb-6.jpg" (left half)
- `gallery_image_3` → "assets/img/.../thumb-7.jpg" (right half)

---

## Complete Table Structure

```sql
CREATE TABLE `projects` (
  `id` bigint UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  
  -- Basic Info
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) UNIQUE NOT NULL,
  `short_description` text,
  
  -- Categories (2 tags)
  `category_1` varchar(255),
  `category_2` varchar(255),
  
  -- 4 Detail Items
  `detail_1_title` varchar(255),
  `detail_1_value` varchar(255),
  `detail_2_title` varchar(255),
  `detail_2_value` varchar(255),
  `detail_3_title` varchar(255),
  `detail_3_value` varchar(255),
  `detail_4_title` varchar(255),
  `detail_4_value` varchar(255),
  
  -- Images
  `banner_image` text,
  `thumbnail_image` text,
  
  -- Overview Section (TinyMCE)
  `overview_title` varchar(255) DEFAULT 'Thông tin dự án',
  `overview_content` longtext,
  
  -- Slider Images (JSON array)
  `slider_images` json,
  
  -- Secondary Section
  `secondary_title` varchar(255),
  `detail_steps` json,
  
  -- Gallery (3 images)
  `gallery_image_1` text,
  `gallery_image_2` text,
  `gallery_image_3` text,
  
  -- Publishing
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `featured` tinyint(1) DEFAULT 0,
  `order` int DEFAULT 0,
  
  -- SEO
  `meta_title` varchar(255),
  `meta_description` text,
  `meta_keywords` text,
  `og_image` varchar(255),
  
  -- Analytics
  `view_count` bigint UNSIGNED DEFAULT 0,
  `published_at` timestamp NULL,
  
  -- Timestamps
  `created_at` timestamp NULL,
  `updated_at` timestamp NULL,
  `deleted_at` timestamp NULL,
  
  KEY `idx_slug` (`slug`),
  KEY `idx_status` (`status`),
  KEY `idx_featured` (`featured`),
  KEY `idx_published_at` (`published_at`)
);
```

---

## Sample Data

```php
[
    'title' => 'Dự án Smart Home ABC',
    'slug' => 'du-an-smart-home-abc',
    'short_description' => 'Hệ thống nhà thông minh cao cấp',
    
    // Categories
    'category_1' => 'Hệ thống thông minh',
    'category_2' => 'Tự động hóa',
    
    // Details
    'detail_1_title' => 'Khách hàng',
    'detail_1_value' => 'Công ty ABC',
    'detail_2_title' => 'Loại dự án',
    'detail_2_value' => 'Nhà thông minh',
    'detail_3_title' => 'Hoàn thành',
    'detail_3_value' => '15/10/2025',
    'detail_4_title' => 'Hệ thống',
    'detail_4_value' => 'ABB / Vantage',
    
    // Images
    'banner_image' => 'storage/projects/banner-1.jpg',
    'thumbnail_image' => 'storage/projects/thumb-1.jpg',
    
    // Overview
    'overview_title' => 'Thông tin dự án',
    'overview_content' => '<p>Dự án triển khai...</p><ul><li>Feature 1</li></ul>',
    
    // Slider
    'slider_images' => json_encode([
        'storage/projects/slider-1.jpg',
        'storage/projects/slider-2.jpg',
        'storage/projects/slider-3.jpg'
    ]),
    
    // Steps
    'secondary_title' => 'Quy trình triển khai chuyên nghiệp',
    'detail_steps' => json_encode([
        [
            'number' => '01',
            'title' => 'Khảo sát',
            'description' => 'Khảo sát thực địa...'
        ],
        [
            'number' => '02',
            'title' => 'Thiết kế',
            'description' => 'Thiết kế hệ thống...'
        ],
        [
            'number' => '03',
            'title' => 'Thi công',
            'description' => 'Lắp đặt và vận hành...'
        ]
    ]),
    
    // Gallery
    'gallery_image_1' => 'storage/projects/gallery-1.jpg',
    'gallery_image_2' => 'storage/projects/gallery-2.jpg',
    'gallery_image_3' => 'storage/projects/gallery-3.jpg',
    
    // Publishing
    'status' => 'published',
    'featured' => true,
    'order' => 1,
    
    // SEO
    'meta_title' => 'Dự án Smart Home ABC - AIControl',
    'meta_description' => 'Khám phá dự án nhà thông minh cao cấp...',
    'meta_keywords' => 'smart home, nhà thông minh, ABB',
    'og_image' => 'storage/projects/og-image-1.jpg',
    
    'published_at' => now()
]
```

---

## Admin Form Structure

### Section 1: Basic Information
- Title (text)
- Slug (auto-generated from title)
- Short Description (textarea)
- Thumbnail Image (file upload)
- Categories: Category 1, Category 2 (text inputs)

### Section 2: Detail Items (4 boxes)
- Detail 1: Title + Value
- Detail 2: Title + Value
- Detail 3: Title + Value
- Detail 4: Title + Value

### Section 3: Images
- Banner Image (file upload)
- Slider Images (multiple file upload, sortable)
- Gallery Images (3 file uploads)

### Section 4: Overview Section
- Overview Title (text, default: "Thông tin dự án")
- Overview Content (TinyMCE editor)

### Section 5: Detail Steps (Repeatable)
- Secondary Title (text)
- Steps (add/remove, each with: number, title, description)

### Section 6: SEO & Publishing
- Meta Title, Meta Description, Meta Keywords
- OG Image
- Status, Featured, Order
- Published At

---

## Next Steps

1. ✅ Migration created
2. Create Project model with casts for JSON fields
3. Create admin CRUD with TinyMCE integration
4. Create seeder for sample data
5. Update projectDetails.blade.php to use database data
6. Reuse blog grid layout for projects listing page
