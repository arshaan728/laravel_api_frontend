<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\studentscontroller;

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

Route::get('students',[studentscontroller::class,'index']);

Route::post('students',[studentscontroller::class,'store']);

Route::get('students/{id}',[studentscontroller::class,'show']);

Route::get('students/{id}/edit',[studentscontroller::class,'edit']);

Route::put('students/{id}/edit',[studentscontroller::class,'update']);

Route::delete('students/{id}/delete',[studentscontroller::class,'delete']);

Route::get('students/search/{key}',[studentscontroller::class,'search']);