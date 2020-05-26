<?php

namespace App\Http\Controllers;

use App\Exam;
use Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
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
        $title = translate('exam');
        return view('backend.'.Auth::user()->role.'.exam.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->name = $request->name;
        $exam->starting_date = strtotime($request->starting_date);
        $exam->ending_date = strtotime($request->ending_date);
        $exam->school_id = school_id();
        $exam->session = get_schools();

        if($exam->save()){
            flash(translate('exam_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_exam')->error();
            
        }

        return redirect()->back();
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.exam.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('backend.'.Auth::user()->role.'.exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        $exam->name = $request->name;
        $exam->starting_date = strtotime($request->starting_date);
        $exam->ending_date = strtotime($request->ending_date);
        $exam->school_id = school_id();
        $exam->session = get_schools();
        if($exam->save()){

            flash(translate('exam_updated_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_updating_exam')->error();
            
        }

        return redirect()->back();
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Exam::destroy($id)){

            flash(translate('exam_deleted_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_deleting_exam')->error();
            
        }

        return redirect()->back();
            
    }
}
