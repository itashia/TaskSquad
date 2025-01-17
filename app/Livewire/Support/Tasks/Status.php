<?php

namespace App\Livewire\Support\Tasks;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Status extends Component
{
    #[Validate('required')]
    public $status_id;
    public Task $task;
    public function mount($id): void
    {
        $this->task = Task::findOrFail($id);
    }
    public function statusProject(): void
    {
        $this->validate();

        $this->task->update($this->validate());

        $this->dispatch('toastr:success', message: 'وضعیت با موفقیت به روز رسانی شد');
        $this->redirectRoute('tasks.index');
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.tasks.status');
    }
}
