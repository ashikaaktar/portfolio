<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'achievements_en' => 'array',
        'achievements_bn' => 'array',
        'is_current' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'order' => 'integer',
    ];

    public function getCompanyAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->company_bn ?: $this->company_en) : ($this->company_en ?: $this->company_bn)) ?: '';
    }

    public function getRoleAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->role_bn ?: $this->role_en) : ($this->role_en ?: $this->role_bn)) ?: '';
    }

    public function getLocationAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->location_bn ?: $this->location_en) : ($this->location_en ?: $this->location_bn);
    }

    public function getTypeAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->type_bn ?: $this->type_en) : ($this->type_en ?: $this->type_bn)) ?: 'Full-Time';
    }

    public function getPeriodAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->period_bn ?: $this->period_en) : ($this->period_en ?: $this->period_bn);
    }

    public function getDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->description_bn ?: $this->description_en) : ($this->description_en ?: $this->description_bn);
    }

    public function getAchievementsAttribute(): array
    {
        if (app()->getLocale() === 'bn') {
            return $this->achievements_bn ?: ($this->achievements_en ?: []);
        }

        return $this->achievements_en ?: ($this->achievements_bn ?: []);
    }
}
