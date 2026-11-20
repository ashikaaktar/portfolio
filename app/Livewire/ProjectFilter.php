<?php

namespace App\Livewire;

use App\Models\Project;
use App\Models\ProjectCategory;
use Livewire\Component;

class ProjectFilter extends Component
{
    public ?string $selectedCategory = null;

    public int $limit = 6;

    public bool $showAll = false;

    public function selectCategory(?string $slug = null): void
    {
        $this->selectedCategory = $slug;
    }

    public function render()
    {
        $categories = ProjectCategory::orderBy('order')->get();

        $query = Project::with('category')->orderBy('order');

        if ($this->selectedCategory) {
            $query->whereHas('category', function ($q) {
                $q->where('slug', $this->selectedCategory);
            });
        }

        if (! $this->showAll) {
            $projects = $query->take($this->limit)->get();
        } else {
            $projects = $query->get();
        }

        return view('livewire.project-filter', [
            'categories' => $categories,
            'projects' => $projects,
        ]);
    }
}
