<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BookIssue;

class Book extends Model
{
    public function book_issue(){
        return $this->hasMany(BookIssue::class);
    }

    public function book_issued(){
        return $this->hasMany(BookIssue::class)->where('status',0);
    }
}
