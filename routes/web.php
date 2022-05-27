<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\second\SecondController;
use App\Http\Controllers\SocialControoler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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
Route::get('redirect/{service}',[SocialControoler::class,'redirect']);
Route::get('callback/{service}',[SocialControoler::class,'callback']);

Route::get('fillable',[CrudController::class,'getoffer']);

Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){
    // Route::get('store',[CrudController::class,'store']);
    Route::group(['prefix'=>'offers' ],function(){
        Route::get('create',[CrudController::class,'create']);
          
        Route::post('store',[CrudController::class,'store'])->name('offers.store');
        Route::get('all',[CrudController::class,'getAlls'])->name('offer.all');
    }); 

});
