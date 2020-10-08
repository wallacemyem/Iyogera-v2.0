<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\Livelesson;
use App\Http\Request as AppRequest;
use App\Http\Resources\Livelesson as LivelessonResource;

class Livelessons extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livelesson = Livelesson::paginate(4);

        return LivelessonResource::collection($livelesson);

    }

    public function lists()
    {
        $livelesson = Livelesson::all();

        return LivelessonResource::collection($livelesson)
                ->response()
                ->header('Access-Control-Allow-Origin', '*');

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

        $start_time = $request->input('starting_hour').':'.$request->input('starting_minute').' '.$request->input('start_day');
        $end_time   = $request->input('ending_hour').':'.$request->input('ending_minute').' '.$request->input('end_day');
        $slug       = str_slug($request->input('topic'));
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $hex        = substr(str_shuffle($permitted_chars), 0, 16);
        $hexx       = substr(str_shuffle($permitted_chars), 0, 16);
        $pss        = $hexx.'-'.$slug.'-'.$hex;
        $name_slug  = preg_replace('/\s/', '', $request->input('name'));
        $name       = $hex.$name_slug;
        //dd($name_slug);

        $live = $request->isMethod('put') ? Livelesson::findorFail($request->id) : new Livelesson;
        $live->name = $request->input('name');
        $live->topic = $request->input('topic');
        $live->live_url = $name;
        $live->slug   = $slug;
        $live->start_time = $start_time;
        $live->end_time = $end_time;
        $live->password = $pss;
        //$live->user_id = Auth::user()->id;
        $live->save();
            
            return new LivelessonResource($live);   
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $live = Livelesson::findOrFail($id);

        return new LivelessonResource($live);
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
        $live = Livelesson::findOrFail($id);
        $live->unpublish = 1;
        if($live->save()){
            
            return new LivelessonResource($live);   
        }
        

    }
}
