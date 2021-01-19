<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //テーブル名
    protected $table = 'menus';

    //可変項目(変わる項目)
    protected $fillable =
    [
        'user_id', 'title', 'keyword', 'item', 'method', 'youtube_url'
    ]; 

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];


    protected $casts = [
        'keyword' => 'array',
    ];

    
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    //Menuモデルからuserを唱えるとユーザーにアクセスできる
    public function user(){
        return $this->belongsTo(User::class);
    }
}
