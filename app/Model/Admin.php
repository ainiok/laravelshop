<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
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
        'password', 'remember_token', 'created_at', 'updated_at',
    ];

    public function setPasswordAttribute($value)
    {
        \Log::info($value);
        $this->attributes['password'] = bcrypt($value);
        \Log::info($this->attributes['password']);
    }

    public function login_history()
    {
        return $this->hasMany('App\Model\AdminLoginHistory');
    }

}
