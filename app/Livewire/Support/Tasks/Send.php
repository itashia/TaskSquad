<?php

namespace App\Livewire\Support\Tasks;

use App\Models\Task;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Send extends Component
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
        $this->alert('success', 'وظایف مورد نظر حذف شد!');
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $tasks = Task::where('owner_id',auth()->user()->id)->get();
        $paginate = Task::paginate(5);
        return view('livewire.support.tasks.send', compact('tasks', 'paginate'));
    }
}
