<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\School;

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

    public function school() {
        return $this->belongsTo(School::class);
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }


    public function isAdmin()
    {
        return $this->role()->where('role_id', 1)->first();
    }

    public function lessons()
    {
        return $this->belongsToMany('App\Lesson', 'lesson_student');
    }
}
