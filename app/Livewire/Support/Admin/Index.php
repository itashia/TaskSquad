<?php

namespace App\Livewire\Support\Admin;

use App\Models\Permissions;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use function Laravel\Prompts\alert;

class Index extends Component
{
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $user = User::all();
        return view('livewire.support.admin.index', compact('user'));
    }
}
