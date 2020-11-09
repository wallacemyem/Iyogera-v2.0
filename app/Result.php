<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mark;
use App\Enroll;

class Result extends Model
{
    protected $table = "result";

    public function mark() {
        return $this->belongsTo(Mark::class);
    }

    public function enroll() {
        return $this->belongsTo(Enroll::class);
    }
}

