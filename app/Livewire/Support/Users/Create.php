<?php

namespace App\Livewire\Support\Users;

use AllowDynamicProperties;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

#[AllowDynamicProperties] class Create extends Component
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

    public function updated($name): void
    {
        $this->validateOnly($name);
    }

    public function saveUser(): void
    {
        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'position' => $this->position,
            'birthday' => $this->birthday,
            'imei' => $this->imei,
            'password' => Hash::make($this->password),
        ]);

        if ($this->pic) {
            $user->update([
                'pic' => $this->uploadImage()
            ]);
        }

        $this->redirectRoute('users.index');
        $this->alert('success', 'کاربر جدید ایجاد شد.');
    }
    public function uploadImage(): string
    {
        $year = now()->year; $month = now()->month; $directory = "users/$year/$month";
        $name= $this->pic->getClientOriginalName(); $this->pic->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.support.users.create');
    }
}
