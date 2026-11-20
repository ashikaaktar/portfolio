<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id')->where('is_published', true)->orderByDesc('published_at');
    }

    public function getNameAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->name_bn ?: $this->name_en) : ($this->name_en ?: $this->name_bn)) ?: '';
    }
}
