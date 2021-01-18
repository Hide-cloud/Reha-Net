<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    //マイページへ
    public function index()
    {
        return view('home');
    }

    //メニュー投稿ページへ
    public function show_post_menu()
    {
        return view('post_menu');
    }

}
