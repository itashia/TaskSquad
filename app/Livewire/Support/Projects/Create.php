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
    #[Validate('nullable')]
    public $status_id;
    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $owner_id;
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
            'user_id' => $this->user_id,
            'owner_id' => $this->owner_id,
            'status_id' => $this->status_id,
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
        $year = now()->year; $month = now()->month; $directory = "projects/$year/$month";
        $name= $this->pic->getClientOriginalName(); $this->pic->storeAs($directory,$name);
        return "$directory/$name";
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.projects.create', [
            'users' => \App\Models\User::where('is_staff', 1)->get(),
        ]);
    }
}
