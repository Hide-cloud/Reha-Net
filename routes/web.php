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

//ホームページへ遷移
Route::get('/home', 'HomeController@index')->name('home');


//ホームページからメニュー検索
Route::post('/home', 'MenuController@serch')->name('serch');

//メニュー詳細ページへ遷移
Route::get('/menu/{id}', 'MenuController@show_menu_detail')->name('show_detail');


//Route::prefix('therapist')->group(function(){
//    Auth::routes();
//});
Route::prefix('therapist')->namespace('Therapist')->name('therapist.')->group(function(){
    Auth::routes();

    Route::get('/home', 'TherapistHomeController@index')->name('therapist_home');
});

//メニュー作成ページを表示
Route::get('/post_menu', 'HomeController@show_post_menu')->name('show_post_menu');

//メニューを作成
Route::post('/post_menu', 'MenuController@post_menu')->name('post_menu');



//メニューを検索(上肢)
Route::get('/menu/serch_arm', 'MenuController@serch_arm')->name('serch_arm');

//メニューを検索(下肢)
Route::get('/menu/serch_leg', 'MenuController@serch_leg')->name('serch_leg');

//メニューを検索(体幹)
Route::get('/menu/serch_trunk', 'MenuController@serch_trunk')->name('serch_trunk');

//メニューを検索(手指)
Route::get('/menu/serch_finger', 'MenuController@serch_finger')->name('serch_finger');

//メニューを検索(発声)
Route::get('/menu/serch_vocalization', 'MenuController@serch_vocalization')->name('serch_vocalization');

//メニューを検索(食事)
Route::get('/menu/serch_eat', 'MenuController@serch_eat')->name('serch_eat');

//メニューを検索(歩行)
Route::get('/menu/serch_walk', 'MenuController@serch_walk')->name('serch_walk');

//メニューを検索(洗体)
Route::get('/menu/serch_wash', 'MenuController@serch_wash')->name('serch_wash');

//メニューを検索(階段)
Route::get('/menu/serch_stairs', 'MenuController@serch_stairs')->name('serch_stairs');

//メニューを検索(仕事)
Route::get('/menu/serch_work', 'MenuController@serch_work')->name('serch_work');