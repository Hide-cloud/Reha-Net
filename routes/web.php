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

//トップページからメニュー検索(nonlog)
Route::post('/', 'MenuController@serch_nonlog')->name('serch_nonlog');

Auth::routes();

//ホームページへ遷移
Route::get('/home', 'HomeController@index')->name('home');


//ホームページからメニュー検索
Route::post('/home', 'MenuController@serch')->name('serch');


//メニュー詳細ページへ遷移
Route::get('/menu/{id}', 'MenuController@show_menu_detail')->name('show_detail');

//メニュー詳細ページからお気に入り登録
Route::post('/menu/{id}', 'FavoriteController@register_favorite')->name('favorite');

//メニュー詳細ページへ遷移(nonlog)
Route::get('/nonlog/menu/{id}', 'MenuController@show_menu_detail_nonlog')->name('show_detail_nonlog');

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


//マイページを表示
Route::get('/mypage/{id}', 'HomeController@show_mypage')->name('show_mypage');

//マイページ(投稿したメニュー)を表示
Route::get('/mypage/{id}/posted_menu', 'HomeController@show_mypage_postedMenu')->name('show_mypage_postedMenu');

//マイページ(お気に入り)を表示
Route::get('/mypage/{id}/favorite', 'HomeController@show_mypage_favorite')->name('show_mypage_favorite');