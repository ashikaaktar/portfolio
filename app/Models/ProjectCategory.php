<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'category_id')->orderBy('order');
    }

    public function getNameAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->name_bn ?: $this->name_en) : ($this->name_en ?: $this->name_bn)) ?: '';
    }
}
