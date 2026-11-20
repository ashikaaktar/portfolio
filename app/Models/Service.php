<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'features_en' => 'array',
        'features_bn' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function getTitleAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->title_bn ?: $this->title_en) : ($this->title_en ?: $this->title_bn)) ?: '';
    }

    public function getDescriptionAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->description_bn ?: $this->description_en) : ($this->description_en ?: $this->description_bn)) ?: '';
    }

    public function getFeaturesAttribute(): array
    {
        if (app()->getLocale() === 'bn') {
            return $this->features_bn ?: ($this->features_en ?: []);
        }

        return $this->features_en ?: ($this->features_bn ?: []);
    }

    public function getTagAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->tag_bn ?: $this->tag_en) : ($this->tag_en ?: $this->tag_bn);
    }
}
