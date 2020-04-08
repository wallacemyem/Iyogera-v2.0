<?php

namespace App\Http\Controllers;

use App\Section;
use App\Classes;
use Illuminate\Http\Request;
use Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $sections = Section::where('class_id', $class_id)->get();
        return view('backend.'.Auth::user()->role.'.section.list', compact('sections'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $class_id)
    {

        foreach(array_combine($request->name, $request->section_id) as $name => $section_id){
            if($name) {
                $section = $section_id ? Section::find($section_id) : new Section;
                $section->name = $name;
                $section->class_id = $class_id;
                $section->school_id = school_id();
                $section->save();
            }
        }

        return array(
            'status' => true,
            'notification' => translate('section_updated_successfully')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($section_id)
    {
        $selected_section = Section::find($section_id);
        $class_id = $selected_section->class_id;
        $sections_for_that_class = Section::where('class_id', $class_id)->get();
        if(sizeof($sections_for_that_class) == 1){
            return array(
                'status' => false,
                'notification' => translate('every_class_should_have_at_least_one_section')
            );
        }else {
            Section::destroy($section_id);
            return array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.class.list')->render(),
                'notification' => translate('section_deleted_successfully')
            );
        }
    }
}
