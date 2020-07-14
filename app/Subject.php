<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\Mark;

class Subject extends Model
{
    //
    public function mark() {
        return $this->belongsToMany(Mark::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function class() {
        return $this->belongsTo(Classes::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }
}
