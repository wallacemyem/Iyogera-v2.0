<?php

namespace App\Http\Controllers;

use App\Grade;
use Auth;
use Illuminate\Http\Request;

class GradeController extends Controller
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
        $title = translate('exam_grade');
        return view('backend.'.Auth::user()->role.'.grade.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = new Grade;
        $grade->name = $request->name;
        $grade->grade_point = $request->grade_point;
        $grade->mark_from = $request->mark_from;
        $grade->mark_upto = $request->mark_upto;
        $grade->comment = $request->comment;
        $grade->school_id = school_id();
        $grade->session = get_schools();
        if($grade->save()){
            flash(translate('grade_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_grade')->error();
            
        }

        return redirect()->back();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.grade.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view('backend.'.Auth::user()->role.'.grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);
        $grade->name = $request->name;
        $grade->grade_point = $request->grade_point;
        $grade->mark_from = $request->mark_from;
        $grade->mark_upto = $request->mark_upto;
        $grade->comment = $request->comment;
        $grade->school_id = school_id();
        $grade->session = get_schools();
        if($grade->save()){
           flash(translate('grade_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_grade')->error();
            
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Grade::destroy($id)){
            flash(translate('grade_deleted_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_deleting_grade')->error();
            
        }

        return redirect()->back();
            
    }
}
