<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Menu;
use App\Favorite;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //マイページへ
    public function index()
    {
        return view('home');
    }

    //メニュー投稿ページへ
    public function show_post_menu()
    {
        return view('post_menu');
    }

    //マイページへ
    public function show_mypage($id)
    {

        $user =User::find($id);

        //投稿者情報を取得
        $posted_menus = Menu::where('user_id',$id)->get();
        //お気に入り登録済みかどうかを確認するため
        $favorites = Favorite::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('mypage.mypage',['user' => $user],['favorites' => $favorites],['posted_menus' => $posted_menus]);
    }

    //マイページ(投稿したメニュー)へ
    public function show_mypage_postedMenu($id)
    {

        $user =User::find($id);

        //投稿者情報を取得
        $posted_menus = Menu::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('mypage.posted_menu',['user' => $user],['posted_menus' => $posted_menus]);
    }

    //マイページ(お気に入り)へ
    public function show_mypage_favorite($id)
    {

        $user =User::find($id);

        //お気に入り登録済みかどうかを確認するため
        $favorites = Favorite::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('mypage.favorite',['user' => $user],['favorites' => $favorites]);
    }

}
