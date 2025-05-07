<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
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

\Illuminate\Support\Facades\Auth::routes(['register' => false]);


// // Custom Auth
// Route::get('/login',[LoginController::class,'show_login_form'])->name('login');
// Route::post('/login',[LoginController::class,'login']);

// Route::get('/register',[LoginController::class,'show_signup_form'])->name('register');
// Route::post('/register',[LoginController::class,'process_signup']);

// Route::post('/logout',[LoginController::class,'logout'])->name('logout');

// User Login Routes
// Route::get('/login', [LoginController::class, 'show_login_form'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// \app\Http\Controllers\Admin\Auth\LoginController.php
// Admin Login Routes
// Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'show_login_form'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login']);
// });




//Auth::routes();

Route::get('/test', [DashboardController::class, 'index'])->middleware('admin')->name('Admin-Panel');
Route::get('/404', [DashboardController::class, 'notFound'])->name('404');
Route::get('/500', [DashboardController::class, 'serverError'])->name('404');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});

// Team Route

Route::get('/team/show', [TeamController::class, 'index'])->name('team');
// Route::get('/team/add', [TeamController::class, 'addTeam'])->name('team_add');
// Route::post('/team/add', [TeamController::class, 'teamAdd'])->name('add_team');
Route::get('/team/delete/{id}',[TeamController::class, 'delete'])->name('team_delete');


// Student Route

Route::get('/student/show', [UserController::class, 'showStudent'])->name('student');
Route::get('/student/add', [UserController::class, 'addStudent'])->name('student_add');
Route::post('/student/add', [UserController::class, 'studentAdd'])->name('add_student');
Route::get('/student/edit/{id}', [UserController::class, 'editStudent'])->name('student_edit');
Route::post('/student/edit/{id}', [UserController::class, 'studentEdit'])->name('edit_student');
Route::get('/student/delete/{id}',[UserController::class, 'studentDelete'])->name('student_delete');

// Course Route

// Route::get('/course/show', [CourseController::class, 'index'])->name('course');
// Route::get('/course/add', [CourseController::class, 'addCourse'])->name('course_add');
// Route::post('/course/add', [CourseController::class, 'courseAdd'])->name('add_course');
// Route::get('/course/delete/{id}',[CourseController::class, 'delete'])->name('course_delete');


// Coach Route

Route::get('/coach/show', [UserController::class, 'coachShow'])->name('coach');
Route::get('/coach/add', [UserController::class, 'addCoach'])->name('coach_add');
Route::post('/coach/add', [UserController::class, 'coachAdd'])->name('add_coach');
Route::get('/coach/edit/{id}', [UserController::class, 'editCoach'])->name('coach_edit');
Route::post('/coach/edit/{id}', [UserController::class, 'coachEdit'])->name('edit_coach');
Route::get('/coach/delete/{id}',[UserController::class, 'coachDelete'])->name('coach_delete');
