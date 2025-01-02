<?php

namespace App\Livewire\Support\Projects;

use App\Models\Project;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    public $name;
    #[Validate('required')]
    public $description;
    #[Validate('nullable')]
    public $pic;
    public Project $project;

    public function updated($subject): void
    {
        $this->validateOnly($subject);
    }
    public function saveProject(): void
    {

        $this->validate();

        $project = Project::query()->create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        if ($this->pic) {
            $project->update([
                'pic' => $this->uploadPic()
            ]);
        }

        $this->dispatch('toastr:success', message: 'پروژه با موفقیت ایجاد شد');
        $this->redirectRoute('projects.index');
    }
    public function uploadPic(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "projects/$year/$month";
        $name= $this->pic->getClientOriginalName();
        $this->pic->storeAs($directory,$name);
        return "$directory/$name";
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.projects.create');
    }
}
