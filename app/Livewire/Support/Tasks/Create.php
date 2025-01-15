<?php

namespace App\Livewire\Support\Tasks;

use App\Models\Media;
use App\Models\TaskDetail;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\UserHasTask;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    #[Validate('required')]
    public $type_id;
    #[Validate('required')]
    public $subject;
    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $owner_id;
    public $due_date;
    public $number;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $priority_id;
    #[Validate('nullable')]
    public $file1;
    #[Validate('nullable')]
    public $file2;
    #[Validate('nullable')]
    public $file3;
    public $role;

    public Task $task;

    public function updated($subject): void
    {
        $this->validateOnly($subject);
    }
    public function saveTask(): void
    {

        $this->validate();

        $task = Task::query()->create([
            'type_id' => $this->type_id,
            'subject' => $this->subject,
            'user_id' => $this->user_id,
            'owner_id' => $this->owner_id,
            'due_date' => Carbon::now(),
            'number' => Task::max('number') + 1,
            'status_id' => 1,
            'priority_id' => $this->priority_id,
        ]);

        TaskDetail::create([
            'task_id' => $task->id,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ]);

        if ($this->file1) {
            Media::create([
                'path' => $this->uploadFile1(),
                'name' => $this->subject,
                'size' => $this->file1->getSize(),
            ]);
        }

        if ($this->file2) {
            Media::create([
                'path' => $this->uploadFile2(),
                'name' => $this->subject,
                'size' => $this->file2->getSize(),
            ]);
        }

        if ($this->file3) {
            Media::create([
                'path' => $this->uploadFile3(),
                'name' => $this->subject,
                'size' => $this->file3->getSize(),
            ]);
        }
        

        $this->dispatch('toastr:success', message: 'وظیفه جدید ایجاد شد');
        $this->redirectRoute('tasks.index');
    }
    public function uploadFile1(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "tasks/$year/$month";
        $name= $this->file1->getClientOriginalName();
        $this->file1->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function uploadFile2(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "tasks/$year/$month";
        $name= $this->file2->getClientOriginalName();
        $this->file2->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function uploadFile3(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "tasks/$year/$month";
        $name= $this->file3->getClientOriginalName();
        $this->file3->storeAs($directory,$name);
        return "$directory/$name";
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
