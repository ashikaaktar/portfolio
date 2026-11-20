<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $guarded = [];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'order' => 'integer',
    ];

    public function getInstitutionAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->institution_bn ?: $this->institution_en) : ($this->institution_en ?: $this->institution_bn)) ?: '';
    }

    public function getDegreeAttribute(): string
    {
        return (app()->getLocale() === 'bn' ? ($this->degree_bn ?: $this->degree_en) : ($this->degree_en ?: $this->degree_bn)) ?: '';
    }

    public function getFieldOfStudyAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->field_of_study_bn ?: $this->field_of_study_en) : ($this->field_of_study_en ?: $this->field_of_study_bn);
    }

    public function getPeriodAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->period_bn ?: $this->period_en) : ($this->period_en ?: $this->period_bn);
    }

    public function getDescriptionAttribute(): ?string
    {
        return app()->getLocale() === 'bn' ? ($this->description_bn ?: $this->description_en) : ($this->description_en ?: $this->description_bn);
    }
}
