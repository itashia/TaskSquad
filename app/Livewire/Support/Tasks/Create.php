<?php

namespace App\Livewire\Support\Tasks;

use App\Models\Task;
use App\Models\TaskStatus;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $type_id;
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $owner_id;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $priority_id;

    public Task $task;

    public function updated($title): void
    {
        $this->validateOnly($title);
    }

    public function saveTask(): void
    {

        $this->validate();

        $task = Task::query()->create([
            'type_id' => $this->type_id,
            'title' => $this->title,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'owner_id' => $this->owner_id,
            'status_id' => 1,
            'priority_id' => $this->priority_id,
        ]);


        $this->dispatch('toastr:success', message: 'وظیفه جدید ایجاد شد');
        $this->redirectRoute('tasks.index');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.tasks.create', [
            'roles' => \App\Models\Roles::all(),
            'users' => \App\Models\User::where('is_staff', 1)->get(),
            'statuses' => TaskStatus::all(),
        ]);
    }
}
