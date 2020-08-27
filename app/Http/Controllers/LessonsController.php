<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Question;
use App\QuestionsOption;
use App\TestsResult;
use Illuminate\Http\Request;
use App\Http\Resources\Lesson as LessonResource;

class LessonsController extends Controller
{

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return new LessonResource($lesson);
    }

    public function test($lesson_slug, Request $request)
    {
        $lesson = Lesson::where('slug', $lesson_slug)->firstOrFail();
        $answers = [];
        $test_score = 0;
        foreach ($request->get('questions') as $question_id => $answer_id) {
            $question = Question::find($question_id);
            $correct = QuestionsOption::where('question_id', $question_id)
                ->where('id', $answer_id)
                ->where('correct', 1)->count() > 0;
            $answers[] = [
                'question_id' => $question_id,
                'option_id' => $answer_id,
                'correct' => $correct
            ];
            if ($correct) {
                $test_score += $question->score;
            }
            /*
             * Save the answer
             * Check if it is correct and then add points
             * Save all test result and show the points
             */
        }
        $test_result = TestsResult::create([
            'test_id' => $lesson->test->id,
            'user_id' => \Auth::id(),
            'test_result' => $test_score
        ]);
        $test_result->answers()->createMany($answers);

        return redirect()->route('lessons.show', [$lesson->course_id, $lesson_slug])->with('message', 'Test score: ' . $test_score);
    }

}
