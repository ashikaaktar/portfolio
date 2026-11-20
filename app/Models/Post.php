<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getTitleAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->title_bn ?: $this->title_en) : ($this->title_en ?: $this->title_bn)) ?: '';
    }

    public function getExcerptAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->excerpt_bn ?: $this->excerpt_en) : ($this->excerpt_en ?: $this->excerpt_bn);
    }

    public function getContentAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->content_bn ?: $this->content_en) : ($this->content_en ?: $this->content_bn)) ?: '';
    }
}
