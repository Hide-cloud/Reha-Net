<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mymenu extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //テーブル名
    protected $table = 'mymenus';

    //可変項目(変わる項目)
    protected $fillable =
    [
        'user_id', 'favorite_menu_id','title', 'disease', 'keyword', 'item', 'method', 'youtube_url'
    ]; 


    protected $casts = [
        'disease' => 'array',
        'keyword' => 'array',
    ];


}
