<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::post('/register',[RegisterController::class,'register']);
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout',function(){
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
});

    Route::get('/adminPanel',function(){
        $books = Book::all();
        return view('adminPanel',compact('books'));
    })->name('adminPanel');


    Route::get('/',[BookController::class,'index'])->name('index');
    Route::get('/show/{book}',[BookController::class,'show'])->name('show');
    
Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::post('/store',[BookController::class,'store'])->name('store');
    Route::patch('/update/{id}',[BookController::class,'update'])->name('update');
    Route::delete('/delete',[BookController::class,'delete'])->name('delete');
});
