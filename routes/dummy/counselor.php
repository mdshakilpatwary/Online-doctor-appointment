<?php

use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth','role:Counselor'],'prefix'=>'counselor','name'=>'counselor','as'=>'counselor.'],function (){
    //    Route::get('profile/',[HomeController::class, 'index'])->name('dashboard');
    Route::resource('dashboard/',UserController::class);

});
