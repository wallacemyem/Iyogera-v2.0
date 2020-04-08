<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
class Mark extends Model
{
    public function student() {
        return $this->belongsTo(Student::class);
    }
    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    public function class() {
        return $this->belongsTo(Classes::class);
    }
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function exam() {
        return $this->belongsTo(Exam::class);
    }
}
