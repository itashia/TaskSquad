<?php

namespace App\Livewire\Support\Groups;

use App\Models\Groups;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = true;

    public function loadGroups(): void
    {
        $this->readyToLoad = true;
    }

    public function deleteGroups($id): void
    {
        $group = Groups::find($id);
        $group->delete();
        $this->dispatch('toastr:success', message: 'گروه با موفقیت حذف شد');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $groups = $this->readyToLoad ? Groups::where('name','LIKE',"%{$this->search}%")->
        orWhere('type','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(5) : [];
        return view('livewire.support.groups.index', compact('groups'));
    }
}
