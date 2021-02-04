<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use App\Menu;
use App\Favorite;
use App\Mymenu;
use Auth;
use Validator;

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

    //homeページへ
    public function index()
    {
        //件数をカウント(上肢)
        $arm_menus_count = Menu::where('title', 'like', "%上肢%")->orWhere('keyword', "上肢")->count();
        //件数をカウント(下肢)
        $leg_menus_count = Menu::where('title', 'like', "%下肢%")->orWhere('keyword', "下肢")->count();
        //件数をカウント(体幹)
        $trunk_menus_count = Menu::where('title', 'like', "%体幹%")->orWhere('keyword', "体幹")->count();
        //件数をカウント(手指)
        $finger_menus_count = Menu::where('title', 'like', "%手指%")->orWhere('keyword', "手指")->count();
        //件数をカウント(発声)
        $voice_menus_count = Menu::where('title', 'like', "%発声%")->orWhere('keyword', "発声")->count();
        //件数をカウント(食事)
        $eat_menus_count = Menu::where('title', 'like', "%食事%")->orWhere('keyword', "食事")->count();
        //件数をカウント(歩行)
        $walk_menus_count = Menu::where('title', 'like', "%歩行%")->orWhere('keyword', "歩行")->count();
        //件数をカウント(洗体)
        $wash_menus_count = Menu::where('title', 'like', "%洗体%")->orWhere('keyword', "洗体")->count();
        //件数をカウント(階段)
        $stairs_menus_count = Menu::where('title', 'like', "%階段%")->orWhere('keyword', "階段")->count();
        //件数をカウント(仕事)
        $work_menus_count = Menu::where('title', 'like', "%仕事%")->orWhere('keyword', "仕事")->count();

        return view('home')->with('arm_menus_count',$arm_menus_count)->with('leg_menus_count',$leg_menus_count)->with('trunk_menus_count',$trunk_menus_count)->with('finger_menus_count',$finger_menus_count)->with('voice_menus_count',$voice_menus_count)->with('eat_menus_count',$eat_menus_count)->with('walk_menus_count',$walk_menus_count)->with('wash_menus_count',$wash_menus_count)->with('stairs_menus_count',$stairs_menus_count)->with('work_menus_count',$work_menus_count);
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


    //登録情報を変更
    public function account_edit(Request $request)
    {

        // validation ここから追加
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','string', 'min:8']
        ]);

        User::where('id',$request->id )
          ->update(['name' => $request->name],['email' => $request->email],['password' => $request->password]);
        

        //変更完了画面へ
        return view('mypage.edited');
    }

    

    //マイページ(投稿したメニュー一覧)へ
    public function show_mypage_postedMenu($id)
    {

        $user =User::find($id);

        //投稿者情報を取得
        $posted_menus = Menu::where('user_id',$id)->get();

        return view('mypage.posted_menu',['user' => $user],['posted_menus' => $posted_menus]);
    }


    //投稿したメニューを削除する
    public function delete_menu(Request $request){
        
        //メニューを削除
        Menu::where('id',$request->menu_id)->where('user_id',$request->user_id)->delete();

        $id=Auth::user()->id;
        $user =User::find($id);

        //投稿者情報を取得
        $posted_menus = Menu::where('user_id',$id)->get();

        return view('mypage.posted_menu',['user' => $user],['posted_menus' => $posted_menus]);
    }


    //マイページ(お気に入り)へ
    public function show_mypage_favorite($id)
    {

        $user =User::find($id);
        $favorite_menus=Favorite::where('user_id',$id)->get();
    
        return view('mypage.favorite',['user' => $user],['favorite_menus' => $favorite_menus]);
    }

    //マイページ(お気に入り)からお気に入り削除する
    public function delete_favorite(Request $request)
    {
        //お気に入り削除
        Favorite::where('id',$request->menu_id)->where('user_id',$request->user_id)->delete();

        $id=Auth::user()->id;
        $user =User::find($id);
        $favorite_menus=Favorite::where('user_id',$id)->get();
    
        return view('mypage.favorite',['user' => $user],['favorite_menus' => $favorite_menus]);
    }


    //マイページ(お気に入り)から個別メニュー設定詳細ページへ
    public function favorite_menu_datail($id)
    {

        $menu =Favorite::find($id);

        //お気に入りテーブルから持ってくる(登録済みの場合も未登録の場合も)
        //$favorite = Favorite::where('menu_id',$id)->where('user_id',Auth::user()->id)->first();

        $mymenu =Mymenu::where('favorite_menu_id',$id)->where('user_id',Auth::user()->id)->first();

        //withメソッドで値をviewへ返す
        return view('mypage.favorite_detail',['menu' => $menu],['mymenu' => $mymenu]);
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


    //マイページ(目標設定ページ)へ
    public function set_goal($id)
    {

        $user =User::find($id);
    
        return view('mypage.set_goal',['user' => $user]);
    }

    //目標を変更
    public function change_goal(Request $request)
    {
        if(isset($request->goal) && isset($request->disease)){
            User::where('id',$request->user_id )
            ->update(['goal' => $request->goal],['disease' => $request->disease]);
        }
        elseif(isset($request->goal) && !isset($request->disease)){
            User::where('id',$request->user_id )
            ->update(['goal' => $request->goal]); 
        }
        elseif(!isset($request->goal) && isset($request->disease)){
            User::where('id',$request->user_id )
            ->update(['disease' => $request->disease]); 
        }
          $user =User::find($request->user_id);

        //変更完了画面へ
        return view('mypage.set_goal',['user' => $user]);
    }
}
