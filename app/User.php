<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function cities()
    {
        return $this->belongsToMany('App\City');
    }

    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function userMessages()
    {
        return $this->hasMany('App\Contact');
    }

    protected static function redirectWhenNotUser() 
    {
        if (Gate::denies('view-profile')) {
            notify()->error('You are not authorized to view this user', 'Access Denied');
            redirect()->back()->send();
            return true;
        }
        return false;
    }

    // protected static function uniqidReal($length = 13) 
    // {
    //     if (function_exists("random_bytes")) {
    //         $bytes = random_bytes(ceil($length / 2));
    //     } elseif (function_exists("openssl_random_pseudo_bytes")) {
    //         $bytes = openssl_random_pseudo_bytes(ceil($length / 2));
    //     } else {
    //         throw new Exception("no cryptographically secure random function available");
    //     }
    //     return substr(bin2hex($bytes), 0, $length);
    // }
}
