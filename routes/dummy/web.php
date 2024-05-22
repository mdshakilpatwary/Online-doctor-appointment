<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::group(['middleware'=>'guest',],function (){
////    Route::get('login/',function (){
////        return view('auth.login');
////    })->name('login');
//
//});

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::get('test/', function () {
//    return 'Test Route';
//})->name('test');

Route::get('test/',function (){
    return view('pages.test');
})->name('test');

//================================================ App routes

Route::get('/',function (){
    $data = ['home'=>'active',];
    return view('pages.index',$data);
})->name('home');

Route::get('doctor&counselor/',function (){
    $data = ['doctor_counselor'=>'active',];
    return view('pages.doctor_counselor',$data);
})->name('doctor_counselor');

Route::get('community-forum/',function (){
    $data = ['community'=>'active',];
    return view('pages.community',$data);
})->name('community');

Route::get('about-us/',function (){
    $data = ['about'=>'active',];
    return view('pages.about',$data);
})->name('about');

Route::get('contact-us/',function (){
    $data = ['contact'=>'active',];
    return view('pages.contact',$data);
})->name('contact');

Route::post('message/',[\App\Http\Controllers\ContactUsController::class,'store'])->name('send_query');
//
//Route::get('admin-template/',function (){
//    return view('layouts.admin.app');
//});



// error page route ..
Route::get('error404/',function (){
   return view('error.error.php');
})->name('error404');
//================================================ App routes

//Route::get('user/',[UserController::class, 'index']);
//Route::post('user/',[UserController::class, 'store'])->name('userstore');


//Route::resource('user/',UserController::class)->names('user')->except('index');
//Route::delete('user/{id}',[UserController::class, 'delete'])->name('user.delete');
// edit route access in view
// {{route('user.edit',['id'=>$id])}}
// {{route('user.delete',['id'=>$id])}}
// {{route('user.update',['id'=>$id])}}


// External Routes
require __DIR__.'/patient.php';
require __DIR__.'/doctor.php';
require __DIR__.'/counselor.php';
require __DIR__.'/admin.php';

