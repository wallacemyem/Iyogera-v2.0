<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enroll;
use App\Mark;

class Student extends Model
{
	protected $table = "students";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function enroll() {
        return $this->belongsTo(Enroll::class);
    }

    public function mark() {
        return $this->belongsTo(Mark::class);
    }
}
