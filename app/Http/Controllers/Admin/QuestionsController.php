<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreQuestionsRequest;
use App\Http\Requests\Admin\UpdateQuestionsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class QuestionsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        if (request('show_deleted') == 1) {
            
            $questions = Question::onlyTrashed()->get();
        } else {
            $questions = Question::all();
        }

        return view('backend.'.Auth::user()->role.'.lessons.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating new Question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tests = \App\Test::get()->pluck('title', 'id');
        return view('backend.'.Auth::user()->role.'.lessons.questions.create', compact('tests'));
    }

    /**
     * Store a newly created Question in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {
        
        $request = $this->saveFiles($request);
        $question = Question::create($request->all());
        $question->tests()->sync(array_filter((array)$request->input('tests')));

        for ($q=1; $q <= 4; $q++) {
            $option = $request->input('option_text_' . $q, '');
            if ($option != '') {
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option_text' => $option,
                    'correct' => $request->input('correct_' . $q)
                ]);
            }
        }

        return redirect()->route('questions.index');
    }


    /**
     * Show the form for editing Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $question = Question::findOrFail($id);
        $tests = \App\Test::get()->pluck('title', 'id');

        return view('backend.'.Auth::user()->role.'.lessons.questions.edit', compact('question', 'tests'));
    }

    /**
     * Update Question in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionsRequest $request, $id)
    {
        
        $request = $this->saveFiles($request);
        $question = Question::findOrFail($id);
        $question->update($request->all());
        $question->tests()->sync(array_filter((array)$request->input('tests')));



        return redirect()->route('questions.index');
    }


    /**
     * Display Question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $questions_options = \App\QuestionsOption::where('question_id', $id)->get();$tests = \App\Test::whereHas('questions',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $question = Question::findOrFail($id);
        return view('backend.'.Auth::user()->role.'.lessons.questions.show', compact('question', 'questions_options', 'tests'));
    }


    /**
     * Remove Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index');
    }

    /**
     * Delete all selected Question at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        
        if ($request->input('ids')) {
            $entries = Question::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        
        $question = Question::onlyTrashed()->findOrFail($id);
        $question->restore();

        return redirect()->route('questions.index');
    }

    /**
     * Permanently delete Question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        
        $question = Question::onlyTrashed()->findOrFail($id);
        $question->forceDelete();

        return redirect()->route('questions.index');
    }
}
