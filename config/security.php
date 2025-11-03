<?php

return [
    
    /*
    |--------------------------------------------------------------------------
    | Security Settings
    |--------------------------------------------------------------------------
    |
    | Here you can configure various security settings for your application.
    |
    */

    // Login Security
    'login' => [
        'max_attempts' => env('LOGIN_MAX_ATTEMPTS', 5),
        'lockout_duration' => env('LOGIN_LOCKOUT_DURATION', 900), // 15 minutes
        'rate_limit_window' => env('LOGIN_RATE_LIMIT_WINDOW', 900), // 15 minutes
    ],

    // Admin Security
    'admin' => [
        'max_access_attempts' => env('ADMIN_MAX_ACCESS_ATTEMPTS', 10),
        'access_rate_limit_window' => env('ADMIN_ACCESS_RATE_LIMIT_WINDOW', 3600), // 1 hour
        'require_https' => env('ADMIN_REQUIRE_HTTPS', false),
        'session_timeout' => env('ADMIN_SESSION_TIMEOUT', 7200), // 2 hours
    ],

    // Password Security
    'password' => [
        'min_length' => env('PASSWORD_MIN_LENGTH', 8),
        'require_mixed_case' => env('PASSWORD_REQUIRE_MIXED_CASE', true),
        'require_numbers' => env('PASSWORD_REQUIRE_NUMBERS', true),
        'require_symbols' => env('PASSWORD_REQUIRE_SYMBOLS', false),
        'max_age_days' => env('PASSWORD_MAX_AGE_DAYS', 90),
        'prevent_reuse_count' => env('PASSWORD_PREVENT_REUSE_COUNT', 5),
    ],

    // Account Lockout
    'account_lockout' => [
        'max_failed_attempts' => env('ACCOUNT_LOCKOUT_MAX_ATTEMPTS', 5),
        'lockout_duration' => env('ACCOUNT_LOCKOUT_DURATION', 1800), // 30 minutes
        'auto_unlock' => env('ACCOUNT_AUTO_UNLOCK', true),
    ],

    // Security Headers
    'headers' => [
        'x_frame_options' => env('X_FRAME_OPTIONS', 'DENY'),
        'x_content_type_options' => env('X_CONTENT_TYPE_OPTIONS', 'nosniff'),
        'x_xss_protection' => env('X_XSS_PROTECTION', '1; mode=block'),
        'referrer_policy' => env('REFERRER_POLICY', 'strict-origin-when-cross-origin'),
        'content_security_policy' => env('CSP_POLICY', "default-src 'self'; script-src 'self' 'unsafe-inline'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:;"),
    ],

    // Audit Logging
    'audit' => [
        'log_login_attempts' => env('AUDIT_LOG_LOGIN_ATTEMPTS', true),
        'log_admin_access' => env('AUDIT_LOG_ADMIN_ACCESS', true),
        'log_failed_access' => env('AUDIT_LOG_FAILED_ACCESS', true),
        'log_user_changes' => env('AUDIT_LOG_USER_CHANGES', true),
    ],

];