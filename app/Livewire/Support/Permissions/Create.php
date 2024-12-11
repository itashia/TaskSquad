<?php

namespace App\Livewire\Support\Permissions;

use App\Models\Permissions;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    #[Validate('required|min:6')]
    public $title;
    #[Validate('required|min:6')]
    public $value;
    public Permissions $permission;

    public function updated($title): void
    {
        $this->validateOnly($title);
    }

    public function savePermissions(): void
    {
        $this->validate();

        Permissions::query()->create([
            'title' => $this->title,
            'value' => $this->value,
        ]);

        $this->alert('success', 'دسترسی جدید ایجاد شد.');
        $this->redirectRoute('permissions.index');
    }
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.permissions.create');
    }
}
