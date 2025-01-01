<?php

namespace App\Livewire\Support\Projects;

use App\Models\Media;
use App\Models\MediaProject;
use App\Models\Project;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, LivewireAlert;

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

        $this->redirectRoute('projects.index');
        $this->alert('success', 'پروژه جدید ایجاد شد.');
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
