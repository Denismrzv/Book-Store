<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Payment\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['web','auth:sanctum'])->get('/user', function (Request $request) {
    return response()->json(['фыв']);
});




Route::controller(BookController::class)->group(function(){
    Route::get('/index','index');
    Route::post('/store','store');
    Route::patch('/update/{id}','update');
    Route::delete('/delete','destroy');
})->middleware(['role:admin','auth:sanctum']);




// Route::get('/login', function () {
//     return response()->json(['message' => 'Login page placeholder']);
// })->name('login');




Route::middleware('auth:sanctum')->group(function()
{
    Route::post('/buy/{book}',[PaymentController::class,'checkout']);
});







