# Password Recovery Setup Guide

## Current Status
✅ Password recovery routes are configured
✅ "Forgot Password" link is on login page
✅ Password reset views exist

## How to Enable Password Recovery

### Option 1: Log Driver (Testing Only - No Real Emails)
**Best for**: Quick testing without email setup

Update `.env`:
```env
MAIL_MAILER=log
MAIL_FROM_ADDRESS="noreply@aicontrol.com"
MAIL_FROM_NAME="AIControl Admin"
```

Password reset links will be written to `storage/logs/laravel.log`

**Test it:**
1. Go to `/forgot-password`
2. Enter your email
3. Check `storage/logs/laravel.log` for the reset link

---

### Option 2: Mailpit (Local Development - Recommended)
**Best for**: Local development with visual email preview

**Install Mailpit:**
```bash
# Download from: https://github.com/axllent/mailpit/releases
# Or use Chocolatey:
choco install mailpit

# Or use Scoop:
scoop install mailpit
```

**Start Mailpit:**
```bash
mailpit
```

`.env` is already configured:
```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

**Access Mailpit UI:**
- Web Interface: http://localhost:8025
- All emails sent by your app appear here

---

### Option 3: Gmail (Production - Real Emails)
**Best for**: Production or real email testing

**Setup Steps:**

1. **Enable 2-Step Verification on your Gmail account**
   - Go to: https://myaccount.google.com/security
   - Enable 2-Step Verification

2. **Create App Password**
   - Go to: https://myaccount.google.com/apppasswords
   - Select "Mail" and your device
   - Copy the 16-character password

3. **Update `.env`:**
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-16-char-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your-email@gmail.com"
MAIL_FROM_NAME="AIControl Admin"
```

4. **Clear config cache:**
```bash
php artisan config:clear
```

---

### Option 4: Mailtrap (Testing Service)
**Best for**: Team testing without real emails

1. **Sign up at**: https://mailtrap.io (Free tier available)

2. **Get credentials from Mailtrap dashboard**

3. **Update `.env`:**
```env
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@aicontrol.com"
MAIL_FROM_NAME="AIControl Admin"
```

---

## How Users Reset Password

### Step 1: Click "Forgot Password"
- On login page: `/login`
- Click "Forgot your password?"

### Step 2: Enter Email
- User enters their email address
- Click "Email Password Reset Link"

### Step 3: Check Email
- User receives email with reset link
- Link expires in 60 minutes (configurable)

### Step 4: Set New Password
- Click link in email
- Enter new password (confirmed)
- Click "Reset Password"

### Step 5: Login
- Redirected to login page
- Can login with new password

---

## Password Reset Configuration

### Customize Reset Link Expiration
Edit `config/auth.php`:
```php
'passwords' => [
    'users' => [
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60, // Change this (minutes)
        'throttle' => 60,
    ],
],
```

### Customize Email Template
Email template: `resources/views/vendor/mail/html/message.blade.php`

To publish and customize:
```bash
php artisan vendor:publish --tag=laravel-mail
```

---

## Testing Password Recovery

### Test Locally with Log Driver:

1. Update `.env`:
   ```env
   MAIL_MAILER=log
   ```

2. Clear config:
   ```bash
   php artisan config:clear
   ```

3. Go to `/forgot-password`

4. Enter email of existing user (e.g., admin@example.com)

5. Check logs:
   ```bash
   cat storage/logs/laravel.log
   # Or on Windows:
   Get-Content storage/logs/laravel.log -Tail 50
   ```

6. Find the reset URL and copy it

7. Paste URL in browser to reset password

---

## Security Features (Already Implemented)

✅ **Rate Limiting**: Prevents spam reset requests
✅ **Token Expiration**: Links expire after 60 minutes
✅ **Single Use**: Reset tokens can only be used once
✅ **Email Verification**: Only registered emails can request reset
✅ **Secure Tokens**: Cryptographically secure random tokens
✅ **Throttling**: Limits requests to 6 per minute

---

## Admin Password Reset (Manual)

If you need to manually reset a user's password:

```bash
php artisan tinker
```

Then run:
```php
$user = App\Models\User::where('email', 'user@example.com')->first();
$user->password = Hash::make('newpassword123');
$user->password_changed_at = now();
$user->save();
```

---

## Troubleshooting

### Issue: "Unable to send email"
**Solution**: Check `.env` mail settings and run:
```bash
php artisan config:clear
php artisan cache:clear
```

### Issue: "Email not received"
**Check**:
1. Email address is correct
2. Mail driver is configured
3. Check spam folder
4. Check `storage/logs/laravel.log` for errors

### Issue: "Reset link expired"
**Solution**: Request a new reset link (old link expires after 60 minutes)

### Issue: "This password reset token is invalid"
**Solution**: 
1. Make sure you're using the full link from email
2. Link may have already been used
3. Request a new reset link

---

## Quick Start (Recommended for Development)

**Use Log Driver (No Setup Required):**

```bash
# 1. Update .env
MAIL_MAILER=log

# 2. Clear config
php artisan config:clear

# 3. Test it
# - Go to /forgot-password
# - Enter: admin@example.com
# - Check storage/logs/laravel.log for reset link
```

---

## Production Checklist

Before deploying to production:

- [ ] Configure real email service (Gmail, SendGrid, etc.)
- [ ] Set proper MAIL_FROM_ADDRESS
- [ ] Test password reset flow end-to-end
- [ ] Configure HTTPS for secure reset links
- [ ] Monitor failed email logs
- [ ] Set appropriate rate limiting
- [ ] Customize email templates with branding

---

**Last Updated**: November 3, 2025
