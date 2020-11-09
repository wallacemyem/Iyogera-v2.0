<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Lesson;
use App\Question;
use App\QuestionsOption;
use App\TestsResult;
use App\Http\Requests\Admin\StoreLessonsRequest;
use App\Http\Requests\Admin\UpdateLessonsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Optix\Media\MediaUploader;
use App\Http\Request as AppRequest;
use App\Http\Resources\Lesson as LessonResource;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lesson = Lesson::all();

        return LessonResource::collection($lesson)
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
        $slug = $request->input('title');
        $slugb = str_slug($slug);

        $section = $request->input('section_id');
        //dd($request->input('downloadable_files_id', []));

        //$request = $this->saveFiles($request);
        $lesson = $request->isMethod('put') ? Lesson::findorFail($request->id) : Lesson::create($request->all()
            + ['position' => Lesson::where('classes_id', $request->classes_id)->max('position') + 1] + ['slug' => $slugb] + ['section_id' => $section]);

        foreach ($request->input('downloadable_files_id', []) as $index => $id) {
            $media = MediaUploader::fromFile($id)->upload();
            $media->save();
        }
        return new LessonResource($lesson);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return new LessonResource($lesson);
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
        //
    }
}
