<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// NOTICE: Not all the routes are logical and would exist in a real Laravel project
// Some routes are just for the purpose of replicating some testing scenario

Route::get('users', [UserController::class, 'index']);
Route::get('users/active', [UserController::class, 'only_active']);
Route::get('users/{userId}', [UserController::class, 'show']);
Route::get('users/check/{name}/{email}', [UserController::class, 'check_create']);
Route::get('users/check_update/{name}/{email}', [UserController::class, 'check_update']);
Route::delete('users', [UserController::class, 'destroy']);

Route::post('projects', [ProjectController::class, 'store']);
Route::post('projects/stats', [ProjectController::class, 'store_with_stats']);
Route::post('projects/mass_update', [ProjectController::class, 'mass_update']);
Route::delete('projects/{projectId}', [ProjectController::class, 'destroy']);
