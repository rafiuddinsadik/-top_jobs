<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password', 'user_role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return !! ($this->user_role == 1);
    }

    public function isCompany()
    {
        return !! ($this->user_role == 2);
    }

    public function isCandidate()
    {
        return !! ($this->user_role == 3);
    }

    // Every Employer / Company Many has many posted jobs
    public function jobs()
    {
        return $this->hasMany(Job::class, 'user_id', 'id');
    }
}
