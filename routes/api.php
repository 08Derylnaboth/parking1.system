<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\UsersController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//  Route::post(url:'/auth/register',[RegisterController::class,'register']);

// Route::post(url:'/auth/token',[LoginController::class,'token']);

// Route::middleware(['auth:sanctum'])->group(function(){
//     Route::get(url:'me',[UsersController::class,'me']);
// });

// Route::middleware(['internal'])->group(function(){
//     Route::get(url:'garages',[GarageController::class,'index']);
//     Route::get(url:'garages/{garage}/spots',[SpotController::class,'index']);

// });