<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'gallery' => 'array',
        'technologies' => 'array',
        'is_featured' => 'boolean',
        'order' => 'integer',
        'completion_date' => 'date',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id');
    }

    public function getTitleAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->title_bn ?: $this->title_en) : ($this->title_en ?: $this->title_bn)) ?: '';
    }

    public function getShortDescriptionAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->short_description_bn ?: $this->short_description_en) : ($this->short_description_en ?: $this->short_description_bn)) ?: '';
    }

    public function getDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->description_bn ?: $this->description_en) : ($this->description_en ?: $this->description_bn);
    }
}
