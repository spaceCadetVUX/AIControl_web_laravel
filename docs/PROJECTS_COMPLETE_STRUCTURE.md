# Project System Structure & Flow

## Overview
The Project system showcases completed smart home installations with rich media galleries, slider images with alt texts, implementation steps, and comprehensive SEO optimization.

---

## 📊 Database Layer

### Main Table: `projects`
**Migration:** `database/migrations/2025_11_06_000005_create_projects_table.php`

**Full Schema:**
```
├── id (Primary Key)
│
├── Basic Information
│   ├── title (string) - Project name (H1)
│   ├── slug (string, unique) - URL-friendly identifier
│   └── short_description (text, nullable) - For listing page preview
│
├── Categories (Foreign Keys)
│   ├── project_category_id (FK → project_categories.id, nullable)
│   └── project_category_id_2 (FK → project_categories.id, nullable)
│
├── Project Details (4 Info Boxes)
│   ├── detail_1_title (nullable) - e.g., "Client"
│   ├── detail_1_value (nullable) - e.g., "Envato"
│   ├── detail_2_title (nullable) - e.g., "Role"
│   ├── detail_2_value (nullable) - e.g., "Branding"
│   ├── detail_3_title (nullable) - e.g., "Duration"
│   ├── detail_3_value (nullable) - e.g., "8 March 2025"
│   ├── detail_4_title (nullable) - e.g., "Designer"
│   └── detail_4_value (nullable) - e.g., "ThemePure"
│
├── Hero Images
│   ├── banner_image (text, nullable) - Main large banner
│   └── thumbnail_image (text, nullable) - Grid listing thumbnail
│
├── Overview Section
│   ├── overview_title (string, nullable, default='Thông tin dự án')
│   └── overview_content (longText, nullable) - Rich text (TinyMCE)
│
├── Slider Images (NEW FORMAT ✅)
│   └── slider_images (JSON, nullable)
│       Format: [
│           {"url": "path/to/image1.jpg", "alt": "Description 1"},
│           {"url": "path/to/image2.jpg", "alt": "Description 2"}
│       ]
│       Backward compatible with old format: ["url1", "url2"]
│
├── Implementation Steps Section
│   ├── secondary_title (string, nullable) - Big title above steps
│   └── detail_steps (JSON, nullable)
│       Format: [
│           {"title": "Step 1", "description": "Details..."},
│           {"title": "Step 2", "description": "Details..."}
│       ]
│
├── Bottom Gallery (3 Images)
│   ├── gallery_image_1 (text, nullable) - Large full-width image
│   ├── gallery_image_2 (text, nullable) - Left half image
│   └── gallery_image_3 (text, nullable) - Right half image
│
├── Status & Display
│   ├── status (enum: 'draft'|'published', default='draft')
│   ├── featured (boolean, default=false)
│   └── order (integer, default=0) - Custom sort order
│
├── SEO & Meta
│   ├── meta_title (string, nullable)
│   ├── meta_description (text, nullable)
│   ├── meta_keywords (text, nullable)
│   └── og_image (string, nullable) - Open Graph image
│
├── Analytics
│   ├── view_count (unsignedBigInteger, default=0)
│   └── published_at (timestamp, nullable)
│
└── Timestamps
    ├── created_at
    ├── updated_at
    └── deleted_at (SoftDeletes)
```

### Related Table: `project_categories`
```
├── id (Primary Key)
├── name (Category name)
├── slug (URL-friendly)
├── description (nullable)
├── order (Display order)
├── is_active (boolean)
├── created_at
├── updated_at
└── deleted_at (SoftDeletes)
```

---

## 📁 Complete File Tree

