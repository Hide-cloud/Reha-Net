<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use App\Favorite;
use App\Mymenu;
use Auth;

class MymenuController extends Controller
{
    //マイメニューに入り登録
    public function register_mymenu(Request $request){

        $mymenu_register = $request->all();
        //マイメニューテーブルにすでに登録済みか確認するための定義
        $mymenu_judgment = Mymenu::where('favorite_menu_id',$request->favorite_menu_id)->where('user_id',$request->user_id)->first();
        
        //マイメニューテーブルにすでに存在する場合は削除する
        if(isset($mymenu_judgment)){
            //Favorite::destroy($favorite_judgment);
            //Favorite::destroy(where('menu_id',$request->menu_id)->where('user_id',$request->user_id));
            Mymenu::where('favorite_menu_id',$request->favorite_menu_id)->where('user_id',$request->user_id)->delete();
        }
        //マイメニューテーブルにすでに存在しない場合は登録する
        elseif(!isset($mymenu_judgment)){
            Mymenu::create($mymenu_register);
        };

        //マイメニューテーブルから持ってくる(登録済みの場合も未登録の場合も)
        $menu=Favorite::where('id',$request->favorite_menu_id)->where('user_id',Auth::user()->id)->first();

        $mymenu =Mymenu::where('favorite_menu_id',$request->favorite_menu_id)->where('user_id',Auth::user()->id)->first();
        

        //withメソッドで値をviewへ返す
        return view('mypage.favorite_detail',['menu' => $menu],['mymenu' => $mymenu]);
    }



    //マイメニューに入り登録
    public function start_mymenu($id){

        $mymenus =Mymenu::where('user_id',$id)->get();

        //withメソッドで値をviewへ返す
        return view('mypage.start_menu',['mymenus' => $mymenus]);
    }

}
