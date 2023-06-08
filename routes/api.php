<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group([
    "middleware" => ['auth:sanctum']
], function(){

    Route::post('logout',[App\Http\Controllers\Api\AuthController::class,'logout']);
    Route::get('get-users',[\App\Http\Controllers\Api\HomeController::class,'index']);
    Route::patch('change-block/{id}',[\App\Http\Controllers\Api\HomeController::class,'changeBlockInAccount']);

});

Route::post('register',[App\Http\Controllers\Api\AuthController::class,'register']);
Route::post('login',[App\Http\Controllers\Api\AuthController::class,'login']);

