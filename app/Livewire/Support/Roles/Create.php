<?php

namespace App\Livewire\Support\Roles;

use App\Models\Roles;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{

    #[Validate('required|min:6')]
    public $title;
    #[Validate('required|min:6')]
    public $value;
    public Roles $roles;

    public function updated($title): void
    {
        $this->validateOnly($title);
    }

    public function saveRoles(): void
    {
        $this->validate();

        Roles::query()->create([
            'title' => $this->title,
            'value' => $this->value,
        ]);

        $this->dispatch('toastr:success', message: 'مقام جدید ایجاد شد');
        $this->redirectRoute('roles.index');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.roles.create');
    }
}
