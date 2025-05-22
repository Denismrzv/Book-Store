<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/register',[RegisterController::class,'register']);
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout',function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
})->middleware('web');

Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::get('/index',[BookController::class,'index']);
    Route::get('/store',[BookController::class,'store']);
    Route::get('/update',[BookController::class,'update']);
    Route::get('/delete',[BookController::class,'delete']); 
});
