<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

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

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $users = $this->readyToLoad ? User::latest()->paginate(1) : [];
        return view('livewire.support.users.index', compact('users'));
    }
}
