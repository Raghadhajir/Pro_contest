<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ContestController;
use App\Http\Controllers\Api\ProblemController;
use App\Http\Controllers\Api\SolveController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/DateContest', [ContestController::class, 'DateContest']);

});

// user
Route::middleware(['auth:sanctum', 'IsUser'])->group(function () {
    Route::post('/uploadsolve', [SolveController::class, 'uploadsolve']);
    Route::get('/userProfile', [UserController::class, 'userProfile']);
    Route::post('/edit-user-profile', [UserController::class, 'EditUserProfile']);
    Route::get('/getproblems', [ProblemController::class, 'getproblems']);
    Route::get('/problem/{id}', [ProblemController::class, 'problem']);
});

//coach
Route::middleware(['auth:sanctum', 'IsCoach'])->group(function () {
    Route::get('/coachProfile', [UserController::class, 'coachProfile']);
    Route::post('/edit-coach-profile', [UserController::class, 'EditCoachProfile']);
    Route::post('/register_contest', [TeamController::class, 'AddTeam']);
    Route::post('/edit-team', [TeamController::class, 'EditTeam']);
    Route::get('/delete-team/{id}', [TeamController::class, 'DeleteTeam']);
    Route::get('/coach-teams', [TeamController::class, 'coachteams']);

});

