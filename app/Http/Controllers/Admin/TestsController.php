<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Test;
use App\Classes;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestsRequest;
use App\Http\Requests\Admin\UpdateTestsRequest;

class TestsController extends Controller
{
    /**
     * Display a listing of Test.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = translate('tests');

        if (request('show_deleted') == 1) {
            
            $tests = Test::onlyTrashed()->get();
        } else {
            $tests = Test::all();
        }
        //dd($tests);
        return view('backend.'.Auth::user()->role.'.lessons.tests.index', compact('tests', 'title'));
    }

    /**
     * Show the form for creating new Test.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $courses = \App\Classes::where(['school_id' => school_id()])->get();
        $courses_ids = $courses->pluck('id');

        $courses = $courses->pluck('name', 'id')->prepend('Please select', '');
        $lessons = \App\Lesson::whereIn('classes_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');
        //dd($lessons);

        return view('backend.'.Auth::user()->role.'.lessons.tests.create', compact('courses', 'lessons'));
    }

    /**
     * Store a newly created Test in storage.
     *
     * @param  \App\Http\Requests\StoreTestsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestsRequest $request)
    {
        
        $test = Test::create($request->all());

        return redirect()->route('test.index');
    }


    /**
     * Show the form for editing Test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $courses = \App\Classes::where(['school_id' => school_id()])->get();
        $courses_ids = $courses->pluck('id');

        $courses = $courses->pluck('name', 'id')->prepend('Please select', '');
        $lessons = \App\Lesson::whereIn('classes_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

        $test = Test::findOrFail($id);

        return view('backend.'.Auth::user()->role.'.lessons.tests.edit', compact('test', 'courses', 'lessons'));
    }

    /**
     * Update Test in storage.
     *
     * @param  \App\Http\Requests\UpdateTestsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestsRequest $request, $id)
    {
        
        $test = Test::findOrFail($id);
        $test->update($request->all());

        return redirect()->route('test.index');
    }


    /**
     * Display Test.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $test = Test::findOrFail($id);

        return view('backend.'.Auth::user()->role.'.lessons.tests.show', compact('test'));
    }


    /**
     * Remove Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('test.index');
    }

    /**
     * Delete all selected Test at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        
        if ($request->input('ids')) {
            $entries = Test::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        
        $test = Test::onlyTrashed()->findOrFail($id);
        $test->restore();

        return redirect()->route('test.index');
    }

    /**
     * Permanently delete Test from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
       
        $test = Test::onlyTrashed()->findOrFail($id);
        $test->forceDelete();

        return redirect()->route('test.index');
    }
}
