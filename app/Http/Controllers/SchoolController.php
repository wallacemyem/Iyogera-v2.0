<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Hash;
use App\Pin;
use DB;
use App\School;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(){

    	$title = translate('schools');
    	//$session = get_settings('running_session');
    	//$schools = DB::table('schools')->where(['session' => get_settings('running_session')])->get();
    	//dd($schools);

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
        return array(
            'status' => true,
            'notification' => translate('accountant_has_been_deleted_successfully')
        );
    }

    public function school_settings_update(Request $request, $id) {
        $school = School::find($id);
        $school->name = $request->school_name;
        $school->phone = $request->phone;
        $school->address = $request->address;
        
        $school->save();
        $data = array(
            'status' => true,
            'notification' => translate('school_settings_updated_successfully')
        );
        return $data;
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
    	$school = new School;
        $school->name = $request->school_name;
        $school->phone = $request->phone;
        $school->address = $request->address;
        $school->session = get_schools();
        $school->save();
        $data = array(
            'status' => true,
            'notification' => translate('saved successfully')
        );
        return $data;	
    }
}

