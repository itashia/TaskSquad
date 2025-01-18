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
    public $title;
    #[Validate('required')]
    public $description;
    #[Validate('nullable')]
    public $pic;
    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $owner_id;
    public $status_id;
    public Project $project;

    public function updated($title): void
    {
        $this->validateOnly($title);
    }

    public function saveProject(): void
    {

        $this->validate();

        $project = Project::query()->create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => $this->user_id,
            'owner_id' => $this->owner_id,
            'status_id' => 1,
        ]);

        if ($this->pic) {
            $project->update([
                'pic' => $this->uploadImage()
            ]);
        }

        $this->dispatch('toastr:success', message: 'پروژه با موفقیت ایجاد شد');
        $this->redirectRoute('projects.index');
    }
    public function uploadImage(): string
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
        return view('livewire.support.projects.create', [
            'users' => \App\Models\User::where('is_staff', 1)->get(),
        ]);
    }
}
