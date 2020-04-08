<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Classes;

class Invoice extends Model
{
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
