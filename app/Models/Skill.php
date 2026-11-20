<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'proficiency_percent' => 'integer',
        'order' => 'integer',
    ];

    public function getDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->description_bn ?: $this->description_en) : ($this->description_en ?: $this->description_bn);
    }
}
