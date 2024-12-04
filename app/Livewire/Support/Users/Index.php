<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

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
        $this->alert('success', 'کاربر مورد نظر حذف شد!');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $users = $this->readyToLoad ? User::latest()->paginate(5) : [];
        return view('livewire.support.users.index', compact('users'));
    }

}
