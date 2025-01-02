<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads, LivewireAlert;

    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|min:11')]
    public $mobile;
    #[Validate('required|min:11')]
    public $phone;
    #[Validate('required')]
    public $gender;
    #[Validate('required|min:3')]
    public $position;
    #[Validate('required|min:6')]
    public $birthday;
    #[Validate('required|min:10')]
    public $imei;
    #[Validate('required|min:3')]
    public $username;
    #[Validate('required|min:8')]
    public $password;
    #[Validate('image|max:2048')]
    public $pic;
    #[Validate('required')]
    public $role_id;
    public User $user;

    public function updated($name): void
    {
        $this->validateOnly($name);
    }

    public function editUser(): void
    {
        $this->validate();

        if ($this->pic) {
            $this->user->update([
                'pic' => $this->uploadImage()
            ]);
        }

        if ($this->password) {
            $this->user->update([
                'password' =>Hash::make($this->password)
            ]);
        }

        $this->user->update($this->validate());
        $this->redirectRoute('users.index');
        $this->alert('success', 'کاربر ویرایش شد.');
    }
    public function uploadImage(): string
    {
        $year = now()->year; $month = now()->month; $directory = "users/$year/$month";
        $name= $this->pic->getClientOriginalName(); $this->pic->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $user = $this->user;
        return view('livewire.support.users.edit', compact('user'));
    }
}
