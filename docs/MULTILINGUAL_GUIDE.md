# Hướng Dẫn Đa Ngôn Ngữ cho AIControl Website

## ✅ Đã Hoàn Thành

### 1. Language Files (Bước 1)
- ✅ Tạo thư mục `lang/vi/` cho tiếng Việt
- ✅ Tạo `lang/vi/common.php` - Từ ngữ chung (navigation, buttons, v.v.)
- ✅ Tạo `lang/en/common.php` - English version
- ✅ Tạo `lang/vi/hotel.php` - Nội dung trang hotel
- ✅ Tạo `lang/en/hotel.php` - English version

### 2. Middleware (Bước 2)
- ✅ Tạo `app/Http/Middleware/SetLocale.php`
- ✅ Đăng ký middleware vào `app/Http/Kernel.php` (web group)
- ✅ Set default locale = `vi` trong `config/app.php`

### 3. Routes (Bước 3)
- ✅ Helper functions trong `app/helpers.php`:
  - `current_locale()` - Lấy ngôn ngữ hiện tại
  - `switch_locale_url($locale)` - Chuyển đổi URL sang ngôn ngữ khác
  - `localized_route()` - Tạo route với locale
- ✅ Update `routes/web.php` với locale prefix:
  - Vietnamese (default): Không có prefix (ví dụ: `/du-an`)
  - English: Có prefix `/en` (ví dụ: `/en/du-an`)

### 4. SEO Meta Tags (Bước 4)
- ✅ Thêm hreflang tags vào `resources/views/layouts/front.blade.php`:
  - `<link rel="alternate" hreflang="vi" href="..." />`
  - `<link rel="alternate" hreflang="en" href="..." />`
  - `<link rel="alternate" hreflang="x-default" href="..." />`
- ✅ Dynamic `lang` attribute trong `<html>`
- ✅ OG locale alternate tags

### 5. Language Switcher (Bước 5)
- ✅ Tạo component `resources/views/components/language-switcher.blade.php`
- ✅ Thêm vào header `resources/views/front/includes/header.blade.php`
- ✅ Dropdown UI với flag icons (🇻🇳 VI / 🇬🇧 EN)

### 6. Demo Translation (Bước 6)
- ✅ Update hero section của `holtelcontrol.blade.php` sử dụng `{{ __('hotel.key') }}`

---

## 📝 Cần Làm Tiếp

### 7. Translate Tất Cả Trang (Bước quan trọng)

#### Cách sử dụng translation:
```blade
<!-- Thay vì hard-code text: -->
<h1>Trang Chủ</h1>

<!-- Dùng translation key: -->
<h1>{{ __('common.home') }}</h1>
```

#### Các trang cần update:
1. **Navigation/Header** (`resources/views/front/includes/header.blade.php`)
   - Menu items: Trang chủ, Giải pháp, Sản phẩm, v.v.
   - Search placeholder
   - Buttons: "GỌI NGAY" → `{{ __('common.contact_us') }}`

2. **Footer** (`resources/views/front/includes/footer.blade.php`)
   - Links
   - Copyright text
   - Contact info labels

3. **Home Page** (`resources/views/front/index.blade.php`)
   - Hero titles
   - Service descriptions
   - CTA buttons

4. **Solution Pages**
   - `lightingControl.blade.php`
   - `hvacControl.blade.php`
   - `security.blade.php`
   - `bms.blade.php`
   - `shade.blade.php`

5. **Brand Pages**
   - `abb.blade.php`
   - `legrand.blade.php`
   - `vantage.blade.php`
   - `cpElectronics.blade.php`

6. **Other Pages**
   - `shop.blade.php` (products)
   - `projects.blade.php` (projects listing)
   - `blog.blade.php` (blog listing)
   - `contact.blade.php`

#### Tạo thêm language files:
Tạo các file sau trong cả `lang/vi/` và `lang/en/`:

```php
// lang/vi/solutions.php
return [
    'lighting_title' => 'Điều Khiển Chiếu Sáng Thông Minh',
    'lighting_desc' => 'Giải pháp điều khiển...',
    // ... thêm keys khác
];

// lang/vi/products.php
return [
    'title' => 'Sản Phẩm',
    'search_placeholder' => 'Tìm kiếm sản phẩm...',
    // ...
];

// lang/vi/projects.php
// lang/vi/blog.php
// lang/vi/contact.php
```

### 8. Test & Debug (Bước 7)

#### Test các cases:
1. ✅ Truy cập `/` (tiếng Việt - default)
2. ✅ Truy cập `/en` (English homepage)
3. ✅ Truy cập `/en/du-an` (English projects)
4. ✅ Click language switcher
5. ✅ Check hreflang tags trong source code (View Page Source)
6. ✅ Test Google Search Console (sau deploy)

#### Commands hữu ích:
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# List all routes
php artisan route:list

# Run local server
php artisan serve
```

---

## 🎯 Cấu Trúc URL SEO

### Vietnamese (Default - No Prefix)
```
https://aicontrol.vn/
https://aicontrol.vn/du-an
https://aicontrol.vn/san-pham
https://aicontrol.vn/blog
https://aicontrol.vn/dieu-khien-khach-san
```

### English (With /en Prefix)
```
https://aicontrol.vn/en
https://aicontrol.vn/en/du-an
https://aicontrol.vn/en/san-pham
https://aicontrol.vn/en/blog
https://aicontrol.vn/en/dieu-khien-khach-san
```

**Lưu ý:** Slug paths giữ nguyên (không translate), chỉ content hiển thị được translate.

---

## 🔧 Troubleshooting

### Lỗi thường gặp:

1. **Translation key không hiển thị**
   - Check file `lang/vi/file.php` có tồn tại không
   - Check key có đúng format: `__('file.key')`
   - Clear cache: `php artisan config:clear`

2. **Route không hoạt động**
   - Check `routes/web.php` có wrap trong locale group không
   - Check middleware `SetLocale` đã được register
   - Run: `php artisan route:list` để xem tất cả routes

3. **Language switcher không đổi ngôn ngữ**
   - Check helper function `switch_locale_url()` trong `app/helpers.php`
   - Check middleware có set locale đúng không
   - Clear browser cache

4. **Hreflang không xuất hiện**
   - Check layout `resources/views/layouts/front.blade.php`
   - View page source (Ctrl+U) để xem HTML raw

---

## 📊 Lợi Ích SEO

### Google sẽ:
✅ Index riêng mỗi phiên bản ngôn ngữ  
✅ Hiển thị đúng version cho user theo region  
✅ Không penalty duplicate content (nhờ hreflang)  
✅ Improve user experience với language switcher  

### Performance:
✅ Không cần reload page khi switch language  
✅ Clean URL structure  
✅ Fast locale detection (middleware)  

---

## 🚀 Next Steps

1. **Tạo thêm language files** cho từng section
2. **Update từng trang** thay hard-coded text bằng `{{ __('key') }}`
3. **Test kỹ trên local** trước khi deploy
4. **Submit sitemap** lên Google Search Console với cả 2 versions
5. **Monitor Analytics** để track traffic theo ngôn ngữ

---

## 📞 Support

Nếu gặp lỗi, check các file sau:
- `app/Http/Middleware/SetLocale.php` - Locale detection
- `routes/web.php` - Route definitions
- `app/helpers.php` - Helper functions
- `config/app.php` - Default locale settings

Happy coding! 🎉
