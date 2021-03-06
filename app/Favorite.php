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
        'user_id', 'menu_id','title', 'disease', 'keyword', 'item', 'method', 'youtube_url'
    ]; 


    protected $casts = [
        'disease' => 'array',
        'keyword' => 'array',
    ];


    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    
    public function menus()
    {
        return $this->belongsTo(Menu::class);
    }
}
