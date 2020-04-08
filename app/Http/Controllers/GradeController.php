<?php

namespace App\Http\Controllers;

use App\Grade;
use Auth;
use Illuminate\Http\Request;

class GradeController extends Controller
{
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
        $grade->session = get_school();
        if($grade->save()){
            $data = array(
                'status' => true,
                'notification' => translate('grade_added_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' => translate('an_error_occured_when_adding_grade')
            );
        }
        return $data;
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
        $grade->session = get_school();
        if($grade->save()){
            $data = array(
                'status' => true,
                'notification' => translate('grade_updated_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_updating_grade')
            );
        }
        return $data;
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
            $data = array(
                'status' => true,
                'notification' => translate('grade_deleted_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_deleting_grade')
            );
        }
        return $data;
    }
}
