<?php

namespace App\Http\Controllers;

use App\Department;
use Auth;
use Illuminate\Http\Request;

class DepartmentController extends Controller
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
        $title = translate('department');
        return view('backend.' . Auth::user()->role . '.department.index', compact('title'));
    }

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function create()
    {
        return view('backend.' . Auth::user()->role . '.department.create');
    }

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->school_id = school_id();
        if ($department->save()) {

            flash(translate('department_added_successfully'))->success();
               
        }else {
            flash('an_error_occurred_when_adding_department')->error();
            
        }

        return redirect()->back();
            
    }

/**
 * Display the specified resource.
 *
 * @param  \App\Department  $department
 * @return \Illuminate\Http\Response
 */
    public function show(Department $department)
    {

    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.department.list')->render();
    }

/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Department  $department
 * @return \Illuminate\Http\Response
 */
    public function edit($id)
    {
        $department = Department::find($id);
        return view('backend.' . Auth::user()->role . '.department.edit', compact('department'));
    }

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \App\Department  $department
 * @return \Illuminate\Http\Response
 */
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->name = $request->name;
        $department->school_id = school_id();
        if ($department->save()) {
            flash(translate('department_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_department')->error();
            
        }

        return redirect()->back();
            
    }

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Department  $department
 * @return \Illuminate\Http\Response
 */
    public function destroy($id)
    {
        if (Department::destroy($id)) {

            flash(translate('an_error_occurred_when_deleting_department'))->success();
               
        }else {
            flash('an_error_occurred_when_deleting_department')->error();
            
        }

        return redirect()->back();
            
    }
}