```
AIControl_web_laravel_master/
│
├── DATABASE LAYER
│   └── database/migrations/
│       ├── 2025_11_06_000004_create_project_categories_table.php
│       └── 2025_11_06_000005_create_projects_table.php
│
├── MODEL LAYER  
│   └── app/Models/
│       ├── Project.php ............................ ✅ SoftDeletes, Auto-SEO, JSON casts
│       └── ProjectCategory.php
│
├── BACKEND (Admin Panel)
│   ├── app/Http/Controllers/Admin/
│   │   └── DashboardController.php ............... ✅ CRUD methods updated
│   │       ├── projects()              - List all projects
│   │       ├── createProject()         - Show create form
│   │       ├── storeProject()          - Create ✅ slider upload
│   │       ├── editProject()           - Show edit form
│   │       ├── updateProject()         - Update ✅ slider upload
│   │       ├── deleteProject()         - Soft delete
│   │       ├── projectCategories()     - List categories
│   │       ├── createProjectCategory() - Show category form
│   │       ├── storeProjectCategory()  - Create category
│   │       ├── editProjectCategory()   - Show category edit
│   │       ├── updateProjectCategory() - Update category
│   │       └── deleteProjectCategory() - Delete category
│   │
│   └── resources/views/admin/
│       ├── projects.blade.php ..................... Admin list
│       ├── projects-create.blade.php .............. ✅ New slider UI
│       ├── projects-edit.blade.php ................ ✅ Updated slider UI
│       ├── project-categories.blade.php
│       ├── project-categories-create.blade.php
│       └── project-categories-edit.blade.php
│
├── FRONTEND (User Display)
│   ├── app/Http/Controllers/
│   │   └── ProjectController.php ................. Public display
│   │       ├── index()         - List projects (/du-an)
│   │       ├── byCategory()    - Filter by category
│   │       └── show($slug)     - Project detail (/du-an/{slug})
│   │
│   └── resources/views/front/
│       ├── projects.blade.php ..................... Grid listing
│       └── projectDetails.blade.php ............... ✅ Updated display
│
├── ROUTING
│   └── routes/web.php
│       ├── Frontend Routes (Lines 56-60)
│       │   └── Route::prefix('du-an') ->group([
│       │         'index', 'byCategory', 'show'
│       │       ])
│       └── Admin Routes (Lines 152-159)
│           └── Route::prefix('admin') ->group([
│                 'projects CRUD', 'project-categories CRUD'
│               ])
│
└── STORAGE (Image Uploads)
    └── public/assets/AIcontrol_imgs/AllProjectImgs/
        ├── {timestamp}_banner_{filename}.jpg
        ├── {timestamp}_thumb_{filename}.jpg
        ├── {timestamp}_gallery1_{filename}.jpg
        ├── {timestamp}_slider0_{filename}.jpg ..... ✅ NEW
        └── {timestamp}_og_{filename}.jpg
```

---

## 🔄 Complete Data Flow

### 1. Admin Creates Project
```
Admin → /admin/projects/create
    ↓
[DashboardController@createProject]
    ↓
Load: ProjectCategory::where('is_active', true)->get()
    ↓
Render: projects-create.blade.php
    ├── Tab 1: Basic Info (title, slug, categories, details)
    ├── Tab 2: Images (banner, thumbnail, gallery, OG)
    ├── Tab 3: Content (overview TinyMCE, detail steps)
    ├── Tab 4: Slider Images ✅ (file upload + URL + alt text)
    ├── Tab 5: SEO (meta fields)
    └── Tab 6: Publishing (status, featured, published_at)
    ↓
Admin fills form & uploads files
    ↓
Submit → POST /admin/projects
    ↓
[DashboardController@storeProject]
    ↓
Validate 35+ fields
    ↓
Process Images:
    ├── Banner → upload to AllProjectImgs/ ✅
    ├── Thumbnail → upload to AllProjectImgs/ ✅
    ├── Gallery (1-3) → upload to AllProjectImgs/ ✅
    ├── OG Image → upload to AllProjectImgs/ ✅
    └── Slider Images ✅:
        ├── Loop through slider_image_files[]
        ├── Upload each file → AllProjectImgs/
        ├── Build: {url: "path", alt: "text"}
        └── Store JSON: slider_images field
    ↓
Build detail_steps array from separate inputs
    ↓
Auto-generate: slug, meta_title, meta_description, published_at
    ↓
Database: INSERT into projects table
    ↓
Redirect → /admin/projects with success message
```

### 2. User Views Projects
```
User → /du-an
    ↓
[ProjectController@index]
    ↓
Query: Project::published()
        ->with(['category', 'categorySecondary'])
        ->ordered()
        ->paginate(12)
    ↓
Scope Check:
    ├── status = 'published'
    ├── published_at IS NOT NULL
    └── published_at <= NOW()
    ↓
Load categories via relationships
    ↓
Database: SELECT * FROM projects
           LEFT JOIN project_categories ON ...
    ↓
Render: projects.blade.php
    ├── Grid of project cards
    ├── Each card:
    │   ├── Thumbnail (asset helper)
    │   ├── Categories (cat1, cat2)
    │   ├── Title
    │   ├── Short description
    │   └── Link to detail page
    └── Pagination
    ↓
User clicks project
    ↓
Navigate → /du-an/{slug}
```

