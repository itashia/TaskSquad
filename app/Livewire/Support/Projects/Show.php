<?php

namespace App\Livewire\Support\Projects;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public Project $project;
    public function mount($id): void
    {

        $this->project = Project::find($id);
        $this->loadProjects();

    }
    public function loadProjects(): void
    {
        $this->project = Project::find($this->id);
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.projects.show');
    }
}
