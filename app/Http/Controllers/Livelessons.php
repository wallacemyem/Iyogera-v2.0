<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Livelesson;

class Livelessons extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $time = Carbon::now();
        $set = CarbonImmutable::now();
        //dd($time);
        $title = translate('live_lessons');
        return view('backend.'.Auth::user()->role.'.live_lessons.index', compact('title', 'time', 'set'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.live_lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $start_time = $request->starting_hour.':'.$request->starting_minute.' '.$request->start_day;
        $end_time   = $request->ending_hour.':'.$request->ending_minute.' '.$request->end_day;
        $slug       = str_slug($request->topic);
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $hex        = substr(str_shuffle($permitted_chars), 0, 16);
        $hexx       = substr(str_shuffle($permitted_chars), 0, 16);
        $pss        = $hexx.'-'.$slug.'-'.$hex;
        $name_slug  = preg_replace('/\s/', '', $request->name);
        $name       = $hex.$name_slug;
        //dd($name_slug);

        $live = new Livelesson;
        $live->name = $request->name;
        $live->topic = $request->topic;
        $live->live_url = $name;
        $live->slug   = $slug;
        $live->start_time = $start_time;
        $live->end_time = $end_time;
        $live->password = $pss;
        $live->school_id = school_id();
        $live->session = get_schools();

        if($live->save()){
            flash(translate('live_lessons_added_successfully'))->success();
               
        }else {
            flash('an_error_occured_when_adding_live')->error();
            
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function meetup(Request $request)
    {

        $id = $request->id;
        $live_lessons = Livelesson::where(['id' => $id])->first();
        
        $password = $live_lessons->password;
        $live_url = $live_lessons->live_url;
        $topic    = $live_lessons->topic;
        $name     = $live_lessons->name;
        $title    = $name;

        return view('backend.'.Auth::user()->role.'.live_lessons.meetup', compact('title', 'password', 'live_url', 'name', 'topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $live = Livelesson::find($id);
        $live->unpublish = 1;
        $live->save();
        flash(translate('live_lesson_unpublished_successfully'))->success();
        return redirect()->back();
    }
}
