<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'level',
        'type',
        'address',
        'mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function likes() {
        // return $this->hasMany(User::class);
        return $this->hasMany('App\Like', 'user_id', 'id');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function comments() {
        return $this->hasMany('App\Model\Comment', 'user_id', 'id');
    }


    public function product() {
        return $this->hasMany('App\Model\Product', 'user_id', 'id');
    }
    public function messageFrom() {
        return $this->hasMany('App\Message','to');
    }
    public function messageTo() {
        return $this->hasMany('App\Message','from');
    }
    public function roles() {
        return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles) {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                    return true;
                }
        }
    }

    public function hasRole($role) {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

}
