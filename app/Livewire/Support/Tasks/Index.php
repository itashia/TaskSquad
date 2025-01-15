<?php

namespace App\Livewire\Support\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = true;

    public function loadTasks(): void
    {
        $this->readyToLoad = true;
    }

    public function deleteTasks($id): void
    {
        $tasks = Task::find($id);
        $tasks->delete();
        $this->dispatch('toastr:success', message: 'وظیفه با موفقیت حذف شد');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        if (Auth::user()->isAdmin()) {
            $tasks = Task::paginate(10);
        } else {
            $tasks = Task::where('owner_id', Auth::id())->paginate(10);
        }
        return view('livewire.support.tasks.index', compact('tasks'));
    }
}
