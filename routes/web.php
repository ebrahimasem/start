<?php

use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\second\SecondController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    

    return view('welcome');
});
$data = [''];
Route::get('index',[UserController::class,'getIndex']);

Route::get('users', function () {
    return'welcome users';
});
Route::get('user/{id}',function($id){
    return $id;
})->name('u');
Route::get('user2/{id?}',function(){
    return "welcome";
})->name('b');
Route::namespace('Front')->group(function(){

    Route::get('showuser',[UserController::class,'srhowUse']);
    
    
});
Route::group(['prefix'=>'now','middleware'=>'auth'],function(){
    Route::get('/',function(){
        return 'now avaliple';
    });
});
Route::get('login',function(){
    return "this is login";
})->name('login');

Route::get('soso',[SecondController::class,'showcontroll']);
Route::resource('new','App\Http\Controllers\NewsController');
Route::get('landing',[LandingController::class,'Landing']);
Route::get('about',function(){
    return view('about');
});




Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
