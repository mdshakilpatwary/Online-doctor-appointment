<?php

use App\Http\Controllers\CounselorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'counselor','name'=>'counselor','as'=>'counselor.'],function (){
    Route::resource('profile',UserController::class);

    Route::get('/dashboard/',[CounselorController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[CounselorController::class,'show_profile'])->name('profile');
    Route::get('/profile_view/fillup_form/',[CounselorController::class,'counselor_profile_wizard_step'])->name('counselor_form');
    Route::post('/profile_view/fillup_form/delete_education',[UserController::class,'delete_education'])->name('delete_education');
    Route::post('/profile_view/fillup_form/delete_training/',[UserController::class,'delete_training'])->name('delete_training');
    Route::post('/profile_view/fillup_form/delete_experience/',[UserController::class,'delete_experience'])->name('delete_experience');

    // change_email
    Route::post('/change_email/',[UserController::class,'change_email'])->name('change_email');




    // request_for_verification
    Route::post('/request_for_verification/',[CounselorController::class,'request_for_verification'])->name('request_for_verification');


    // community forum
    Route::resource('community',PostController::class);
    Route::post('/community/post/comment/',[PostController::class,'store_comment'])->name('store_comment');

});
