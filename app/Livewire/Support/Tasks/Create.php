<?php

namespace App\Livewire\Support\Tasks;

use AllowDynamicProperties;
use App\Models\Media;
use App\Models\Roles;
use App\Models\TaskDetail;
use App\Models\Tasks;
use App\Models\UserHasTask;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[AllowDynamicProperties] class Create extends Component
{
    use WithFileUploads, LivewireAlert;

    #[Validate('required')]
    public $type_id;
    #[Validate('required')]
    public $subject;
    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $owner_id;
    #[Validate('required')]
    public $due_date;
    #[Validate('required')]
    public $number;
    #[Validate('required')]
    public $status_id;
    #[Validate('required')]
    public $description;
    #[Validate('required')]
    public $priority_id;
    #[Validate('nullable')]
    public $fileOne;
    #[Validate('nullable')]
    public $fileTwo;
    #[Validate('nullable')]
    public $fileThree;
    #[Validate('nullable|array')]
    public $role;

    public function mount(): void
    {
        $this->task = new Tasks();
    }

    public function updated($subject): void
    {
        $this->validateOnly($subject);
    }

    public function saveTasks(): void
    {
        $this->validate();

        $idTask = Tasks::get()->last()->id;

        $task = Tasks::query()->create([
            'type_id' => $this->type_id,
            'subject' => $this->subject,
            'user_id' => $this->user_id,
            'owner_id' => auth()->user()->id,
            'due_date' => Carbon::now(),
            'number' => $idTask + 1,
            'status_id' => 1,
            'priority_id' => $this->priority_id,
        ]);

        TaskDetail::create([
            'task_id' => $task->id,
            'description' => $this->description,
            'user_id' => $this->user_id,
        ]);

        if ($this->fileOne) {
            Media::create([
                'path' => $this->uploadFileOne(),
                'name' => $this->task->subject,
                'size' => $this->fileOne->getSize(),
            ]);
        }

        if ($this->fileTwo) {
            Media::create([
                'path' => $this->uploadFileTwo(),
                'name' => $this->task->subject,
                'size' => $this->fileTwo->getSize(),
            ]);
        }

        if ($this->fileThree) {
            Media::create([
                'path' => $this->uploadFileThree(),
                'name' => $this->task->subject,
                'size' => $this->fileThree->getSize(),
            ]);
        }

        if ($this->role) {
            $users = DB::table('role_user')->where('role_id',$this->role)->get();
            foreach ($users as $row){
                UserHasTask::create([
                    'user_id' => $row->user_id,
                    'task_id' => $task->id,
                    'access' => 1,
                ]);
            }
        }

        $this->redirectRoute('tasks.index');
        $this->alert('success', 'وظایف جدید ایجاد شد.');
    }

    public function uploadFileOne(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "tasks/$year/$month";
        $name= $this->fileOne->getClientOriginalName();
        $this->fileOne->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function uploadFileTwo(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "tasks/$year/$month";
        $name= $this->fileTwo->getClientOriginalName();
        $this->fileTwo->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function uploadFileThree(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "tasks/$year/$month";
        $name= $this->fileThree->getClientOriginalName();
        $this->fileThree->storeAs($directory,$name);
        return "$directory/$name";
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.tasks.create');
    }
}
