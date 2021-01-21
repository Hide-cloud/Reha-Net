<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //テーブル名
    protected $table = 'favorites';

    //可変項目(変わる項目)
    protected $fillable =
    [
        'user_id', 'menu_id'
    ]; 


    ////Userクラスとリレーション定義
    //public function users()
    //{
    //   return $this->belongsToMany(User::class);
    //}
//
    ////Menuクラスとリレーション定義
    //public function menus()
    //{
    //   return $this->belongsToMany(Menu::class);
    //}
}
