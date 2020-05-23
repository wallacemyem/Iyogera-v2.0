<?php

namespace App\Http\Controllers;

use App\Session;
use App\School;
use App\Setting;
use Illuminate\Http\Request;
use Auth;
use DB;

class SessionManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('session_manager');
        return view('backend.'.Auth::user()->role.'.session.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $session = new Session;
            $session->name = $request->session_title;
            $session->school_id = school_id();
            if($session->save()){

                flash(translate('session_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_session')->error();
            
        }

        return redirect()->back();
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::find($id);
        return view('backend.'.Auth::user()->role.'.session.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $session = Session::find($id);
        $session->name = $request->session_title;
        $session->school_id = school_id();

        if($session->save()){
            flash(translate('session_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_session')->error();
            
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::destroy($id)){
            flash(translate('session_deleted_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_deleting_session')->error();
            
        }

        return redirect()->back();
            
    }

    public function active($id)
    {
        $school = school_id();
        $session = Session::find($id);
        $setting = School::find($school);
        $setting->session = $session->id;

        if($setting->save()){

            flash(translate('session_activated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_activating_session')->error();
            
        }

        return redirect()->back();
            
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.session.list')->render();
    }
}
