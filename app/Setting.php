<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    public function school() {
        return $this->belongsTo(School::class);
    }
}
