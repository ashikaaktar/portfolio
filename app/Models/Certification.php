<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'issue_date' => 'date',
        'expiry_date' => 'date',
        'order' => 'integer',
    ];

    public function getTitleAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->title_bn ?: $this->title_en) : ($this->title_en ?: $this->title_bn)) ?: '';
    }

    public function getIssuerAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->issuer_bn ?: $this->issuer_en) : ($this->issuer_en ?: $this->issuer_bn)) ?: '';
    }
}
