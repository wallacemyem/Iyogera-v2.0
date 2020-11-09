<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use App\Pin;
use DB;
use App\School;
use App\Session;
use App\Role;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

    	$title = translate('schools');
    	//$session = get_settings('running_session');
    	//$schools = DB::table('schools')->where(['session' => get_settings('running_session')])->get();

    	return view('backend.'.Auth::user()->role.'.school.index', compact('title'));
    }

     public function list()
    {
        return view('backend.'.Auth::user()->role.'.school.list')->render();
    }

    public function destroy($id)
    {
    	$user = School::find($id);
        $user->delete();
        flash(translate('school_has_been_deleted_successfully'))->success();
        return redirect()->back();
        
    }

    public function school_settings_update(Request $request, $id) {
        $school = School::find($id);
        $school->name = $request->school_name;
        $school->phone = $request->phone;
        $school->address = $request->address;
        
        $school->save();
        flash(translate('school_settings_updated_successfully'))->success();
        return redirect()->back();
        
    }

    public function edit($id)
    {
        $school = School::find($id);
        return view('backend.'.Auth::user()->role.'.school.edit', compact('school'));
    }

    public function create()
    {
        return view('backend.'.Auth::user()->role.'.school.create');
    }

    public function store(Request $request)
    {
        $nextyear = date('Y', strtotime('+1 year'));
        $currentyear = date('Y');

    	$school = new School;
        $school->name = $request->school_name;
        $school->phone = $request->phone;
        $school->address = $request->address;
        $school->session = get_schools();
        $school->save();

        $school_id = $school->id;

        $session = new Session;
        $session->name = $currentyear.'/'.$nextyear;
        $session->school_id = $school_id;
        $session->status = 1;
        $session->save();

        $session_id = $session->id;

        $sch = School::find($school_id);
        $sch->session = $session_id;
        $sch->save();

        $role = new Role;
        $role->admin = '["43","6","85","17","16","46","20","28","41","39","82","83"]';
        $role->teacher = '["2","6","85","18","17","46","24","41","87","88"]';
        $role->student = '["6","15","85","17","46","23","28","41","87","88"]';
        $role->accountant = '["28","62","30","39","82"]';
        $role->librarian = '["8","46","54","55","41","40"]';
        $role->school_id = $school_id;
        $role->save();

        $user = new User;
        $user->first_name = $request->first_name;
        $user->other_name = $request->other_name;
        $user->middle_name = $request->middle_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = "superadmin";
        $user->address = $request->address;
        $user->school_id = $school_id;
        $user->phone = $request->phone;
        $user->save();



        flash(translate('saved_successfully'))->success();
        return redirect()->back();
	
    }
}

