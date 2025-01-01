<?php

namespace App\Livewire\Support\Projects;

use App\Models\Project;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = true;

    public function loadProjects(): void
    {
        $this->readyToLoad = true;
    }

    public function deleteProjects($id): void
    {
        $permissions = Project::find($id);
        $permissions->delete();
        $this->alert('success', 'دسترسی پروژه مورد نظر حذف شد!');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $projects = Project::paginate(10);
        return view('livewire.support.projects.index', compact('projects'));
    }
}
