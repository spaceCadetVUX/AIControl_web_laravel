<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'project_category_id',
        'project_category_id_2',
        'detail_1_title',
        'detail_1_value',
        'detail_2_title',
        'detail_2_value',
        'detail_3_title',
        'detail_3_value',
        'detail_4_title',
        'detail_4_value',
        'banner_image',
        'thumbnail_image',
        'overview_title',
        'overview_content',
        'slider_images',
        'secondary_title',
        'detail_steps',
        'gallery_image_1',
        'gallery_image_2',
        'gallery_image_3',
        'status',
        'featured',
        'order',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'view_count',
        'published_at',
    ];

    protected $casts = [
        'slider_images' => 'array',
        'detail_steps' => 'array',
        'featured' => 'boolean',
        'order' => 'integer',
        'view_count' => 'integer',
        'published_at' => 'datetime',
    ];

    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            // Auto-generate slug from title
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
            
            // Auto-generate SEO meta title if empty
            if (empty($project->meta_title)) {
                $project->meta_title = $project->title . ' - AIControl';
            }
            
            // Auto-generate meta description if empty
            if (empty($project->meta_description) && !empty($project->short_description)) {
                $project->meta_description = Str::limit($project->short_description, 155);
            }
        });

        static::updating(function ($project) {
            // Regenerate slug if title changed and slug is empty
            if ($project->isDirty('title') && empty($project->slug)) {
                $project->slug = Str::slug($project->title);
            }
            
            // Update SEO meta title if empty
            if (empty($project->meta_title)) {
                $project->meta_title = $project->title . ' - AIControl';
            }
            
            // Update meta description if empty
            if (empty($project->meta_description) && !empty($project->short_description)) {
                $project->meta_description = Str::limit($project->short_description, 155);
            }
        });
    }

    /**
     * Get the primary category
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    /**
     * Get the secondary category
     */
    public function categorySecondary()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id_2');
    }

    /**
     * Get category 1 name (for backward compatibility)
     */
    public function getCategory1Attribute()
    {
        return $this->category?->name;
    }

    /**
     * Get category 2 name (for backward compatibility)
     */
    public function getCategory2Attribute()
    {
        return $this->categorySecondary?->name;
    }

    /**
     * Scope a query to only include published projects
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope a query to only include featured projects
     */
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    /**
     * Scope a query to order by custom order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc')->orderBy('published_at', 'desc');
    }

    /**
     * Scope a query to filter by category
     */
    public function scopeInCategory($query, $categoryId)
    {
        return $query->where(function($q) use ($categoryId) {
            $q->where('project_category_id', $categoryId)
              ->orWhere('project_category_id_2', $categoryId);
        });
    }

    /**
     * Scope a query to search projects
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function($q) use ($term) {
            $q->where('title', 'like', "%{$term}%")
              ->orWhere('short_description', 'like', "%{$term}%")
              ->orWhere('overview_content', 'like', "%{$term}%");
        });
    }

    /**
     * Increment view count
     */
    public function incrementViewCount()
    {
        $this->increment('view_count');
    }

    /**
     * Get the route key for the model
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get formatted published date
     */
    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at?->format('d/m/Y');
    }

    /**
     * Get SEO-optimized title
     */
    public function getSeoTitleAttribute()
    {
        return $this->meta_title ?: ($this->title . ' - AIControl');
    }

    /**
     * Get SEO-optimized description
     */
    public function getSeoDescriptionAttribute()
    {
        if ($this->meta_description) {
            return $this->meta_description;
        }
        
        if ($this->short_description) {
            return Str::limit($this->short_description, 155);
        }
        
        // Extract text from overview_content
        $text = strip_tags($this->overview_content);
        return Str::limit($text, 155);
    }

    /**
     * Get SEO-optimized keywords
     */
    public function getSeoKeywordsAttribute()
    {
        if ($this->meta_keywords) {
            return $this->meta_keywords;
        }
        
        // Auto-generate from categories and title
        $keywords = [];
        $keywords[] = $this->title;
        
        if ($this->category) {
            $keywords[] = $this->category->name;
        }
        
        if ($this->categorySecondary) {
            $keywords[] = $this->categorySecondary->name;
        }
        
        $keywords[] = 'AIControl';
        $keywords[] = 'nhà thông minh';
        
        return implode(', ', array_unique($keywords));
    }

    /**
     * Get canonical URL
     */
    public function getCanonicalUrlAttribute()
    {
        return url('/du-an/' . $this->slug);
    }

    /**
     * Get OG image URL
     */
    public function getOgImageUrlAttribute()
    {
        if ($this->og_image) {
            return asset('storage/' . $this->og_image);
        }
        
        if ($this->banner_image) {
            return asset('storage/' . $this->banner_image);
        }
        
        if ($this->thumbnail_image) {
            return asset('storage/' . $this->thumbnail_image);
        }
        
        return asset('assets/img/logo/logo.png');
    }
}
