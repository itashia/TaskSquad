<?php

namespace App\Livewire\Support\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination, LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $readyToLoad = true;

    public function loadUsers(): void
    {
        $this->readyToLoad = true;
    }

    public function deleteTrash($id): void
    {
        $user = User::withTrashed()->findOrFail($id);
        $pic_path = public_path("users/$user->pic");

        if (is_file($pic_path)) {
            unlink($pic_path);
        }

        $user->forceDelete();
        $this->alert('success', 'کاربر مورد نظر حذف شد!');
    }

    public function recoveryUser($id): void
    {
        $user = User::withTrashed()->where('id',$id)->first();
        $user->restore();
        $this->alert('success', 'با موفقیت کاربر بازیابی شد!');
    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
    {
        $users = $this->readyToLoad ? DB::table('users')->whereNotNull('deleted_at')->latest()->paginate(15) : [];
        return view('livewire.support.users.trash', compact('users'));
    }
}
