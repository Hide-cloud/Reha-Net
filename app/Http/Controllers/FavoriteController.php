<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use App\Favorite;
use Auth;

class FavoriteController extends Controller
{
    //お気に入り登録
    //public function register_favorite(Request $request,$id){
//
    //    $favorite = $request->all();
    //    Favorite::create($favorite);
    //    
    //    $menu =Menu::find($id);
//
    //    //投稿者情報を取得
    //    $contributor = Menu::find($id)->user->name;
    //    //お気に入り登録済みかどうかを確認するため
    //    $favorite = Favorite::where('menu_id',$id)->first();
//
    //    //withメソッドで値をviewへ返す
    //    return view('menu_detail',['menu' => $menu],['favorite' => $favorite])->with('contributor',$contributor);
    //}


    //お気に入り登録
    public function register_favorite(Request $request){

        $favorite_register = $request->all();
        //お気に入りテーブルにすでに登録済みか確認するための定義
        $favorite_judgment = Favorite::where('menu_id',$request->menu_id)->where('user_id',$request->user_id)->first();
        
        //お気に入りテーブルにすでに存在する場合は削除する
        if(isset($favorite_judgment)){
            //Favorite::destroy($favorite_judgment);
            //Favorite::destroy(where('menu_id',$request->menu_id)->where('user_id',$request->user_id));
            Favorite::where('menu_id',$request->menu_id)->where('user_id',$request->user_id)->delete();
        }
        //お気に入りテーブルにすでに存在しない場合は登録する
        elseif(!isset($favorite_judgment)){
            Favorite::create($favorite_register);
        };

        //お気に入りテーブルから持ってくる(登録済みの場合も未登録の場合も)
        $favorite=Favorite::where('menu_id',$request->menu_id)->where('user_id',Auth::user()->id)->first();

        $menu =Menu::find($request->menu_id);

        //投稿者情報を取得
        $contributor = Menu::find($request->menu_id)->user->name;

        //withメソッドで値をviewへ返す
        return view('menu_detail',['menu' => $menu],['favorite' => $favorite])->with('contributor',$contributor);
    }

}
