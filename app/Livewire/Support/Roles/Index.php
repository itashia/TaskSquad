<?php

namespace App\Livewire\Support\Roles;

use App\Models\Roles;
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

    public function loadRoles(): void
    {
        $this->readyToLoad = true;
    }

    public function deleteRole($id): void
    {
        $role = Roles::find($id);
        $role->delete();
        $this->alert('success', 'مقام مورد نظر حذف شد!');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $roles = $this->readyToLoad ? Roles::where('title','LIKE',"%{$this->search}%")->
        orWhere('value','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.roles.index', compact('roles'));
    }
}
