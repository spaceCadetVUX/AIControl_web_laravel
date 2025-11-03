# Admin Auto-Logout System

## Overview
Comprehensive auto-logout system for admin users that automatically terminates sessions when the admin tab is closed or after periods of inactivity.

## Features

### 1. **Auto-Logout on Tab Close**
- When an admin closes their browser tab/window, their session is automatically terminated
- Uses `navigator.sendBeacon()` API for reliable logout even during page unload
- Fallback to synchronous XMLHttpRequest if sendBeacon is unavailable
- Prevents unauthorized access if admin forgets to manually logout

### 2. **Inactivity Timeout**
- **15-minute inactivity timer** that tracks user activity
- Shows a **2-minute warning** before automatic logout
- User can click "OK" on the warning to stay logged in
- Resets on any user interaction (mouse movement, clicks, keyboard, scroll, touch)

### 3. **Smart Logout Detection**
- Distinguishes between:
  - **Manual logout**: User clicks the logout button
  - **Auto tab close**: Tab/window is closed
  - **Inactivity timeout**: No activity for 15 minutes
- Prevents duplicate logout requests

### 4. **Comprehensive Logging**
All logout events are logged with:
- User ID and email
- User role
- IP address
- User agent (browser info)
- Logout type (manual/auto_tab_close/inactivity_timeout)
- Session duration (time since last login)

## How It Works

### Frontend (JavaScript)
Located in: `resources/views/layouts/app.blade.php`

```javascript
// Only activates for authenticated admin users
@auth
    @if(Auth::user()->isAdmin())
        // Auto-logout scripts here
    @endif
@endauth
```

**Key Functions:**
1. **beforeunload Event**: Fires when tab is closing
2. **sendBeacon API**: Sends POST request without blocking page unload
3. **Inactivity Timer**: Tracks mouse, keyboard, and touch events
4. **Manual Logout Flag**: Prevents auto-logout if user manually logs out

### Backend (Laravel)
Located in: `app/Http/Controllers/Auth/AuthenticatedSessionController.php`

**destroy() Method:**
- Accepts POST requests to `/logout`
- Determines logout type from request parameters
- Logs comprehensive logout event
- Invalidates session and regenerates CSRF token

## User Experience

### For Admins:
1. **Login**: Admin logs in normally
2. **Active Session**: Works normally with 15-minute inactivity monitoring
3. **Inactivity Warning**: After 13 minutes of inactivity, sees warning dialog
4. **Tab Close**: Simply closes the tab - session automatically terminates
5. **Manual Logout**: Can still use the logout button normally

### Console Notifications:
When an admin page loads, they'll see in the browser console:
```
🔒 Admin Auto-Logout Enabled
→ Your session will be terminated when you close this tab
→ Auto-logout after 15 minutes of inactivity
```

## Security Benefits

1. **Prevents Unauthorized Access**
   - Even if admin forgets to logout, closing the tab terminates the session
   - No lingering active sessions on shared computers

2. **Inactivity Protection**
   - Automatically logs out idle admins
   - Reduces risk of session hijacking

3. **Audit Trail**
   - All logout events are logged
   - Can track unusual logout patterns

4. **Session Management**
   - Sessions are properly invalidated
   - CSRF tokens are regenerated

## Configuration

### Adjust Inactivity Timeout:
In `resources/views/layouts/app.blade.php`, change:
```javascript
const inactivityTimeout = 15 * 60 * 1000; // 15 minutes
```

### Adjust Warning Time:
In the same file, change:
```javascript
setTimeout(function() {
    // This runs 2 minutes before actual logout
}, 2 * 60 * 1000);
```

### Disable Auto-Logout (Not Recommended):
Remove or comment out the auto-logout script section in `app.blade.php`

## Testing

### Test Auto-Logout on Tab Close:
1. Login as admin
2. Navigate to admin dashboard
3. Open browser DevTools → Network tab
4. Close the browser tab
5. Check logs: `storage/logs/laravel.log` for logout event

### Test Inactivity Timeout:
1. Login as admin
2. Wait 13 minutes without any interaction
3. Should see warning dialog
4. Wait 2 more minutes → auto logout

### Test Manual Logout:
1. Login as admin
2. Click the logout button
3. Should logout normally (no duplicate logout on tab close)

## Technical Notes

### CSRF Protection:
- All logout requests include CSRF token
- Sent via FormData in sendBeacon requests
- Laravel automatically validates CSRF tokens

### Browser Compatibility:
- **sendBeacon API**: Supported in all modern browsers (Chrome 39+, Firefox 31+, Safari 11.1+, Edge 14+)
- **Fallback**: Synchronous XHR for older browsers

### Session Storage:
- Uses `sessionStorage.setItem('adminAutoLogoutEnabled', 'true')`
- Per-tab storage (not shared across tabs)
- Automatically cleared when tab closes

## Logs Location

All logout events are logged to:
```
storage/logs/laravel.log
```

Example log entry:
```
[2025-11-03 12:34:56] local.INFO: User logged out {
    "user_id": 1,
    "email": "admin@example.com",
    "role": "admin",
    "ip": "127.0.0.1",
    "user_agent": "Mozilla/5.0...",
    "logout_type": "auto_tab_close",
    "session_duration": "45 minutes"
}
```

## Regular Users
- **Regular users (non-admin)**: Auto-logout is NOT enabled
- They can close tabs without being logged out
- Normal Laravel session management applies

## Troubleshooting

### Issue: Auto-logout not working
- **Check**: Browser console for JavaScript errors
- **Verify**: User has admin role (`isAdmin()` returns true)
- **Test**: `sessionStorage.getItem('adminAutoLogoutEnabled')` should be 'true'

### Issue: CSRF token mismatch
- **Solution**: Clear Laravel cache `php artisan cache:clear`
- **Check**: CSRF token is being included in FormData

### Issue: Inactivity warning not showing
- **Check**: Browser allows alerts/dialogs
- **Verify**: JavaScript console for errors

## Future Enhancements

Potential improvements:
- [ ] Configurable timeout via admin settings
- [ ] Email notification on auto-logout
- [ ] Dashboard widget showing session time remaining
- [ ] Multi-tab session coordination
- [ ] "Remember this device" option to extend timeout

## Security Considerations

✅ **Enabled:**
- Session invalidation on logout
- CSRF token regeneration
- Comprehensive audit logging
- IP address tracking
- User agent logging

⚠️ **Important:**
- Always use HTTPS in production
- Regularly review logout logs
- Monitor for unusual patterns
- Keep Laravel and dependencies updated

---

**Last Updated**: November 3, 2025
**Version**: 1.0
