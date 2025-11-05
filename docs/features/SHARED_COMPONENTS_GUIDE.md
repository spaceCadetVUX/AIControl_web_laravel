# Shared Components Usage Guide

## Overview
This project now has **reusable header, footer, and offcanvas menu components** that can be shared across all pages.

## Component Files Location
```
resources/views/front/includes/
├── header.blade.php      → Main header with logo, menu button, search, CTA
├── footer.blade.php      → Footer with links, contact info, copyright
└── offcanvas.blade.php   → Slide-out menu with navigation & contact
```

## How to Use in Any Page

### Basic Usage
```blade
<!DOCTYPE html>
<html>
<head>
    <!-- Your head content, CSS includes -->
</head>
<body>
    
    <!-- Include offcanvas menu -->
    @include('front.includes.offcanvas')
    
    <!-- Include header -->
    @include('front.includes.header')
    
    <!-- YOUR PAGE CONTENT HERE -->
    <main>
        <h1>Your Page Content</h1>
        <!-- ... -->
    </main>
    
    <!-- Include footer -->
    @include('front.includes.footer')
    
    <!-- Your scripts -->
</body>
</html>
```

### Example: Creating a New Page

**File**: `resources/views/front/about.blade.php`

```blade
<!doctype html>
<html class="no-js agntix-light" lang="zxx">
<head>
    <meta charset="utf-8">
    <title>About Us | AIControl</title>
    <link rel="stylesheet" href="{{ assets('assets/css/main.css') }}">
</head>
<body>

    @include('front.includes.offcanvas')
    @include('front.includes.header')
    
    <main>
        <!-- About Page Content -->
        <div class="about-area pt-120 pb-120">
            <div class="container">
                <h1>About AIControl</h1>
                <!-- Your content... -->
            </div>
        </div>
    </main>
    
    @include('front.includes.footer')
    
    <script src="{{ assets('assets/js/main.js') }}"></script>
</body>
</html>
```

## Components Details

### 1. Header (`header.blade.php`)
**Features:**
- Logo (center)
- Menu button (left) - Opens offcanvas
- Language selector (EN/FR)
- Search button
- "GỌI NGAY" (Call Now) button
- Mobile navigation menu

**Customization:**
- Update logo: Change `assets/AIcontrol_imgs/mian_Icon/aicontrol-co-mau.svg`
- Modify navigation: Edit the `<nav class="tp-mobile-menu-active">` section
- Change languages: Update the `.tp-header-8-lang` links

### 2. Footer (`footer.blade.php`)
**Features:**
- Company logo and description
- Newsletter subscription form
- Quick links (About, Blogs, Contact, etc.)
- Contact information (Phone, Email, Address)
- Social media links
- Copyright notice with dynamic year: `{{ date('Y') }}`

**Customization:**
- Update contact info in footer widget columns
- Modify menu links in each `.ar-footer-widget` section
- Change social links (ZALO, Facebook, YouTube, LinkedIn)

### 3. Offcanvas Menu (`offcanvas.blade.php`)
**Features:**
- Slide-out menu from both sides
- Left side: Logo and navigation menu placeholder
- Right side: Contact information
  - Hotline: 0918.918.755
  - Email: sales@knxstore.vn
  - Address: 110 Trương Văn Bang, Thạnh Mỹ Lợi, Thủ Đức
- Social media icons (Facebook, YouTube, Instagram)
- Close buttons on both sides

**Customization:**
- Update contact info in `.tp-offcanvas-2-right-info-item` sections
- Add menu items in `.tp-offcanvas-menu` navigation

## Benefits of Using Shared Components

✅ **Code Reusability** - Write once, use everywhere
✅ **Easy Maintenance** - Update in one place, reflects on all pages
✅ **Consistency** - Same header/footer across entire website
✅ **Faster Development** - No need to copy/paste code
✅ **Reduced File Size** - Smaller individual page files

## Pages That Should Use These Components

Apply these components to all your frontend pages:
- ✅ index.blade.php (Homepage)
- ✅ abb.blade.php
- ✅ legrand.blade.php
- ✅ cpElectronics.blade.php
- ✅ vantage.blade.php
- ✅ lighting_control_solutions.blade.php
- ✅ hvac_control_solutions.blade.php
- ✅ security_solutions.blade.php
- ✅ contact-us-light.blade.php

## Migration Checklist

When converting an existing page:

1. ✅ Remove the header HTML (lines 179-287)
2. ✅ Replace with: `@include('front.includes.header')`
3. ✅ Remove the footer HTML (lines 1104-1198)
4. ✅ Replace with: `@include('front.includes.footer')`
5. ✅ Remove offcanvas HTML (lines 77-177)
6. ✅ Replace with: `@include('front.includes.offcanvas')`
7. ✅ Test the page to ensure everything works

## Technical Notes

- All components use the `{{ assets() }}` helper for asset URLs
- Components are located in `resources/views/front/includes/`
- Footer includes dynamic year: `{{ date('Y') }}`
- All links currently use static HTML paths (consider converting to Laravel routes later)

## Next Steps

1. Convert remaining pages to use these shared components
2. Update static links to use Laravel `route()` helpers
3. Create additional shared components if needed (e.g., preloader, search modal, etc.)
4. Consider creating a master layout template for even better code organization

---

**Created:** October 30, 2025  
**Purpose:** Improve code maintainability and consistency across the AIControl website
