<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Mark;

class Result extends Model
{
    protected $table = "result";

    public function mark() {
        return $this->belongsTo(Mark::class);
    }
}

