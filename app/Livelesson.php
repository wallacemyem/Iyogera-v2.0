<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Teacher;
use App\Mark;
use App\Classes;
use App\Subject;

class Livelesson extends Model
{
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function class() {
        return $this->belongsTo(Classes::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
