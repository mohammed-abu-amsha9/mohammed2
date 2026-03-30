<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\testController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [StudentController::class, 'login']);
Route::post('student_login', [StudentController::class, 'student_login']);
