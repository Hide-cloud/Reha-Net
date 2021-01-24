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

    //メニュー投稿ページへ(自作動画バージョン)
    public function show_post_menu_myvideo()
    {
        return view('post_menu_myvideo');
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

    //マイページ(投稿したメニュー一覧)へ
    public function show_mypage_postedMenu($id)
    {

        $user =User::find($id);

        //投稿者情報を取得
        $posted_menus = Menu::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('mypage.posted_menu',['user' => $user],['posted_menus' => $posted_menus]);
    }

    ////マイページ(お気に入り)へ
    //public function show_mypage_favorite($id)
    //{
//
    //    $user =User::find($id);
//
    //    ////お気に入り登録済みかどうかを確認するため
    //    //$favorite_menu = Favorite::where('user_id',$id)->menus->get();
////
    //    $favorite_menu = User::find($id)->menus;
////
    //    ////withメソッドで値をviewへ返す
    //    return view('mypage.favorite',['user' => $user])->with(['favorite_menu' => $favorite_menu]);
    //}

    //マイページ(お気に入り)へ
    public function show_mypage_favorite($id)
    {

        $user =User::find($id);
        $favorite_menus=Favorite::where('user_id',$id)->get();
    
        return view('mypage.favorite',['user' => $user],['favorite_menus' => $favorite_menus]);
    }




    //メニュー詳細ページから投稿者個別ページへ
    public function show_userprofile($id)
    {
        //ユーザー情報を取得
        $user = User::find($id);

        //投稿を取得
        $posted_menus = Menu::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('userprofile.userprofile',['user' => $user],['posted_menus' => $posted_menus]);
    }


    //投稿者個別ページから投稿したメニュー一覧へ
    public function show_userprofile_postedMenu($id)
    {

        $user =User::find($id);

        //投稿者情報を取得
        $posted_menus = Menu::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('userprofile.posted',['user' => $user],['posted_menus' => $posted_menus]);
    }
}
