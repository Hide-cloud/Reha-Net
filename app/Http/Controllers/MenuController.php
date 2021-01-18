<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Menu;

class MenuController extends Controller
{

    //投稿メニューをDBに登録し、投稿完了画面へ
    public function post_menu(Request $request){

        $menuPost = $request->all();
        Menu::create($menuPost);
        
        return view('posted');
   }

   ////メニュー(上肢)検索して表示へ
   //public function serch_arm(){
   // $arm_menus = Menu::where('title', 'like', '%肩甲骨%')
   // ->orWhere('keyword', '上肢')
   // ->get();
//
   // //$user_name = Post::find($id)->user->name;
   // //withメソッドで値をviewへ返す
   // //return view('post.comment',['post' => $post],['comments' => $comments])->with('user_name',$user_name);
   // 
   // return view('menu.arm',['arm_menus' => $arm_menus]);
   // }


   //メニュー検索して一覧表示へ
    public function serch(Request $request_menu){
        $serch_menu =$request_menu->serch_menu;
        $serch_menus = Menu::where('title', 'like', "%$serch_menu%")->orWhere('keyword', "$serch_menu")->get();
        
        return view('serch_menu',['serch_menus' => $serch_menus],['serch_menu' => $serch_menu]);
    }

    //メニュー詳細して一覧表示へ
    public function show_menu_detail($id){
        $menu =Menu::find($id);
        
        return view('menu_detail',['menu' => $menu]);
    }
}
