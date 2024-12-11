<?php

namespace App\Livewire\Support\Permissions;

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];
    public $readyToLoad = true;

    public function loadPermissions(): void
    {
        $this->readyToLoad = true;
    }

    public function deletePermissions($id): void
    {
        $permissions = Permissions::find($id);
        $permissions->delete();
        $this->alert('success', 'دسترسی مورد نظر حذف شد!');
    }

    public function deletePermissionRole($id): void
    {
        $permissionRoles = DB::table('permissions_role')->where('permission_id',$id);
        $permissionRoles->delete();
        $this->alert('success', 'دسترسی مورد نظر حذف شد!');
    }

    public function addRoles($data): void
    {
        $permission = $data[0];
        $role = $data[1];

        if (
            DB::table('permissions_role')
                ->where('role_id', '=', $role)
                ->where('permission_id', '=', $permission)
                ->exists()
        ) {
            $this->alert('error', 'مشکلی در ایجاد کردن به وجود آمد!');
        } else {
            // Ensure valid foreign keys
            $permissionExists = DB::table('permissions')->where('id', $permission)->exists();
            $roleExists = DB::table('roles')->where('id', $role)->exists();

            if (!$permissionExists || !$roleExists) {
                $this->alert('error', 'دسترسی یا شناسه نامعتبر است!');
                return;
            }

            DB::table('permissions_role')->insert([
                'permission_id' => $permission,
                'role_id' => $role,
            ]);
            $this->alert('success', 'با موفقیت ایجاد شد!');
        }


    }

    public function render(): \Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        $permissions = $this->readyToLoad ? Permissions::where('title','LIKE',"%{$this->search}%")->
        orWhere('value','LIKE',"%{$this->search}%")->
        orWhere('id',$this->search)->latest()->paginate(15) : [];
        return view('livewire.support.permissions.index', compact('permissions'));
    }
}
