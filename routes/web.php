<?php

use Illuminate\Support\Facades\Route;


Route::group([

],function (){
    Route::get('login',[\App\Http\Controllers\Site\AuthController::class,'getLogin'])->name('auth.getLogin');
    Route::get('register',[\App\Http\Controllers\Site\AuthController::class,'getRegister'])->name('auth.getRegister');

    Route::post('login',[\App\Http\Controllers\Site\AuthController::class,'login'])->name('auth.login');
    Route::post('register',[\App\Http\Controllers\Site\AuthController::class,'register'])->name('auth.register');

});


Route::group([
    'middleware' => 'auth',
],function (){

    Route::get('/',[\App\Http\Controllers\Site\HomeController::class,'index'])->name('site.home');
    Route::get('change-block-account/{id}',[\App\Http\Controllers\Site\HomeController::class,'changeBlockInAccount'])
        ->name('site.change.block');
    Route::get('logout', [\App\Http\Controllers\Site\AuthController::class,'logout'])->name('site.logout');

});