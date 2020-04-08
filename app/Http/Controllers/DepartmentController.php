<?php

namespace App\Http\Controllers;

use App\Department;
use Auth;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
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
            $data = array(
                'status' => true,
                'notification' => translate('department_added_successfully'),
            );
        } else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occurred_when_adding_department'),
            );
        }
        return $data;
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
            $data = array(
                'status' => true,
                'notification' => translate('department_updated_successfully'),
            );
        } else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occurred_when_adding_department'),
            );
        }
        return $data;
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
            $data = array(
                'status' => true,
                'notification' => translate('department_deleted_successfully'),
            );
        } else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occurred_when_deleting_department'),
            );
        }
        return $data;
    }
}
