<?php

namespace App\Livewire\Support\Admin;

use Livewire\Component;

class Index extends Component
{
    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('livewire.support.admin.index');
    }
}
