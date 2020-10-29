<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function home()
    {
        if(\Auth::check()){
            return Redirect::to('https://home.iyogera.com');
        }else{
            $title = "Dashboard";
            return view('backend.'.Auth::user()->role.'.dashboard.dashboard', compact('title'));
        }
    }
    
    public function index()
    {
        $purchased_courses = NULL;
        if (\Auth::check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('id', \Auth::id());
            })
            ->with('lessons')
            ->orderBy('id', 'desc')
            ->get();
        }
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        return view('index', compact('courses', 'purchased_courses'));
    }
}
