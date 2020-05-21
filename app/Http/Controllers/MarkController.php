<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Section;
use App\Enroll;
use Auth;
use Illuminate\Http\Request;

class MarkController extends Controller
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
        $title = translate('marks');
        return view('backend.'.Auth::user()->role.'.mark.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function edit(Mark $mark)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test = $request->practicals;
        $assg = $request->objectives;
        $exam = $request->theory;
        $total_ca = $test + $assg;
        $total_mark = $total_ca + $exam;

        $mark = Mark::find($id);
        $mark->objectives = $request->objectives;
        $mark->practicals = $request->practicals;
        $mark->theory = $request->theory;
        $mark->ca_total = $total_ca;
        $mark->mark_total = $total_mark;
        $mark->comment = $request->comment;
        $mark->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        //
    }

    public function list(Request $request)
    {
        $exam_id = $request->exam_id;
        $subject_id = $request->subject_id;
        $section_id = $request->section_id;
        $class_id = $request->exam_id;
        $section  = Section::find($section_id);
        $class_id = $section->class_id;
        $running_session = get_schools();
        $school_id = school_id();
        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
            //dd($section_id);
        foreach ($students as $student) {
            //dd($student->student->user->name);
            if (Mark::where('student_id', $student->student->id)->where('subject_id', $subject_id)->where('class_id', $class_id)->where('section_id', $section_id)->where('exam_id', $exam_id)->where('session', $running_session)->where('school_id', $school_id)->count() == 0) {
                $mark = new Mark;
                $mark->student_id = $student->student->id;
                $mark->subject_id = $subject_id;
                $mark->class_id   = $class_id;
                $mark->section_id = $section_id;
                $mark->exam_id    = $exam_id;
                $mark->session    = $running_session;
                $mark->school_id  = $school_id;
                $mark->save();
                //dd();
             }
        }
        return view('backend.'.Auth::user()->role.'.mark.list', compact('student', 'students', 'exam_id', 'subject_id', 'section_id', 'class_id', 'running_session', 'school_id'))->render();
    }
}
