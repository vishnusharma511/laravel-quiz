<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Models\Quiz\UserSubjectAssignResult;
use App\Http\Controllers\Quiz\QuestionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $subjectsAssign = UserSubjectAssignResult::with('subject')->where('user_id',auth()->user()->id)->get();
    return view('dashboard',compact('subjectsAssign'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/quiz/{subjectId}', [QuestionController::class, 'quizPage'])->name('quiz.show');
    Route::post('/quiz/{subjectId}', [QuestionController::class, 'submitQuiz'])->name('quiz.submit');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
