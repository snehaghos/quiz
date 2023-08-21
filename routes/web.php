<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
//use App\Http\Controllers\UserquizController;
use App\Http\Controllers\UserQuizController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */
Route::group(['middleware' => 'prevent-back-history'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();
//quizsection

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/question/create', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/question/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/question/update/{id}', [QuestionController::class, 'update'])->name('question.update');
    Route::get('/question/delete/{id}', [QuestionController::class, 'destroy'])->name('question.delete');

    Route::get('/question/search/{subject_id}', [QuestionController::class, 'start_quiz_search'])->name('start_quiz_search');

//gameplay
    Route::get('/gameplay', [UserQuizController::class, 'index'])->name('gameplay.index')->middleware('auth');
    Route::get('/gameplay/{id}', [UserQuizController::class, 'index'])->name('gameplay.index')->middleware('auth');
    Route::post('/gameplay/store/{id}', [UserQuizController::class, 'store'])->name('gameplay.store');
    Route::get('/gameplay/gameover/{id}', [UserQuizController::class, 'over'])->name('gameplay.gameover');

//subject
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subject/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subject', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::post('/subject/update/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::get('/subject/delete/{id}', [SubjectController::class, 'destroy'])->name('subject.delete');

//after starting quiz
    Route::get('startquiz', [UserQuizController::class, 'start_quiz'])->name('start_quiz');

});
