<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trainerController;
use App\Http\Controllers\memberController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::GET('/index', [trainerController::class , 'index']);

Route::GET('/indexM', [memberController::class , 'index']);

Route::POST('/store', [trainerController::class , 'store']);

Route::POST('/store', [memberController::class , 'store']);

Route::GET('/destroy/{id}', [trainerController::class , 'destroy']);

Route::GET('/destroy/{id}', [memberController::class , 'destroy']);

Route::PUT('/update/{id}', [trainerController::class , 'update']);

Route::PUT('/update/{id}', [memberController::class , 'update']);