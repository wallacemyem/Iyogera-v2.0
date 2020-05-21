<?php

namespace App\Http\Controllers;

use App\Syllabus;
use App\Section;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('syllabus');
        return view('backend.'.Auth::user()->role.'.syllabus.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.syllabus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $syllabus = new Syllabus();
        $syllabus->title = $request->title;
        $syllabus->class_id = $request->class_id;
        $syllabus->section_id = $request->section_id;
        $syllabus->subject_id = $request->subject_id;
        $syllabus->school_id = school_id();
        $syllabus->session = get_schools();

        if ($request->hasFile('syllabus')) {
            $dir  = 'backend/files/syllabus';
            $syllabus_to_upload = $request->file('syllabus');
            $file_name = strtotime(date('d-M-Y')).".".$syllabus_to_upload->getClientOriginalExtension();
            $syllabus_to_upload->move($dir, $file_name);
            $syllabus->file = $file_name;
            $syllabus->save();
            $data = array(
                'status' => true,
                'notification' => translate('syllabus_uploaded_successfully')
            );
        }else {
            $data = array(
                'status' => false,
                'notification' => translate('an_error_occured_when_uploading_syllabus')
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function show($section_id)
    {
        $section  = Section::find($section_id);
        $class_id = $section->class_id;
        $running_session = get_schools();
        $school_id = school_id();
        $syllabuses = Syllabus::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
        return view('backend.'.Auth::user()->role.'.syllabus.list', compact('syllabuses'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function edit(Syllabus $syllabus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Syllabus $syllabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Syllabus  $syllabus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syllabus = Syllabus::find($id);
        $syllabus->delete();
        return array(
            'status' => true,
            'notification' => translate('syllabus_has_been_deleted_successfully')
        );
    }

    public function download($file) {
        return Storage::download(asset('backend/files/syllabus/'.$file));
    }
}
