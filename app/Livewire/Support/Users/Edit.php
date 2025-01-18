<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $mobile;
    public $phone;
    public $gender;
    public $position;
    public $birthday;
    public $imei;
    public $password;
    public $pic;
    public $role_id;
    public $group_id;
    public User $user;
    protected $rules = [
        'name' => 'required',
        'email' => 'nullable',
        'birthday' => 'nullable',
        'group_id' => 'nullable',
        'mobile' => 'nullable',
        'phone' => 'nullable',
        'gender' => 'nullable',
        'role_id' => 'nullable',
        'imei' => 'nullable',
        'position' => 'nullable',
        'pic' => 'nullable',
    ];

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->phone = $user->phone;
        $this->gender = $user->gender;
        $this->position = $user->position;
        $this->birthday = $user->birthday;
        $this->imei = $user->imei;
        $this->role_id = $user->role_id;
        $this->group_id = $user->group_id;
    }

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

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'position' => $this->position,
            'birthday' => $this->birthday,
            'imei' => $this->imei,
            'password' => $this->password ? Hash::make($this->password) : $this->user->password,
            'role_id' => $this->role_id,
            'group_id' => $this->group_id,
        ]);

        $this->dispatch('toastr:success', message: 'کاربر با موفقیت ویرایش شد');
        $this->redirectRoute('users.index');
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
    public function render(User $user): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.support.users.edit', compact('user'));
    }
}
