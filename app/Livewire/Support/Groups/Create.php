<?php

namespace App\Livewire\Support\Groups;

use App\Models\Groups;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, LivewireAlert;

    #[Validate('required|min:6')]
    public $name;
    #[Validate('nullable')]
    public $type;
    #[Validate('image|max:2048')]
    public $logo;
    public Groups $groups;

    public function updated($name): void
    {
        $this->validateOnly($name);
    }

    public function saveGroups(): void
    {
        $this->validate();

        $groups = Groups::query()->create([
            'name' => $this->name,
            'type' => $this->type,
        ]);

        if ($this->logo) {
            $groups->update([
                'logo' => $this->uploadImage()
            ]);
        }

        $this->alert('success', 'کاربر جدید ایجاد شد.');
        $this->redirectRoute('groups.index');
    }

    public function uploadImage(): string
    {
        $year = now()->year;
        $month = now()->month; $directory = "groups/$year/$month";
        $name= $this->logo->getClientOriginalName(); $this->logo->storeAs($directory,$name);
        return "$directory/$name";
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        return view('livewire.support.groups.create');
    }
}
