<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DoctorController;
use App\Http\Controllers\PostController;

Route::group(['prefix'=>'doctor','name'=>'doctor','as'=>'doctor.'],function (){
    Route::resource('profile',UserController::class);


    Route::get('/dashboard/',[DoctorController::class,'show_dashboard'])->name('dashboard');
    Route::get('/profile_view/',[DoctorController::class,'show_profile'])->name('profile');
    Route::get('/profile_view/fillup_form/',[DoctorController::class,'doctor_profile_wizard_step'])->name('doctor_form');
    Route::post('/profile_view/fillup_form/delete_education',[UserController::class,'delete_education'])->name('delete_education');
    Route::post('/profile_view/fillup_form/delete_training/',[UserController::class,'delete_training'])->name('delete_training');
    Route::post('/profile_view/fillup_form/delete_experience/',[UserController::class,'delete_experience'])->name('delete_experience');


    // doctor set pateint schedule route start 
    Route::get('/doctor/schedule/',[DoctorController::class,'doctorSchedule'])->name('schedule');
    Route::post('/doctor/department/add',[DoctorController::class,'doctorDepartmentAdd'])->name('department.add');
    Route::post('/doctor/schedule/add',[DoctorController::class,'doctorScheduleAdd'])->name('schedule.add');
    Route::get('/doctor/schedule/manage',[DoctorController::class,'doctorScheduleManage'])->name('schedule.manage');
    Route::get('/doctor/schedule/status/{id}',[DoctorController::class,'changestatus'])->name('schedule.status');
    Route::get('/doctor/schedule/edit/{id}',[DoctorController::class,'doctorScheduleEdit'])->name('schedule.edit');
    Route::post('/doctor/schedule/update/{id}',[DoctorController::class,'doctorScheduleUpdate'])->name('schedule.update');
    Route::get('/doctor/schedule/delete/{id}',[DoctorController::class,'doctorScheduleDelete'])->name('schedule.delete');

    // doctor and pateint same route
    Route::post('/patient/appointment/update/{id}',[PatientController::class,'patientAppointmentUpdate'])->name('patient_appointment.update');
    Route::get('/patient/appointment/view/{id}',[DoctorController::class,'patientAppointmentView'])->name('patient_appointment.view');
    Route::get('/patient/appointment/delete/{id}',[DoctorController::class,'patientAppointmentDelete'])->name('patient_appointment.delete');
    Route::get('/patient/appointment/edit/{id}',[PatientController::class,'patientAppointmentEdit'])->name('patient_appointment.edit');  
    // doctor and pateint same route  

    // change_email
    Route::post('/change_email/',[UserController::class,'change_email'])->name('change_email');

    // request_for_verification
    Route::post('/request_for_verification/',[DoctorController::class,'request_for_verification'])->name('request_for_verification');


    // community forum
    Route::resource('community',PostController::class);
    Route::post('/community/post/comment/',[PostController::class,'store_comment'])->name('store_comment');
    // Route::get('/community_forum/',[PostController::class,'show_community_forum'])->name('community_forum');
    // Route::post('/create-post/',[DoctorController::class,'create_post'])->name('create_post');



});
