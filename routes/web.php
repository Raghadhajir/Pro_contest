<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\SolveController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ContestController;
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

\Illuminate\Support\Facades\Auth::routes(['register' => false]);


// Custom Auth
Route::get('/login',[LoginController::class,'show_login_form'])->name('login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/register',[LoginController::class,'show_signup_form'])->name('register');
Route::post('/register',[LoginController::class,'process_signup']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');



//Auth::routes();

Route::get('/test', [UserController::class, 'index'])->name('Admin-Panel');
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('404');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/all_problem',[ProblemController::class, 'index'])->name('all_problem');

Route::get('/create_problems', [ProblemController::class, 'create'])->name('add_problem');
Route::post('/create_problems', [ProblemController::class, 'store'])->name('store_problem');
Route::get('/create_problems/{id}', [ProblemController::class, 'download'])->name('problem.download');



Route::get('/solves', [SolveController::class, 'index'])->name('all_solve');
Route::get('/solves/{solve}', [SolveController::class, 'show'])->name('one_solve');
Route::post('/solves/{solve}/update-status', [SolveController::class, 'updateStatus'])->name('solves.updateStatus');
Route::delete('/solves/{solve}', [SolveController::class, 'destroy'])->name('solves.destroy');
Route::get('/home/chart', [UserController::class, 'index'])->name('home_chart');

Route::get('/date', [ContestController::class, 'index'])->name('all_date');
Route::get('/date/create', [ContestController::class, 'create'])->name('add_date');
Route::post('/date/create', [ContestController::class, 'store'])->name('contests.store');
Route::get('/contests', [ContestController::class, 'index'])->name('all_date');