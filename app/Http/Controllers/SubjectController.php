<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Classes;
use Auth;
use Illuminate\Http\Request;

class SubjectController extends Controller
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
        $title = translate('subject');
        return view('backend.'.Auth::user()->role.'.subject.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject;
        $subject->class_id = $request->class_id;
        $subject->section_id = $request->section_id;
        $subject->name = $request->name;
        $subject->teacher_id = $request->teacher_id;
        $subject->school_id = school_id();
        $subject->session = get_schools();

        if($subject->save()){

            flash(translate('subject_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_subject')->error();
            
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $running_session = get_schools();
        $school_id = school_id();
        $checker = array(
            'class_id' => $class_id,
            'section_id' => $section_id,
            'session' => $running_session,
            'school_id' => $school_id
        );
        $subjects = Subject::where($checker)->get();
        return view('backend.'.Auth::user()->role.'.subject.list', compact('subjects', 'class_id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($subject_id)
    {
        $subject = Subject::find($subject_id);
        return view('backend.'.Auth::user()->role.'.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject_id)
    {
        $subject = Subject::find($subject_id);

        $subject->name = $request->name;
        $subject->class_id = $request->class_id;
        $subject->section_id = $request->section_id;
        $subject->teacher_id = $request->teacher_id;

        if($subject->save()){

            flash(translate('subject_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_subject')->warning();
            
        }

        return redirect()->back();
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject_id)
    {

        if(Subject::destroy($subject_id)){

            flash(translate('subject_deleted_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_deleting_subject')->error();
            
        }

        return redirect()->back();
            
    }
}
