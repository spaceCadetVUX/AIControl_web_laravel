# AIControl Web Application

🏢 **Smart Building Control & Automation Platform**

Laravel-based web application for managing smart building products, brands, and blog content with comprehensive admin panel.

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Documentation](#documentation)
- [Project Structure](#project-structure)
- [Key Features](#key-features)
- [Development](#development)

---

## 🎯 Overview

AIControl is a comprehensive web platform for smart building automation, featuring:
- Product catalog with advanced search and filtering
- Multi-brand management (Legrand, CP Electronics, Vantage, etc.)
- SEO-optimized blog system for technical content
- Secure admin panel with role-based access control
- Vietnamese language support

---

## ✨ Features

### 🛍️ Product Management
- Full CRUD operations for products
- Brand association and filtering
- Image gallery with multiple uploads
- Click and view tracking
- SEO optimization (meta tags, structured data)
- Advanced specifications management

### 📝 Blog System
- Rich text editor (TinyMCE 6)
- Vietnamese slug generation
- SEO-optimized (Open Graph, Twitter Cards, JSON-LD)
- Category and tag filtering
- Related posts
- Reading time estimation
- Publish scheduling

### 🔐 Admin Panel
- Secure authentication with session management
- Role-based access control (Admin/User)
- Account lockout after failed login attempts
- Password recovery system
- Activity logging
- Dashboard with statistics

### 🎨 Frontend
- Responsive design
- Product catalog with search
- Blog listing and detail pages
- Brand showcase pages
- Contact forms
- SEO-friendly URLs

---

## 🛠️ Tech Stack

### Backend
- **Framework:** Laravel 9.x
- **PHP:** 8.0+
- **Database:** MySQL
- **Authentication:** Laravel Breeze

### Frontend
- **CSS Framework:** Tailwind CSS
- **Build Tool:** Vite
- **JavaScript:** Vanilla JS + Alpine.js
- **Rich Text Editor:** TinyMCE 6

### Development
- **Server:** XAMPP (Apache + MySQL)
- **Package Manager:** Composer, NPM
- **Version Control:** Git

---

## 📦 Requirements

- PHP >= 8.0
- Composer
- Node.js & NPM
- MySQL >= 5.7
- Apache/Nginx web server

---

## 🚀 Installation

### 1. Clone Repository
```bash
git clone https://github.com/spaceCadetVUX/AIControl_web_laravel.git
cd AIControl_web_laravel_master
```

### 2. Install Dependencies
```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install
```

### 3. Environment Setup
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Configure Database
Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=aicontrol_db
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run Migrations
```bash
php artisan migrate --seed
```

### 6. Create Storage Link
```bash
php artisan storage:link
```

### 7. Build Assets
```bash
# Development
npm run dev

# Production
npm run build
```

### 8. Start Development Server
```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 📚 Documentation

Comprehensive documentation is available in the `/docs` folder:

### Admin Guides
- [Admin Panel Guide](docs/admin/ADMIN_GUIDE.md) - Complete admin panel usage
- [Authentication Guide](docs/admin/ADMIN_AUTHENTICATION_GUIDE.md) - Login, security, sessions
- [Product Management](docs/admin/PRODUCT_MANAGEMENT_GUIDE.md) - Managing products and brands

### Features
- [Blog SEO Setup](docs/features/BLOG_SEO_SETUP.md) - Blog system and SEO optimization
- [Password Recovery](docs/features/PASSWORD_RECOVERY_GUIDE.md) - Password reset flow
- [Shared Components](docs/features/SHARED_COMPONENTS_GUIDE.md) - Reusable UI components

### Technical
- [Code Organization](docs/technical/CODE_ORGANIZATION_SUMMARY.md) - Project structure
- [Security Analysis](docs/technical/SECURITY_ANALYSIS.md) - Security measures
- [TinyMCE Implementation](docs/technical/TINYMCE_IMPLEMENTATION.md) - Rich text editor setup
- [Rich Text Editor Summary](docs/technical/RICH_TEXT_EDITOR_SUMMARY.md) - Editor features

### Setup
- [Project Structure](docs/PROJECT_STRUCTURE.md) - Detailed file organization guide
- [Setup Guide](docs/setup.md) - Initial setup and configuration

---

## 📁 Project Structure

```
AIControl_web_laravel_master/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   ├── Auth/           # Authentication controllers
│   │   └── Front/          # Public-facing controllers
│   ├── Models/             # Eloquent models
│   └── helpers.php         # Helper functions
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── docs/                   # Documentation (organized)
│   ├── admin/             # Admin guides
│   ├── features/          # Feature documentation
│   └── technical/         # Technical docs
├── public/
│   └── assets/
│       ├── AIcontrol_imgs/ # Image uploads
│       ├── css/           # Stylesheets
│       └── js/            # JavaScript files
├── resources/
│   ├── views/
│   │   ├── admin/         # Admin panel views
│   │   ├── auth/          # Authentication views
│   │   ├── front/         # Public views
│   │   └── layouts/       # Layout templates
│   ├── css/               # Source CSS
│   └── js/                # Source JavaScript
└── routes/
    ├── web.php            # Web routes
    ├── api.php            # API routes
    └── auth.php           # Auth routes
```

---

## 🔑 Key Features

### Blog System
- **SEO-Optimized:** Meta tags, Open Graph, Twitter Cards, JSON-LD schemas
- **Vietnamese Support:** Custom slug transliteration (à→a, đ→d, etc.)
- **Rich Content:** TinyMCE 6 with image upload
- **Categorization:** Tags and categories with filtering
- **Related Posts:** Automatic related content suggestions
- **Reading Time:** Automatic calculation based on content length

### Product Catalog
- **Advanced Search:** Full-text search across multiple fields
- **Brand Filtering:** Filter by manufacturer
- **Analytics:** Click and view tracking
- **SEO Ready:** Structured data, canonical URLs, meta tags
- **Image Gallery:** Multiple product images with alt text
- **Specifications:** Flexible key-value specification system

### Admin Dashboard
- **Statistics:** Products, blogs, users overview
- **User Management:** Activate/deactivate accounts
- **Login Tracking:** IP addresses, failed attempts, session duration
- **Security:** Account lockout, password requirements, CSRF protection

---

## 💻 Development

### Running Development Server
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite dev server
npm run dev
```

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
# Format code
composer format

# Check code quality
composer lint
```

### Database Management
```bash
# Create new migration
php artisan make:migration create_table_name

# Run migrations
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Refresh database with seeds
php artisan migrate:fresh --seed
```

### Cache Management
```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan optimize
```

---

## 🔒 Security Features

- CSRF protection on all forms
- SQL injection prevention (Eloquent ORM)
- XSS protection (Blade templating)
- Password hashing (bcrypt)
- Session security (HTTP-only cookies)
- Account lockout (5 failed attempts)
- Activity logging
- Role-based access control

---

## 📊 Default Admin Credentials

```
Email: admin@aicontrol.com
Password: password
```

**⚠️ Change these credentials immediately after first login!**

---

## 🤝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Open Pull Request

---

## 📝 License

This project is proprietary software. All rights reserved.

---

## 👥 Team

**Developer:** AIControl Development Team  
**Repository:** [github.com/spaceCadetVUX/AIControl_web_laravel](https://github.com/spaceCadetVUX/AIControl_web_laravel)

---

## 📞 Support

For support and inquiries:
- **Website:** https://aicontrol.vn
- **Email:** info@aicontrol.vn

---

**Last Updated:** November 5, 2025
