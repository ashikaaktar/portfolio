<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getTitleAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->title_bn ?: $this->title_en) : ($this->title_en ?: $this->title_bn)) ?: '';
    }

    public function getHeadlineAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->headline_bn ?: $this->headline_en) : ($this->headline_en ?: $this->headline_bn)) ?: '';
    }

    public function getTaglineAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->tagline_bn ?: $this->tagline_en) : ($this->tagline_en ?: $this->tagline_bn);
    }

    public function getBioAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->bio_bn ?: $this->bio_en) : ($this->bio_en ?: $this->bio_bn);
    }

    public function getAboutAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->about_bn ?: $this->about_en) : ($this->about_en ?: $this->about_bn);
    }

    public function getCareerGoalsAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->career_goals_bn ?: $this->career_goals_en) : ($this->career_goals_en ?: $this->career_goals_bn);
    }

    public function getLocationAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->location_bn ?: $this->location_en) : ($this->location_en ?: $this->location_bn)) ?: '';
    }
}
