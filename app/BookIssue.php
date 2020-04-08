<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Book;
use App\Student;
use App\Classes;
class BookIssue extends Model
{

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }
}
