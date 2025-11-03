<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'logo_url',
        'website',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    // Relationship with products
    public function products()
    {
        return $this->hasMany(Product::class, 'brand', 'name');
    }

    // Scope for active brands
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
