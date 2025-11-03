<?php

/**
 * IDE Helper for User Model Methods
 * 
 * This file helps IDEs recognize custom methods in the User model.
 * It should never be included in production code.
 */

namespace App\Models;

/**
 * @method bool recordLogin(string $ip) Record successful login with IP address
 * @method void recordFailedLogin() Record failed login attempt and handle account locking
 * @method bool isAdmin() Check if user has admin role
 * @method bool isActive() Check if user account is active
 * @method bool passwordNeedsChange() Check if password needs to be changed
 */
class User extends \Illuminate\Foundation\Auth\User
{
    // This file is for IDE assistance only
    // The actual implementation is in app/Models/User.php
}