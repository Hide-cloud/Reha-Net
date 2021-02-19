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

//ゲストログイン
Route::get('/login/guest', 'Auth\LoginController@guestLogin');

//ホームページへ遷移
Route::get('/home', 'HomeController@index')->name('home');


//ホームページからメニュー検索
Route::post('/home', 'MenuController@serch')->name('serch');

//ホームページからおすすめメニュー検索
Route::get('/recomend/{id}', 'MenuController@serch_recomend')->name('serch_recomend');

//メニュー詳細ページへ遷移
Route::get('/menu/{id}', 'MenuController@show_menu_detail')->name('show_detail');

//メニュー詳細ページからお気に入り登録
Route::post('/menu/{id}', 'FavoriteController@register_favorite')->name('favorite');

//メニュー詳細ページへ遷移(nonlog)
Route::get('/nonlog/menu/{id}', 'MenuController@show_menu_detail_nonlog')->name('show_detail_nonlog');


//メニュー詳細ページから投稿者個別ページへ遷移
Route::get('/userprofile/{id}', 'HomeController@show_userprofile')->name('show_userprofile');

//投稿者個別ページから投稿一覧へ遷移
Route::get('/userprofile/{id}/posted_menu', 'HomeController@show_userprofile_postedMenu')->name('show_userprofile_postedMenu');


//Route::prefix('therapist')->group(function(){
//    Auth::routes();
//});
Route::prefix('therapist')->namespace('Therapist')->name('therapist.')->group(function(){
    Auth::routes();

    Route::get('/home', 'TherapistHomeController@index')->name('therapist_home');
});

//メニュー作成ページを表示(youtubeバージョン)
Route::get('/post_menu', 'HomeController@show_post_menu')->name('show_post_menu');

//メニュー作成ページを表示(自作動画バージョン)
Route::get('/post_menu/myvideo', 'HomeController@show_post_menu_myvideo')->name('show_post_menu_myvideo');

//メニューを作成(youtubeバージョン)
Route::post('/post_menu', 'MenuController@post_menu')->name('post_menu');

//メニューを作成(自作動画バージョン)
Route::post('/post_menu/myvideo', 'MenuController@post_menu_myvideo')->name('post_menu_myvideo');


//マイページを表示(登録情報)
Route::get('/mypage/{id}', 'HomeController@show_mypage')->name('show_mypage');

//登録情報を変更
Route::post('/mypage/{id}', 'HomeController@account_edit')->name('edit');

//マイページ(投稿したメニュー)を表示
Route::get('/mypage/{id}/posted_menu', 'HomeController@show_mypage_postedMenu')->name('show_mypage_postedMenu');

//投稿したメニュを削除する
Route::post('/mypage/{id}/posted_menu', 'HomeController@delete_menu')->name('delete_menu');

//マイページ(お気に入り)を表示
Route::get('/mypage/{id}/favorite', 'HomeController@show_mypage_favorite')->name('show_mypage_favorite');

//マイページ(目標設定)を表示
Route::get('/mypage/{id}/set_goal', 'HomeController@set_goal')->name('set_goal');

//目標を変更する
Route::post('/mypage/{id}/set_goal', 'HomeController@change_goal')->name('change_goal');

//マイページ(お気に入り)からお気に入り削除する
Route::post('/mypage/{id}/favorite', 'HomeController@delete_favorite')->name('delete_favorite');

//マイページ(お気に入り)詳細ページを表示
Route::get('/mypage/favorite_menu/{id}', 'HomeController@favorite_menu_datail')->name('favorite_menu_datail');

//マイページ(お気に入り)詳細ページからマイメニューに登録
Route::post('/mypage/favorite_menu/{id}', 'MymenuController@register_mymenu')->name('register_mymenu');


//リハビリスタートページへ遷移
Route::get('/mypage/mymenu/{id}', 'MymenuController@start_mymenu')->name('start_mymenu');

