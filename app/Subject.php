<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;

class Subject extends Model
{
    //
    public function mark() {
        return $this->belongsToMany(Mark::class);
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
