<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Course;
use App\Lesson;
use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLessonsRequest;
use App\Http\Requests\Admin\UpdateLessonsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Optix\Media\MediaUploader;

class LessonsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = 'Lessons'; 

        $lessons = Lesson::where('classes_id', Classes::where(['school_id' => school_id()])->pluck('id'));
        //dd($lessons->title);
        if ($request->input('classes_id')) {
            $lessons = $lessons->where('classes_id', $request->input('classes_id'));
        }
        if (request('show_deleted') == 1) {
            
            $lessons = $lessons->onlyTrashed()->get();
        } else {
            $lessons = $lessons->get();
        }

        return view('backend.'.Auth::user()->role.'.lessons.lessons.index', compact('lessons', 'title'));
    }

    /**
     * Show the form for creating new Lesson.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = translate('create_lesson');
        
        $courses = \App\Classes::where(['school_id' => school_id()])->get()->pluck('name', 'id')->prepend('Please select', '');
        //dd($courses);

        return view('backend.'.Auth::user()->role.'.lessons.lessons.create', compact('courses', 'title'));
    }

    /**
     * Store a newly created Lesson in storage.
     *
     * @param  \App\Http\Requests\StoreLessonsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonsRequest $request)
    {
        $slug = $request->title;
        $slugb = str_slug($slug);

        $section = $request->section_id;
        //dd($request->input('downloadable_files_id', []));

        $request = $this->saveFiles($request);
        $lesson = Lesson::create($request->all()
            + ['position' => Lesson::where('classes_id', $request->classes_id)->max('position') + 1] + ['slug' => $slugb] + ['section_id' => 8]);

        foreach ($request->input('downloadable_files_id', []) as $index => $id) {
            $media = MediaUploader::fromFile($id)->upload();
            $media->save();
        }
        dd($lesson);

        return redirect()->route('lessons.index', ['lesson' => $lesson->id]);
    }


    /**
     * Show the form for editing Lesson.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Update Lesson';
        $courses = \App\Classes::where(['school_id' => school_id()])->get()->pluck('name', 'id')->prepend('Please select', '');

        $lesson = Lesson::findOrFail($id);

        return view('backend.'.Auth::user()->role.'.lessons.lessons.edit', compact('lesson', 'courses', 'title'));
    }

    /**
     * Update Lesson in storage.
     *
     * @param  \App\Http\Requests\UpdateLessonsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonsRequest $request, $id)
    {
        
        $request = $this->saveFiles($request);
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());

        //dd($lesson);

        $media = [];
        dd($request->input('downloadable_files_id'));
        foreach ($request->input('downloadable_files_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $lesson->id;
            $file->save();
            $media[] = $file;
        }
        //dd($lesson->updateMedia($media, 'downloadable_files'));

        return redirect()->route('lessons.index', ['course_id' => $request->course_id]);
    }


    /**
     * Display Lesson.
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $courses = \App\Course::get()->pluck('title', 'id')->prepend('Please select', '');$tests = \App\Test::where('lesson_id', $id)->get();

        $lesson = Lesson::findOrFail($id);
        $title = $lesson->title;
        //dd($lesson->getMedia('downloadable_files'));

        return view('backend.'.Auth::user()->role.'.lessons.lessons.show', compact('lesson', 'tests', 'title'));
    }


    /**
     * Remove Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();

        return redirect()->route('lessons.index');
    }

    /**
     * Delete all selected Lesson at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
       
        if ($request->input('ids')) {
            $entries = Lesson::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        
        $lesson = Lesson::onlyTrashed()->findOrFail($id);
        $lesson->restore();

        return redirect()->route('lessons.index');
    }

    /**
     * Permanently delete Lesson from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        
        $lesson = Lesson::onlyTrashed()->findOrFail($id);
        $lesson->forceDelete();

        return redirect()->route('lessons.index');
    }
}
