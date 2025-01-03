<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;


class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = true;

    public function loadUsers(): void
    {
        $this->readyToLoad = true;
    }

    public function deleteUser($id): void
    {
        $user = User::find($id);
        $user->delete();
        $this->dispatch('toastr:warning', message: 'کاربر به زباله دان فرستاده شد.');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $users = $this->readyToLoad ? User::where('name','LIKE',"%{$this->search}%")->
        orWhere('email','LIKE',"%{$this->search}%")->
        orWhere('mobile','LIKE',"%{$this->search}%")->
        orWhere('phone','LIKE',"%{$this->search}%")->
        orWhere('position','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(5) : [];
        return view('livewire.support.users.index', compact('users'));
    }

}
