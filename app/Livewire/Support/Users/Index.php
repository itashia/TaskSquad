<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Masmerise\Toaster\Toaster;


class Index extends Component
{
    use WithPagination, LivewireAlert;

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
        $this->alert('success', 'کاربر مورد نظر به زباله دادن برای حذف نهایی منتقل شد!');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $users = $this->readyToLoad ? User::where('name','LIKE',"%{$this->search}%")->
        orWhere('username','LIKE',"%{$this->search}%")->
        orWhere('email','LIKE',"%{$this->search}%")->
        orWhere('mobile','LIKE',"%{$this->search}%")->
        orWhere('phone','LIKE',"%{$this->search}%")->
        orWhere('position','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(5) : [];
        return view('livewire.support.users.index', compact('users'));
    }

}
