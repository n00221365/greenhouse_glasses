<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AnswerController as AdminAnswerController;
use App\Http\Controllers\User\AnswerController as UserAnswerController;
use App\Http\Controllers\Admin\QuestionController as AdminQuestionController;
use App\Http\Controllers\User\QuestionController as UserQuestionController;
use App\Http\Controllers\Admin\FiguresController as AdminFiguresController;
use App\Http\Controllers\User\FiguresController as UserFiguresController;
use App\Http\Controllers\Admin\ScoreController as AdminScoreController;
use App\Http\Controllers\User\ScoreController as UserScoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Admin/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::resource('/user/answers', UserAnswerController::class)
            ->middleware(['auth'])
            ->names('User.answers')
            ->only(['index', 'show' ]);
Route::resource('/Admin/answers', AdminAnswerController::class)->middleware(['auth', 'role:Admin'])
->names('Admin.answers');
Route::post('Admin/answers/{answer}', [AdminAnswerController::class, 'update'])->middleware(['auth', 'role:Admin'])->name('answers.update');


Route::resource('/user/questions', UserQuestionController::class)
            ->middleware(['auth'])
            ->names('user.questions')
            ->only(['index', 'show' ]);
Route::resource('/Admin/questions', AdminQuestionController::class)->middleware(['auth', 'role:Admin'])
->names('Admin.questions');
Route::post('Admin/questions/{question}', [AdminQuestionController::class, 'update'])->middleware(['auth', 'role:Admin'])->name('questions.update');

Route::resource('/user/figures', UserFiguresController::class)
            ->middleware(['auth'])
            ->names('user.figures')
            ->only(['index', 'show' ]);
Route::resource('/Admin/figures', AdminFiguresController::class)->middleware(['auth', 'role:Admin'])
->names('Admin.figures');
Route::post('Admin/figures/{figures}', [AdminFiguresController::class, 'update'])->middleware(['auth', 'role:Admin'])->name('figures.update');


Route::resource('/user/scores', UserScoreController::class)
            ->middleware(['auth'])
            ->names('user.scores')
            ->only(['index', 'show' ]);
Route::resource('/Admin/scores', AdminScoreController::class)->middleware(['auth', 'role:Admin'])
->names('Admin.scores');
Route::post('Admin/scores/{score}', [AdminScoreController::class, 'update'])->middleware(['auth', 'role:Admin'])->name('scores.update');
});
require __DIR__.'/auth.php';