# Database Structure for Projects Module

## Overview
This database structure is designed for managing project portfolios with full SEO optimization, flexible categorization, and rich media support.

## Tables Structure

### 1. **projects** (Main Table)
Core table storing all project information.

#### Columns:
- **id**: Primary key
- **title**: Project title (displayed on page)
- **slug**: URL-friendly unique identifier (e.g., `du-an-nha-thong-minh-abc`)
- **short_description**: Brief summary for listings/cards
- **description**: Full project description (rich text/HTML)

#### Project Details:
- **client_name**: Client/customer name
- **project_type**: Type of project (Smart Home, Office, Commercial, etc.)
- **completed_date**: When project was finished
- **system_brand**: Technology brands used (ABB, Vantage, Legrand, etc.)
- **location**: Project location
- **budget**: Project budget (optional)
- **duration**: How long the project took

#### Publishing:
- **status**: `draft`, `published`, `archived`
- **featured**: Boolean - highlight important projects
- **order**: Sort order for display
- **published_at**: Publication timestamp

#### Images:
- **banner_image**: Main large banner image
- **thumbnail_image**: Thumbnail for listings/cards

#### SEO Fields:
- **meta_title**: Custom page title for SEO (max 60 chars recommended)
- **meta_description**: Meta description tag (max 160 chars recommended)
- **meta_keywords**: Keywords for SEO
- **og_image**: Open Graph image for Facebook/social media sharing
- **canonical_url**: Canonical URL to prevent duplicate content

#### Analytics:
- **view_count**: Track how many times project was viewed
- **timestamps**: created_at, updated_at
- **softDeletes**: deleted_at (soft delete support)

---

### 2. **project_categories**
Categories for organizing projects (many-to-many relationship).

#### Columns:
- **id**: Primary key
- **name**: Category name (e.g., "Nhà thông minh", "Văn phòng")
- **slug**: URL-friendly identifier
- **description**: Category description
- **icon**: Icon/image for category
- **order**: Display order
- **status**: `active`, `inactive`
- **meta_title**: SEO title
- **meta_description**: SEO description

**Example Categories:**
- Nhà thông minh (Smart Home)
- Văn phòng thông minh (Smart Office)
- Khách sạn (Hotel)
- Biệt thự (Villa)
- Chung cư cao cấp (Luxury Apartment)

---

### 3. **project_project_category** (Pivot Table)
Links projects to categories (many-to-many).

#### Columns:
- **id**: Primary key
- **project_id**: Foreign key to projects
- **project_category_id**: Foreign key to project_categories
- **Unique constraint**: Prevents duplicate category assignments

---

### 4. **project_images**
Multiple images per project (slider, gallery, detail images).

#### Columns:
- **id**: Primary key
- **project_id**: Foreign key to projects
- **image_path**: Path to image file
- **title**: Image title/alt text (SEO)
- **description**: Image description
- **type**: Image type:
  - `slider`: Main slider images (3-5 images)
  - `gallery`: Additional gallery images
  - `detail`: Detail/close-up images
- **order**: Display order

---

### 5. **project_features**
Key features/highlights of the project (bullet points).

#### Columns:
- **id**: Primary key
- **project_id**: Foreign key to projects
- **title**: Feature title (e.g., "Hệ thống chiếu sáng thông minh")
- **description**: Detailed description (optional)
- **icon**: Icon class or image path
- **order**: Display order

**Example Features:**
- Hệ thống điều khiển chiếu sáng thông minh
- Điều khiển HVAC tự động
- Hệ thống an ninh và giám sát
- Quản lý năng lượng thông minh

---

### 6. **project_steps**
Project implementation steps/process (for "Quy trình triển khai" section).

#### Columns:
- **id**: Primary key
- **project_id**: Foreign key to projects
- **title**: Step title (e.g., "Khảo sát & Tư vấn")
- **description**: Step description
- **step_number**: Step number (01, 02, 03)
- **order**: Display order

---

## Relationships Diagram

```
projects (1) ←→ (N) project_project_category ←→ (N) project_categories
   ↓ (1:N)
project_images
   ↓ (1:N)
project_features
   ↓ (1:N)
project_steps
```

---

## SEO Benefits

### 1. **Unique URLs**
- `slug` field ensures SEO-friendly URLs
- Example: `/du-an/nha-thong-minh-abc-123`

### 2. **Meta Tags**
- Custom `meta_title`, `meta_description` per project
- `og_image` for social media sharing optimization

### 3. **Image SEO**
- `title` and `description` for each image
- Alt text for accessibility and SEO

### 4. **Structured Data Ready**
- Easy to generate JSON-LD schema markup
- Project name, date, description, images

### 5. **Content Organization**
- Categories for logical grouping
- Featured projects for homepage
- View count for popularity tracking

---

## Indexes for Performance

### projects table:
- `slug` (unique, indexed)
- `status` (indexed)
- `featured` (indexed)
- `published_at` (indexed)

### project_categories table:
- `slug` (unique, indexed)
- `status` (indexed)

### project_images table:
- `(project_id, type)` composite index
- `order` (indexed)

### Soft Deletes:
All main tables support soft deletes for data recovery.

---

## Sample Data Flow

### Creating a Project:
1. Create project in `projects` table
2. Assign categories via `project_project_category`
3. Upload images to `project_images`
4. Add features to `project_features`
5. Define steps in `project_steps`

### Displaying a Project:
```sql
SELECT * FROM projects WHERE slug = 'du-an-abc' AND status = 'published';
-- Load related data
SELECT * FROM project_categories WHERE id IN (SELECT project_category_id FROM project_project_category WHERE project_id = ?);
SELECT * FROM project_images WHERE project_id = ? ORDER BY order;
SELECT * FROM project_features WHERE project_id = ? ORDER BY order;
SELECT * FROM project_steps WHERE project_id = ? ORDER BY step_number;
```

---

## Next Steps

1. Run migrations: `php artisan migrate`
2. Create models with relationships
3. Create admin CRUD interface
4. Create frontend display pages
5. Add seeder for sample data
6. Implement image upload functionality
7. Add sitemap generation for SEO
