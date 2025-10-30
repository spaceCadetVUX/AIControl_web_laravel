# Admin Panel Quick Start Guide

## Accessing the Admin Panel

### Step 1: Create an Admin Account
If you haven't created an account yet:

1. Visit: `http://localhost:8000/register` (or your domain)
2. Fill in the registration form:
   - Name
   - Email address
   - Password (minimum 8 characters)
   - Confirm password
3. Click "Register"

### Step 2: Login
1. Visit: `http://localhost:8000/login`
2. Enter your email and password
3. Check "Remember me" if you want to stay logged in
4. Click "Log in"

### Step 3: Access Dashboard
After successful login, you'll be automatically redirected to:
- **Admin Dashboard**: `http://localhost:8000/admin/dashboard`

---

## Admin Panel Features

### Dashboard Overview
The dashboard shows:
- **Statistics Cards**:
  - Total Pages (9 frontend pages)
  - Active Users count
  - Products count (4 product brands)
  
- **Quick Actions**:
  - Manage Pages - View and manage all frontend pages
  - Edit Profile - Update your account details
  - View Website - Open the public website in a new tab
  - Logout - Sign out from the admin panel

### Manage Pages
Located at: `http://localhost:8000/admin/pages`

Features:
- View all 9 frontend pages in a table
- See page names, routes, and status
- Quick links to view each page
- Edit functionality (ready for future implementation)

Pages listed:
1. Home (/)
2. ABB Products (/abb)
3. Legrand Products (/legrand)
4. CP Electronics (/cp-electronics)
5. Vantage Products (/vantage)
6. Lighting Control (/lighting-control)
7. HVAC Control (/hvac-control)
8. Security Solutions (/security)
9. Contact Us (/contact)

---

## Navigation

### Top Navigation Menu (Desktop)
- Dashboard - Return to main dashboard
- Manage Pages - View all pages
- View Website - Open public site
- User Dropdown (right side):
  - Profile - Edit your profile
  - Log Out - Sign out

### Mobile Navigation
- Hamburger menu (☰) in top right
- Same menu items as desktop
- Responsive design

---

## Profile Management

Access at: `http://localhost:8000/profile`

You can:
- Update your name and email
- Change your password
- Delete your account

---

## Security Features

✅ **Authentication Required**: All admin pages require login
- Unauthorized users are redirected to login page
- Session-based authentication
- Remember me functionality

✅ **CSRF Protection**: All forms are protected against CSRF attacks

✅ **Password Security**: Passwords are encrypted with bcrypt

✅ **Session Management**: Automatic logout after inactivity (configurable)

---

## Frontend Pages (Public)

These pages are accessible without login:

### Product Pages
- **ABB Products** - `/abb`
- **Legrand Products** - `/legrand`
- **CP Electronics** - `/cp-electronics`
- **Vantage Products** - `/vantage`

### Solutions Pages
- **Lighting Control** - `/lighting-control`
- **HVAC Control** - `/hvac-control`
- **Security Solutions** - `/security`

### General Pages
- **Home** - `/`
- **Contact Us** - `/contact`

---

## Common Tasks

### How to Log Out
1. Click on your name in the top right corner
2. Click "Log Out" from the dropdown
3. Or use the Logout button in Quick Actions

### How to Change Password
1. Go to Profile (click your name → Profile)
2. Scroll to "Update Password" section
3. Enter current password
4. Enter new password
5. Confirm new password
6. Click "Save"

### How to View a Frontend Page
1. Go to "Manage Pages"
2. Find the page you want to view
3. Click the "View" link in the Actions column
4. Page opens in a new tab

---

## Troubleshooting

### Can't Login?
- Check your email and password
- Use "Forgot your password?" link to reset
- Clear browser cache and cookies

### Redirected to Login Page?
- Your session may have expired
- Log in again to continue

### Page Not Loading?
- Clear browser cache: `Ctrl + Shift + Delete`
- Clear Laravel cache:
  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

---

## Technical Details

### Routes Structure
- **Public**: `/` (frontend pages)
- **Admin**: `/admin/*` (requires auth)
- **Auth**: `/login`, `/register`, `/forgot-password`
- **Profile**: `/profile` (requires auth)

### Authentication System
- **Provider**: Laravel Breeze
- **Middleware**: `auth` middleware on admin routes
- **Guard**: Web guard (session-based)

---

## Development Mode

### Start the Server
```bash
php artisan serve
```
Access at: `http://localhost:8000`

### Compile Assets (Tailwind CSS)
```bash
npm run dev
```

### Run Database Migrations
```bash
php artisan migrate
```

---

## Browser Requirements

- Modern browsers (Chrome, Firefox, Safari, Edge)
- JavaScript enabled
- Cookies enabled

---

## Support

For technical issues or questions:
- Check `PROJECT_STRUCTURE.md` for detailed documentation
- Review Laravel documentation: https://laravel.com/docs/9.x
- Check the codebase in `app/Http/Controllers/`

---

**Last Updated**: October 30, 2025
