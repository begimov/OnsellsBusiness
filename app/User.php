<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\RolesPermissions\Role;
use App\Notifications\Auth\ResetPasswordNotification;

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

    public function applications()
    {
        return Models\Promotions\Application::whereIn('promotion_id', $this->promotions->pluck('id'))->latest();
    }

    public function balance()
    {
        return $this->hasOne('App\Models\Balance\Balance');
    }

    public function scopePromotionsCount($query){
        return $query->leftJoin('promotions','promotions.user_id','=','users.id')
            ->selectRaw('users.*, count(promotions.id) as count')
            ->where('promotions.deleted_at','=',null)
            ->groupBy('users.id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