### 3. User Views Project Detail
```
User → /du-an/{slug}
    ↓
[ProjectController@show]
    ↓
Query: Project::where('slug', $slug)
        ->published()
        ->with(['category', 'categorySecondary'])
        ->firstOrFail()
    ↓
Increment view_count
    ↓
Database: UPDATE projects SET view_count = view_count + 1
    ↓
Render: projectDetails.blade.php
    ├── Hero: Banner image
    ├── Info Boxes: 4 detail fields
    ├── Overview: TinyMCE content
    ├── Slider Images ✅:
    │   ├── Loop: $project->slider_images
    │   ├── Check format: is_array($item)
    │   ├── Extract: url (required), alt (optional)
    │   ├── Use asset() for local paths
    │   └── Display with proper alt text
    ├── Implementation Steps: detail_steps array
    ├── Gallery: 3 images (gallery_image_1/2/3) ✅
    └── SEO: meta tags, canonical, OG
    ↓
User sees complete project showcase
```

### 4. Admin Edits Project
```
Admin → /admin/projects/{id}/edit
    ↓
[DashboardController@editProject]
    ↓
Query: Project::findOrFail($id)
        ProjectCategory::where('is_active', true)->get()
    ↓
Render: projects-edit.blade.php
    ├── Pre-fill all fields from $project
    ├── Display existing images
    ├── Slider section ✅:
    │   ├── Loop existing slider_images
    │   ├── Handle old format: "url string"
    │   ├── Handle new format: {url, alt}
    │   ├── Display existing images
    │   ├── Show alt text in inputs
    │   └── Allow adding new images
    └── JavaScript: addSliderImage(), removeSliderImage()
    ↓
Admin modifies form
    ↓
Submit → PUT /admin/projects/{id}
    ↓
[DashboardController@updateProject]
    ↓
Validate fields
    ↓
Process Images:
    ├── If new file uploaded:
    │   ├── Delete old file (if exists)
    │   └── Upload new → AllProjectImgs/ ✅
    └── Slider Images ✅:
        ├── Preserve: existing_slider_images[]
        ├── Upload new files → AllProjectImgs/
        ├── Merge existing + new
        └── Store combined JSON array
    ↓
Update detail_steps array
    ↓
Database: UPDATE projects SET ... WHERE id = {id}
    ↓
Redirect → /admin/projects with success
```

---

## 🔗 Database Relationships

```
projects table
    ↓
    ├── belongsTo: project_categories (project_category_id)
    │   └── Returns: $project->category
    │
    └── belongsTo: project_categories (project_category_id_2)
        └── Returns: $project->categorySecondary

project_categories table
    ↓
    └── hasMany: projects
        ├── Via project_category_id
        └── Via project_category_id_2
```

---

## ✅ Recent Improvements

### 1. Slider Images Enhancement
**Before:**
- Only accepted URL strings
- No file upload
- No alt text support
- Format: `["url1", "url2"]`

**After:**
- ✅ File upload support
- ✅ Alt text for SEO
- ✅ Image preview on select
- ✅ Format: `[{url: "...", alt: "..."}, ...]`
- ✅ Backward compatible
- ✅ All uploads → AllProjectImgs/

**Files Modified:**
1. `projects-create.blade.php` - New slider UI
2. `projects-edit.blade.php` - Updated with compatibility
3. `DashboardController@storeProject` - File upload processing
4. `DashboardController@updateProject` - Preserve + add new
5. `projectDetails.blade.php` - Display with alt text

### 2. Gallery Images Fix
**Problem:** Wrong variable names (`gallery_1/2/3`)  
**Fix:** Changed to `gallery_image_1/2/3` ✅

### 3. Projects Not Showing Fix
**Problem:** Soft-deleted + future published_at dates  
**Fix:** Restored records + updated dates ✅

---

**Last Updated:** November 7, 2025  
**Status:** ✅ Fully documented and operational
