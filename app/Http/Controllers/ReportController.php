<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class ReportController extends Controller
{
    public function index(){

    	//$students = \App\Enroll::where(['school_id' => school_id()])->get();
    	$students = get_schools();
    	dd($students);

    	return view('backend.'.Auth::user()->role.'.report.student');

    }


}
