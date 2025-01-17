<?php

namespace App\Livewire\Support\Projects;

use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

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
        $this->dispatch('toastr:success', message: 'پروژه با موفقیت ایجاد شد');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $projects = Project::when(!Auth::user()->isAdmin(), function ($query) {
            $query->where('owner_id', Auth::id());
        })->paginate(10);
        return view('livewire.support.projects.index', compact('projects'));
    }
}
