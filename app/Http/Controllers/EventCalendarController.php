<?php

namespace App\Http\Controllers;

use App\EventCalendar;
use Auth;
use Illuminate\Http\Request;

class EventCalendarController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = translate('📆');
        return view('backend.'.Auth::user()->role.'.event_calendar.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.event_calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new EventCalendar;
        $event->title = $request->title;
        $starting_date = strtotime($request->starting_date);
        $event->starting_date = date('Y-m-d',$starting_date).' 00:00:01';
        $ending_date = strtotime($request->ending_date);
        $event->ending_date = date('Y-m-d', $ending_date).' 23:59:59';
        $event->school_id = school_id();
        $event->session = get_schools();
        if($event->save()) {
            flash(translate('event_has_been_created_successfully'))->success();
            
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function show(EventCalendar $eventCalendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventCalendar::find($id);
        return view('backend.'.Auth::user()->role.'.event_calendar.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = EventCalendar::find($id);
        $event->title = $request->title;
        $starting_date = strtotime($request->starting_date);
        $event->starting_date = date('Y-m-d',$starting_date).' 00:00:01';
        $ending_date = strtotime($request->ending_date);
        $event->ending_date = date('Y-m-d', $ending_date).' 23:59:59';
        $event->school_id = school_id();
        $event->session = get_schools();
        if($event->save()) {
            flash(translate('event_has_been_updated_successfully'))->success();
            }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventCalendar  $eventCalendar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = EventCalendar::find($id);
        $event->delete();
        flash(translate('event_has_been_deleted_successfully'))->success();
            
        
        return redirect()->back();
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.event_calendar.list')->render();
    }

    public function all()
    {   
        $query = EventCalendar::where('school_id', school_id())->where('session', get_schools())->get();
        return $query;
    }
}
