<?php

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

Auth::routes();

//マイページへ遷移
Route::get('/home', 'HomeController@index')->name('home');

//Route::prefix('therapist')->group(function(){
//    Auth::routes();
//});
Route::prefix('therapist')->namespace('Therapist')->name('therapist.')->group(function(){
    Auth::routes();

    Route::get('/home', 'TherapistHomeController@index')->name('therapist_home');
});
