<?php

namespace App\Livewire\Support\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3')]
    public $name;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|min:8')]
    public $password;
    #[Validate('image|max:2048')]
    public $pic;
    public User $user;

    public function mount($id): void
    {

        $this->user = User::find($id);

    }

    public function updated($name): void
    {
        $this->validateOnly($name);
    }

    public function profileUser(): void
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
        $this->dispatch('toastr:success', message: 'پروفایل با موفقیت به روز رسانی شد');
    }
    public function uploadImage(): string
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "users/$year/$month";
        $name= $this->pic->getClientOriginalName();
        $this->pic->storeAs($directory,$name);
        return "$directory/$name";
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $user = $this->user;
        return view('livewire.support.profile.index', compact('user'));
    }
}
