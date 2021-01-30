<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use App\Favorite;
use Auth;

class MenuController extends Controller
{
    //投稿メニューをDBに登録し、投稿完了画面へ(Youtubeバージョン)
    public function post_menu(Request $request){
        
        // validation ここから追加
         $validatedData = $request->validate([
             'title' => ['required'],
             'disease' => ['required'],
             'keyword' => ['required'],
             'method' => ['required'],
             'youtube_url' => ['required']
         ]);

        //メニューをテーブルに追加
        $menuPost = $request->all();
        Menu::create($menuPost);

        return view('posted');
   }

    //投稿メニューをDBに登録し、投稿完了画面へ(自作動画バージョン)
    public function post_menu_myvideo(Request $request){
        
        // validation ここから追加
        $validatedData = $request->validate([
            'title' => ['required'],
            'disease' => ['required'],
            'keyword' => ['required'],
            'method' => ['required'],
            'video_path' => ['required']
        ]);

        //video_path値に名前をつける
        $menu_video = $request->file('video_path')->hashName();

        if(isset($request->video_path)){
        //storeAsでpublic/menu_videoディレクトリに$menu_videoという名前で画像を格納
        $request->file('video_path')->storeAs('public/menu_video',$menu_video);
        //$request->file('video_path')->store('public/menu_video');
        }

        //メニューをテーブルに追加
        $menuPost = $request->all();
        $menu_record=Menu::create($menuPost);

        //Menuテーブルのvideo_pathカラムの値を$menu_videoに変更する
        $menu_record->video_path= $menu_video;
        $menu_record->save();

        return view('posted');
   }


   //おすすめメニュー検索して一覧表示へ
   public function serch_recomend($id){

    $goal=Auth::user()->goal;
    $disease=Auth::user()->disease;
    $serch_menus = Menu::where('title', 'like', "%$goal%")->orWhere('disease',"$disease")->paginate(10);
    
    //件数をカウント
    $serch_menus_count = Menu::where('title', 'like', "%$goal%")->orWhere('disease',"$disease")->count();

    return view('recomend',['serch_menus' => $serch_menus])->with('serch_menus_count',$serch_menus_count);
   }


   //メニュー検索して一覧表示へ
    public function serch(Request $request_menu){
        $serch_menu =$request_menu->serch_menu;
        //pagenation付き
        $serch_menus = Menu::where('title', 'like', "%$serch_menu%")->orWhere('keyword', "$serch_menu")->paginate(10);
        
        //件数をカウント
        $serch_menus_count = Menu::where('title', 'like', "%$serch_menu%")->orWhere('keyword', "$serch_menu")->count();
        
        return view('serch_menu',['serch_menus' => $serch_menus],['serch_menu' => $serch_menu])->with('serch_menus_count',$serch_menus_count);
    }

    //メニュー検索して一覧表示へ(nonlog)
    public function serch_nonlog(Request $request_menu){
        
        $serch_menu =$request_menu->serch_menu;
        //pagenation付き
        $serch_menus = Menu::where('title', 'like', "%$serch_menu%")->orWhere('keyword', "$serch_menu")->paginate(10);
        
        //件数をカウント
        $serch_menus_count = Menu::where('title', 'like', "%$serch_menu%")->orWhere('keyword', "$serch_menu")->count();
        
        return view('serch_menu(nonlog)',['serch_menus' => $serch_menus],['serch_menu' => $serch_menu])->with('serch_menus_count',$serch_menus_count);
    }

    //メニュー詳細画面へ(nonlog)
    public function show_menu_detail_nonlog($id){
        $menu =Menu::find($id);

        //投稿者情報を取得
        $contributor = Menu::find($id)->user->name;
        //withメソッドで値をviewへ返す
        return view('menu_detail_nonlog',['menu' => $menu])->with('contributor',$contributor);
    }


    //メニュー詳細画面へ
    public function show_menu_detail($id){
        $menu =Menu::find($id);

        //投稿者情報を取得
        $contributor_name = Menu::find($id)->user->name;
        $contributor_id = Menu::find($id)->user->id;

        //お気に入りテーブルから持ってくる(登録済みの場合も未登録の場合も)
        $favorite = Favorite::where('menu_id',$id)->where('user_id',Auth::user()->id)->first();

        //withメソッドで値をviewへ返す
        return view('menu_detail',['menu' => $menu],['favorite' => $favorite])->with('contributor_name',$contributor_name)->with('contributor_id',$contributor_id);
    }
}
