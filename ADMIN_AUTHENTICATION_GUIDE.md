# Admin Authentication System - AIControl Laravel Project

## Overview
This Laravel application now includes a complete admin authentication system built with Laravel Breeze. The system provides role-based access control with separate admin and user roles.

## Features Implemented

### 1. User Roles & Permissions
- **Admin Role**: Full access to admin dashboard and management features
- **User Role**: Regular website access only
- **Active/Inactive Status**: Ability to activate/deactivate user accounts

### 2. Authentication Structure
- **Laravel Breeze**: Base authentication system
- **Custom Admin Middleware**: Restricts admin area access
- **Role-based Redirects**: Automatic redirection based on user role after login
- **Admin Login Page**: Dedicated login interface for admins

### 3. Admin Dashboard Features
- **Dashboard Overview**: Statistics and quick actions
- **User Management**: View and manage all users
- **Page Management**: Overview of website pages
- **Security Features**: Protected routes and role validation

## Database Schema

### Users Table
```sql
- id (Primary Key)
- name (String)
- email (String, Unique)
- email_verified_at (Timestamp, Nullable)
- role (String, Default: 'user') [user|admin]
- is_active (Boolean, Default: true)
- password (String)
- remember_token (String, Nullable)
- created_at (Timestamp)
- updated_at (Timestamp)
```

## Default Accounts

### Admin Account
- **Email**: admin@aicontrol.com
- **Password**: admin123
- **Role**: admin
- **Status**: active

### Demo User Account
- **Email**: user@aicontrol.com
- **Password**: user123
- **Role**: user
- **Status**: active

## Routes Structure

### Public Routes
- `/` - Homepage
- `/login` - Regular user login
- `/register` - User registration
- `/admin/login` - Admin login page

### Protected Admin Routes (Middleware: auth, admin)
- `/admin/dashboard` - Admin dashboard
- `/admin/pages` - Page management
- `/admin/users` - User management
- `/admin/users/{user}/toggle-status` - Toggle user status

### Protected User Routes (Middleware: auth)
- `/profile` - User profile management

## Middleware

### EnsureUserIsAdmin
- **Location**: `app/Http/Middleware/EnsureUserIsAdmin.php`
- **Purpose**: Restricts access to admin-only routes
- **Checks**:
  1. User authentication
  2. User active status
  3. Admin role verification

### RedirectIfAuthenticated (Modified)
- **Purpose**: Role-based redirect after login
- **Logic**: Admins → Admin Dashboard, Users → Homepage

## Controllers

### Admin/DashboardController
- **index()**: Admin dashboard with statistics
- **pages()**: Page management view
- **users()**: User management view
- **toggleUserStatus()**: Activate/deactivate users

### Auth Controllers (Breeze)
- **AuthenticatedSessionController**: Enhanced with role-based redirects
- All standard Breeze authentication controllers

## Views Structure

### Admin Views
- `resources/views/admin/dashboard.blade.php`
- `resources/views/admin/pages.blade.php`
- `resources/views/admin/users.blade.php`

### Authentication Views
- `resources/views/auth/admin-login.blade.php`
- Standard Breeze authentication views

### Layouts
- `resources/views/layouts/app.blade.php` - Admin layout
- `resources/views/layouts/navigation.blade.php` - Admin navigation
- `resources/views/layouts/guest.blade.php` - Guest layout

## Security Features

1. **CSRF Protection**: All forms protected with CSRF tokens
2. **Password Hashing**: Bcrypt password encryption
3. **Session Management**: Secure session handling
4. **Role Validation**: Multiple layers of role checking
5. **Account Status**: Active/inactive user status control

## Installation & Setup

### 1. Run Migrations
```bash
php artisan migrate
```

### 2. Seed Admin Users
```bash
php artisan db:seed --class=AdminUserSeeder
```

### 3. Clear Application Cache (if needed)
```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
```

## Usage Guide

### Accessing Admin Area
1. Navigate to `/admin/login` or click "Admin" link in website footer
2. Login with admin credentials
3. Access dashboard and management features

### Managing Users
1. Go to Admin Dashboard → Manage Users
2. View all registered users
3. Toggle user active status (except your own account)
4. Monitor user login activity

### User Flow
- **Regular Users**: Login → Homepage/Profile
- **Admins**: Login → Admin Dashboard
- **Inactive Users**: Login denied with error message

## Code Examples

### Checking User Role in Blade
```blade
@if(Auth::check() && Auth::user()->isAdmin())
    <!-- Admin only content -->
@endif
```

### Checking User Role in Controller
```php
if (Auth::user()->role === 'admin') {
    // Admin logic
}
```

### Using User Model Scopes
```php
$admins = User::admins()->active()->get();
$activeUsers = User::active()->count();
```

## Security Considerations

1. **Role Assignment**: Only seed/manually assign admin roles
2. **Password Policy**: Consider implementing stronger password requirements
3. **Session Security**: Configure session timeouts appropriately
4. **Account Lockout**: Consider implementing login attempt limits
5. **Audit Logging**: Consider adding activity logs for admin actions

## Future Enhancements

1. **Permission System**: More granular permissions beyond admin/user
2. **Activity Logging**: Track admin actions and user logins
3. **Email Notifications**: User status change notifications
4. **Bulk Operations**: Bulk user management features
5. **User Registration Control**: Admin approval for new registrations
6. **Two-Factor Authentication**: Enhanced security for admin accounts

## Troubleshooting

### Common Issues

1. **Access Denied**: Check user role and active status
2. **Login Redirect Loop**: Verify middleware registration
3. **Migration Errors**: Ensure database connection
4. **Seeder Fails**: Check for existing users with same email

### Debug Commands
```bash
php artisan route:list | grep admin    # View admin routes
php artisan tinker                      # Database inspection
User::all();                           # Check all users
```

## File Locations

### Key Files Modified/Created
- `database/migrations/2025_11_03_022954_add_role_to_users_table.php`
- `app/Http/Middleware/EnsureUserIsAdmin.php`
- `app/Models/User.php` (enhanced with role methods)
- `database/seeders/AdminUserSeeder.php`
- `routes/web.php` (admin routes)
- All admin views and controllers

This authentication system provides a solid foundation for managing access to the AIControl website's administrative features while maintaining security and usability.