<?php


// Doctor Routes
use \App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth','role:Doctor'],'prefix'=>'doctor','name'=>'doctor','as'=>'doctor.'],function (){
//    Route::get('dashboard/',function (){
//        return view('doctor.dashboard');
//    })->name('dashboard');
    Route::resource('/',UserController::class);
    Route::get('doctor_profile/',[UserController::class,'doctor_profile'])->name('profile');



});


