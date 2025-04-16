<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\SpotController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//  Route::post(url:'/auth/register',[RegisterController::class,'register']);

// Route::post(url:'/auth/token',[LoginController::class,'token']);

// Route::middleware(['auth:sanctum'])->group(function(){
//     Route::get(url:'me',[UsersController::class,'me']);
//     Route::post(url:'reservations',[ReservationController::class,'store']);
//     Route::patch(url:'reservations/{reservation}',[ReservationController::class,'update']);
//     Route::delete(url:'reservations/{reservation}',[ReservationController::class,'destroy']);
//     Route::post(url:'/calculate-payment',action:PaymentController::class);

// });

// Route::middleware(['internal'])->group(function(){
//     Route::get(url:'garages',[GarageController::class,'index']);
//     Route::get(url:'garages/{garage}/spots',[SpotController::class,'index']);

// });