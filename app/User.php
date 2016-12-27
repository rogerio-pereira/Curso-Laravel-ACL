<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        $this->belongsToMany(\App\Role::class);
    }

    public function hasPermission(Permission $permission)
    {
        return $this->hasAnyRoles($permission->roles());
    }

    public function hasAnyRoles($roles)
    {
        if(is_array($rules) || is_object($rules)) {
            foreach($roles as $role) {
                return $this->roles->contains('name', $role->name);
            }
        }

        return $this->roles->contains('name', $roles);
    }
}
