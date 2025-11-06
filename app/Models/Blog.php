<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'author_id',
        'category',
        'tags',
        'published_at',
        'is_published',
        'indexable',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
    ];

    protected $casts = [
        'tags' => 'array',
        'published_at' => 'datetime',
        'is_published' => 'boolean',
        'indexable' => 'boolean',
    ];

    /**
     * Boot function to auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }
            // Auto-generate meta_title if not provided
            if (empty($blog->meta_title)) {
                $blog->meta_title = $blog->title;
            }
            // Auto-generate canonical_url if not provided
            if (empty($blog->canonical_url)) {
                $blog->canonical_url = url('/blog/' . $blog->slug);
            }
        });

        static::updating(function ($blog) {
            // Update canonical_url if slug changes
            if ($blog->isDirty('slug') && empty($blog->canonical_url)) {
                $blog->canonical_url = url('/blog/' . $blog->slug);
            }
        });
    }

    /**
     * Relationship with User (author)
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Relationship with blog categories (many-to-many)
     */
    public function blogCategories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_blog_category');
    }

    /**
     * Scope for published blogs only
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->where('published_at', '<=', now());
    }

    /**
     * Scope for indexable blogs (for SEO)
     */
    public function scopeIndexable($query)
    {
        return $query->where('indexable', true);
    }

    /**
     * Get formatted published date
     */
    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('F d, Y') : null;
    }

    /**
     * Get reading time estimate (based on average reading speed of 200 words/minute)
     */
    public function getReadingTimeAttribute()
    {
        $wordCount = str_word_count(strip_tags($this->content));
        $minutes = ceil($wordCount / 200);
        return $minutes . ' min read';
    }

    /**
     * Get SEO meta description (fallback to excerpt)
     */
    public function getSeoDescriptionAttribute()
    {
        return $this->meta_description ?: Str::limit(strip_tags($this->excerpt), 160);
    }

    /**
     * Get SEO meta title (fallback to title)
     */
    public function getSeoTitleAttribute()
    {
        return $this->meta_title ?: $this->title;
    }
}
