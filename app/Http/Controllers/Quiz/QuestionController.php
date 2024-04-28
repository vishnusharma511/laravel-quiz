<?php

namespace App\Http\Controllers\Quiz;

use Illuminate\View\View;
use App\Models\Quiz\Answer;
use App\Models\Quiz\Option;
use App\Models\Quiz\Subject;
use Illuminate\Http\Request;
use App\Models\Quiz\Question;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Models\Quiz\UserSubjectAssignResult;

class QuestionController extends Controller
{
    public function quizPage(Request $request, $subjectId): View
    {
        $user = $request->user();
        $subjectAssignResult = UserSubjectAssignResult::where('user_id', $user->id)
            ->where('subject_id', $subjectId)
            ->firstOrFail();


        if($subjectAssignResult->result != null || $subjectAssignResult->result != ''){
            return view('quiz.assessment-done');
        }

        Gate::authorize('view', $subjectAssignResult);

        $subject = Subject::findOrFail($subjectId);
        $questions = Question::where('subject_id', $subjectId)->with('options')->get();

        return view('quiz.questions', compact('questions', 'subject'));
    }



    public function submitQuiz(Request $request, $subjectId)
    {
        $rules = [
            'answers.*' => 'required|exists:options,id',
        ];

        $messages = [
            'answers.*.required' => 'The answer for all questions is required.',
            'answers.*.exists' => 'The selected answer for one or more questions does not exist.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $correctCount = 0;
        $wrongCount = 0;
        foreach ($request->answers as $questionId => $selectedOptionId) {
            $correctOptionId = Option::where('question_id', $questionId)->where('is_correct', true)->value('id');

            if ($selectedOptionId == $correctOptionId) {
                $correctCount++;
            } else {
                $wrongCount++;
            }

            Answer::create([
                'subject_id' => $subjectId,
                'question_id' => $questionId,
                'option_id' => $selectedOptionId,
                'is_correct' => ($selectedOptionId == $correctOptionId ),
                'user_id' => auth()->id()
            ]);
        }

        $userSubjectAssignResult = UserSubjectAssignResult::where('user_id', auth()->id())
            ->where('subject_id', $subjectId)
            ->first();

        if ($userSubjectAssignResult) {
            $userSubjectAssignResult->result = $correctCount;
            $userSubjectAssignResult->save();
        }

        return view('quiz.thankyou', compact('correctCount', 'wrongCount'));
    }
}
