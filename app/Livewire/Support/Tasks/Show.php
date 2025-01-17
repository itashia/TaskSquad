<?php

namespace App\Livewire\Support\Tasks;

use App\Models\Task;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public Task $task;
    public function mount($id): void
    {

        $this->task = Task::find($id);
        $this->loadTasks();

    }
    public function loadTasks(): void
    {
        $this->task = Task::find($this->id);
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.tasks.show');
    }
}
