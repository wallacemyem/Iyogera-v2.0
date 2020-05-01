<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = "students";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function mark() {
        return $this->belongsTo(Mark::class);
    }
}
