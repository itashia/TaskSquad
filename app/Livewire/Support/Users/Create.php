<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, LivewireAlert;

    public $pic;
    public User $user;

    protected $rules = [
        'user.name' => 'required',
        'user.username' => 'required',
        'user.email' => 'required',
        'user.password' => 'required',
        'user.is_admin' => 'nullable',
        'user.birthday' => 'nullable',
        'user.mobile' => 'nullable',
        'user.phone' => 'nullable',
        'user.gender' => 'nullable',
        'user.imei' => 'nullable',
        'user.position' => 'nullable',
    ];

    public function updated($name): void
    {
        $this->validateOnly($name);
    }

    public function saveUser(): \Illuminate\Http\RedirectResponse
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'position' => $this->position,
            'birthday' => $this->birthday,
            'imei' => $this->imei,
            'is_admin' => 0,
            'password' => Hash::make($this->user->password),
        ]);

        if ($this->pic) {
            $user->update([
                'pic' => $this->uploadImage()
            ]);
        }

        $this->alert('success', 'کاربر جدید ایجاد شد.');
        return $this->redirect(route('users.index'));
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
