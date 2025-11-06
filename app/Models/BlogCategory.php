<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'status',
        'order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
    ];

    // Relationship with blogs (many-to-many)
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_category');
    }

    // Parent category relationship
    public function parent()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    // Child categories relationship
    public function children()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id')->orderBy('order');
    }

    // Scope for active categories
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    // Scope for root categories (no parent)
    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    // Get full category path (breadcrumb)
    public function getPathAttribute()
    {
        $path = [$this->name];
        $parent = $this->parent;
        
        while ($parent) {
            array_unshift($path, $parent->name);
            $parent = $parent->parent;
        }
        
        return implode(' > ', $path);
    }

    /**
     * Get blog count for this category including inherited from parent
     */
    public function getBlogCountAttribute()
    {
        $count = $this->blogs()->count();
        
        // If this is a subcategory, also count blogs from parent
        if ($this->parent_id) {
            $count += $this->parent->blogs()->count();
        }
        
        return $count;
    }

    /**
     * Get total blog count including all children categories
     */
    public function getTotalBlogCountAttribute()
    {
        $count = $this->blogs()->count();
        
        // Add blogs from all children
        foreach ($this->children as $child) {
            $count += $child->blogs()->count();
        }
        
        return $count;
    }
}
