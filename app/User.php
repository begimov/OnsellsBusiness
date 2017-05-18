<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\RolesPermissions\Role;

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

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    public function isModerator()
    {
        return $this->hasRole('moderator');
    }

    public function promotions()
    {
        return $this->hasMany('App\Models\Promotions\Promotion')->latest();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }
}
