<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

    	$title = translate('users');
    	//$session = get_settings('running_session');
    	//$schools = DB::table('schools')->where(['session' => get_settings('running_session')])->get();
    	//dd($schools);

    	return view('backend.'.Auth::user()->role.'.user.index', compact('title'));
    }

     public function list()
    {
        return view('backend.'.Auth::user()->role.'.user.list')->render();
    }

    public function show($school_id)
    {
        return view('backend.'.Auth::user()->role.'.user.list', compact('school_id'));
    }
}
