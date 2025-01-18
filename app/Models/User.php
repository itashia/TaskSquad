<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */

    use HasFactory, Notifiable, SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_staff',
        'birthday',
        'group_id',
        'mobile',
        'phone',
        'gender',
        'role_id',
        'imei',
        'pic',
        'position'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permissions::class, 'permissions_user', 'user_id', 'permission_id');
    }

    public function hasPermission($permission): bool
    {
        return $this->permissions->contains('title', $permission->title);
    }

    public function givePermission($permission): false|array
    {
        if (is_string($permission)) {
            $permission = Permissions::where('title', $permission)->first();
        }

        if (!$permission) {
            return false;
        }

        return $this->permissions()->syncWithoutDetaching($permission);
    }

    public function revokePermission($permission): int
    {
        if (is_string($permission)) {
            $permission = Permissions::where('title', $permission)->first();
        }

        return $this->permissions()->detach($permission);
    }


//    public function isAdmin()
//    {
//        return $this->is_admin;
//    }

    public function isAdmin(): bool
    {
        return $this->roles()->where('title', 'isAdmin')->count() > 0;
    }

    public function isStaff()
    {
        return $this->is_staff;
    }

    public function hasRole($roles)
    {
        return !! $roles->intersect($this->roles)->all();
    }

    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Roles::class, 'role_user', 'user_id', 'role_id'); // Adjust Role class namespace if necessary
    }

}
