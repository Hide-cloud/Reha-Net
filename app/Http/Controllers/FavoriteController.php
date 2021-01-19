<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;
use App\Favorite;

class FavoriteController extends Controller
{
    //お気に入り登録
    public function register_favorite(Request $request,$id){

        $favorite = $request->all();
        Favorite::create($favorite);
        
        $menu =Menu::find($id);

        //投稿者情報を取得
        $contributor = Menu::find($id)->user->name;
        //お気に入り登録済みかどうかを確認するため
        $favorite = Favorite::where('menu_id',$id)->first();

        //withメソッドで値をviewへ返す
        return view('menu_detail',['menu' => $menu],['favorite' => $favorite])->with('contributor',$contributor);
    }
}
