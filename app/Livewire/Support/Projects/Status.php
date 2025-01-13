<?php

namespace App\Livewire\Support\Projects;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Status extends Component
{
    #[Validate('required')]
    public $status_id;
    public Project $project;
    public function mount($id): void
    {
        $this->project = Project::findOrFail($id);
    }
    public function statusProject(): void
    {
        $this->validate();

        $this->project->update($this->validate());

        $this->dispatch('toastr:success', message: 'وضعیت با موفقیت به روز رسانی شد');
        $this->redirectRoute('projects.index');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.projects.status');
    }
}
