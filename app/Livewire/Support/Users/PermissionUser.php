<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PermissionUser extends Component
{

    #[Validate('required|array')]
    public $permissions = [];  // Add this line
    #[Validate('required|array')]
    public $roles = [];
    public User $user;  // Add this to store the user

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->roles = $user->roles->pluck('id')->toArray();
        $this->permissions = $user->permissions()->pluck('id')->toArray();
    }

    public function savePermissionUser(User $user): void
    {
        if (!empty($this->roles)) {
            $user->roles()->sync($this->roles);
        }

        if (!empty($this->permissions)) {
            $user->permissions()->sync($this->permissions);
        }

        $user->roles()->role_id = $this->roles;
        $user->permissions()->user_id = $this->permissions;

        $user->save();

        $this->dispatch('toastr:warning', message: 'دسترسی جدید برای کاربر ایجاد شد.');
        $this->redirectRoute('users.index');
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $user = User::all();
        return view('livewire.support.users.permissionUser', compact('user'));
    }
}
