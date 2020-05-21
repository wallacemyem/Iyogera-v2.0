<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;
use App\Section;
use App\Subject;

class Syllabus extends Model
{
    protected $table = "syllabuses";
    
    public function class() {
        return $this->belongsTo(Classes::class);
    }
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
}
