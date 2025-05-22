<?php


use App\Http\Controllers\BookController;

use Illuminate\Support\Facades\Route;


Route::get('/index',[BookController::class,'index'])->name('index');
Route::middleware(['auth:sanctum','role:admin'])->group(function(){
    Route::post('/store',[BookController::class,'store'])->name('store');;
    Route::patch('/update/{id}',[BookController::class,'update'])->name('update');;
    Route::delete('/delete',[BookController::class,'delete'])->name('delete');; 
});




