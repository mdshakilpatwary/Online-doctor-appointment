<?php


// Doctor Routes
use App\Http\Controllers\UserController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['auth','role:Patient'],'prefix'=>'patient','name'=>'patient','as'=>'patient.'],function (){
//    Route::get('profile/',[HomeController::class, 'index'])->name('dashboard');
    Route::resource('/','UserController');
//    Route::resources('/',UserController::class);
    Route::get('profile/',[PatientController::class,'show_profile'])->name('profile');
//    Route::get('edit_profile/',[PatientController::class, 'edit_view'])->name('edit_profile');
//    Route::post('update/',[PatientController::class, 'update_profile'])->name('update_profile');
//    Route::resource('profile',PatientController::class);

//    Route::resource('info',PatientController::class);

});


//Route::resource('user/',UserController::class)->names('user')->except('index');
//Route::delete('user/{id}',[UserController::class, 'delete'])->name('user.delete');
