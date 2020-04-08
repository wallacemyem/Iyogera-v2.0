<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Department;
class Teacher extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
