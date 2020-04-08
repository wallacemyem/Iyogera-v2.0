<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use App\TeacherPermission;
use Illuminate\Http\Request;
use Hash;
use Auth;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('teacher');
        return view('backend.'.Auth::user()->role.'.teacher.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "teacher";
            $user->school_id = school_id();
            $user->phone = $request->phone;
            $user->address = $request->address;
            // $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $teacher = new Teacher;
                $teacher->department_id = $request->department;
                $teacher->designation = $request->designation;
                $teacher->user_id = $user->id;
                $teacher->school_id = school_id();
                $teacher->save();

                //$this->add_to_teacher_permission($teacher->id);

                $data = array(
                    'status' => true,
                    'notification' => translate('teacher_added_successfully')
                );
            }
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('email_duplication')
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show($department_id)
    {
        return view('backend.'.Auth::user()->role.'.teacher.list', compact('department_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('backend.'.Auth::user()->role.'.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if(count(User::where('email', $request->email)->where('id', '!=', $teacher->user->id)->get()) == 0) {
            $user = User::find($teacher->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = "teacher";
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $teacher->department_id = $request->department;
                $teacher->designation = $request->designation;
                $teacher->school_id = school_id();
                $teacher->save();

                $data = array(
                    'status' => true,
                    'notification' => translate('teacher_updated_successfully')
                );
            }
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('email_duplication')
            );
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        $teacher->user->delete();
        return array(
            'status' => true,
            'notification' => translate('teacher_has_been_deleted_successfully')
        );
    }


    // Add to teacher_permission table
    public function add_to_teacher_permission($teacher_id) {
        $teacher_permission = new TeacherPermission;
        $teacher_permission->teacher_id = $teacher_id;
        $teacher_permission->save();
    }

    public function assigned_permissions($teacher_id) {
        $teacher_details = Teacher::find($teacher_id);
        $teacher_permission = new TeacherPermission;
        $permissions = $teacher_permission::where('teacher_id', $teacher_id)->get();
        return view('backend.'.Auth::user()->role.'.teacher.permission', compact('permissions', 'teacher_details'));
    }
}
