<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Notifications\ResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'last_login_at',
        'last_login_ip',
        'failed_login_attempts',
        'password_changed_at',
        'recovery_email',
        'recovery_email_verified',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
        'last_login_at' => 'datetime',
        'failed_login_attempts' => 'integer',
        'password_changed_at' => 'datetime',
        'recovery_email_verified' => 'boolean',
    ];

    /**
     * Check if user is an admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is active
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

    /**
     * Scope for admin users
     */
    public function scopeAdmins($query)
    {
        return $query->where('role', 'admin');
    }

    /**
     * Scope for active users
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Record successful login
     *
     * @param string $ip The IP address of the login attempt
     * @return bool True if the update was successful
     */
    public function recordLogin(string $ip): bool
    {
        return $this->update([
            'last_login_at' => now(),
            'last_login_ip' => $ip,
            'failed_login_attempts' => 0,
        ]);
    }

    /**
     * Record failed login attempt
     *
     * @return void
     */
    public function recordFailedLogin(): void
    {
        $this->increment('failed_login_attempts');
        
        // Lock account after 5 failed attempts
        if ($this->failed_login_attempts >= 5) {
            $this->update(['is_active' => false]);
            \Illuminate\Support\Facades\Log::warning('User account locked due to failed login attempts', [
                'user_id' => $this->id,
                'email' => $this->email,
                'failed_attempts' => $this->failed_login_attempts
            ]);
        }
    }

    /**
     * Check if password needs to be changed (e.g., older than 90 days)
     */
    public function passwordNeedsChange()
    {
        // If password_changed_at field exists, check if it's older than 90 days
        if (isset($this->password_changed_at)) {
            return $this->password_changed_at->diffInDays(now()) > 90;
        }
        
        // Fallback to updated_at if password_changed_at doesn't exist
        return $this->updated_at->diffInDays(now()) > 90;
    }

    /**
     * Get the email address for password reset notifications
     * Uses recovery_email if set and verified, otherwise uses primary email
     *
     * @return string
     */
    public function getEmailForPasswordReset(): string
    {
        if ($this->recovery_email && $this->recovery_email_verified) {
            return $this->recovery_email;
        }
        
        return $this->email;
    }

    /**
     * Get user's login history summary
     */
    public function getLoginSummary()
    {
        return [
            'last_login' => $this->last_login_at?->format('M d, Y H:i'),
            'last_ip' => $this->last_login_ip,
            'failed_attempts' => $this->failed_login_attempts,
            'account_status' => $this->is_active ? 'Active' : 'Locked/Inactive'
        ];
    }

    /**
     * Send the password reset notification.
     * Overrides default to use recovery email if available
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $notification = new ResetPassword($token);
        
        // If recovery email is set and verified, send to recovery email
        if ($this->recovery_email && $this->recovery_email_verified) {
            $this->notify($notification);
            
            // Log that we're using recovery email
            \Illuminate\Support\Facades\Log::info('Password reset sent to recovery email', [
                'user_id' => $this->id,
                'primary_email' => $this->email,
                'recovery_email' => $this->recovery_email
            ]);
        } else {
            // Send to primary email
            $this->notify($notification);
            
            \Illuminate\Support\Facades\Log::info('Password reset sent to primary email', [
                'user_id' => $this->id,
                'email' => $this->email
            ]);
        }
    }

    /**
     * Route notifications for mail channel to recovery email if available
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return $this->getEmailForPasswordReset();
    }
}
