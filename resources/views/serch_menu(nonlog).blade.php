<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- script -->
        <script src="https://kit.fontawesome.com/94583bb1d4.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!-- css -->
        <link href="{{ asset('css/top.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="responsive.css" />

        <style>
          html {
    height: 100%;
    width:100%;
}

body {
    height : 100%;   
    margin : 0;
}

a {
    text-decoration:none;
}
    
a:link {
    color:#000000;
}
    
a:visited {
    color:#000000;
}


ul {
    list-style: none;
}

.container {
    max-width: 1170px;
    width: 80%;
    margin: 0 auto;
    padding: 50px 0;
}




/* header
--------------------*/
header {
    height: 180px;
    width: 100%;
}

.header-left {
    margin-left: 50px; 
    float: left;
}

.header-left img {
    width: 250px;
}


/* navi
--------------------*/

nav {
    height: 15px;
    margin: 80px auto 0 auto;
    position: relative;
}

nav ul {
    margin-left: auto;
    float: right;
}

nav li {
    margin-right: 50px;
    opacity: 0.6;
    font-weight: bold;
    float: left;
}

nav li:hover {
    opacity: 1;
}

#navi {
    display: none;
}


/* contents
--------------------*/

.contents {
    margin-top: 50px;
    display:flex;
}

.contents h1 {
    text-align: center;
    color:#4F4B4B;
    font-size: 30px;
    font-family: 'Gurmukhi MN',sans-serif;
}



/* contents(メニュー一覧)
--------------------*/
.menu_area{
    width:70%;
    display:inline-block;
    
}

.menu_list{
    text-align: center;
    border-top: medium solid gray;
    box-sizing: border-box;
    font-family: 'メイリオ', 'Meiryo', 'ＭＳ ゴシック','Hiragino Kaku Gothic ProN','ヒラギノ角ゴ ProN W3',sans-serif;
}

.titlebar{
    border-bottom: thin solid gray;
    display:flex;
}

.title{}

.title a{
    color:blue;
    font-size:18px;
}

.keyword{
    display:flex;
}

.keyword li{
    margin: 4px 8px 4px 0;
    padding: 3px 16px;
    border: solid 1px lightgray;
    border-radius: 4px;
    box-shadow: 0 0 4px lightgrey;
    color: #424242;
    font-size: 14px;
    white-space: nowrap;
    cursor: pointer;
}


footer {
    width: 80%;
    margin: 0 auto;
}
  
footer img {
    width: 125px;
}

footer p {
    color: #b3aeb5;
    font-size: 12px;
}
        </style>
    </head>

     <body>
        <!-- header -->
        <!-- header -->
        <header>
            <div class="container" id="top">
                <div class="header-left">
                    <div class="header-left">
                        <p>Reha-Net</p>
                      </div>
                </div>
            
        <!-- navi -->
                <nav class="flex-center position-ref full-height">
                   @if (Route::has('login'))
                   <ul class="top-right links">
                       @auth
                           <li><a href="{{ url('/home') }}" class="js-smooth-scroll">{{ Auth::user()->name }}</a></li>
                       @else
                           <li><a href="{{ route('login') }}" class="js-smooth-scroll">ログイン</a></li>
                           @if (Route::has('register'))
                               <li><a href="{{ route('register') }}" class="js-smooth-scroll">新規登録</a></li>
                           @endif
                       @endauth
                   </ul>
                    @endif
                </nav>
        <!-- hamburger -->
                <div id="navi">
                        <ul>
                            <li><a href="#about" class="js-smooth-scroll">About</a></li>
                            <li><a href="#vision" class="js-smooth-scroll">Vison</a></li>
                            <li><a href="#contact" class="js-smooth-scroll">Contact</a></li>
                        </ul>
                </div>
                <div id="hamburger">
                    <span class="inner_line" id="line1"></span>
                    <span class="inner_line" id="line2"></span>   
                    <span class="inner_line" id="line3"></span>           
                </div>
        </header>



        <!-- container -->
        <div class="warapper">
             <div class="directory">
                 <div class="directory-list">
                     <a href="/"><i class="fas fa-home"></i>Reha-Net</a> 
                     › <a href="/">全てのメニュー</a> 
                     › <span>{{ $serch_menu }}　に関するメニュー</span>
                 </div>
             </div>

             <div class="searched_result">
                  <div class="searched_heading-box__result">
                     <span class="">"{{ $serch_menu }}"　に関するメニュー</span>
                     <span class="">25件</span>
                  </div>
             </div>

             <div class="shop-paginate">
                  <ul class="pagination pagination">
                      


                  </ul>
             </div>

             <div class="menu_area">
                @if(isset($serch_menus))
                   @foreach($serch_menus as $serch_menu)
                       <div class="menu_list">
                            <div class="titlebar">
                                <div class="title">
                                   <a href="/nolog/menu/{{ $serch_menu -> id }}">{{ $serch_menu -> title }}</p>
                                </div>
                                <ul class="keyword">
                                  @foreach($serch_menu -> keyword as $keyword )
                                    <li>{{ $keyword }}</li>
                                  @endforeach
                                </ul>
                             </div>
                             <div class="method">
                                <p>{{ $serch_menu -> method }}</p>
                             </div>
                       </div>
                   @endforeach
                @else
                  <p>まだ"{{ $serch_menu }}"に関するメニューの投稿がありません</p>
                @endif
                   
             </div>
        
        </div>
        
        <div class="page_top">
            <a href="#top" class="js-smooth-scroll"></a>
        </div>

        <!-- footer -->
        <footer>
            <div class="footer-list">
              <a href="#">TOPへ</a>
              <p>&copy;2020 Hidetaka Yamasaki  Profile</p>
            </div>
        </footer>


        <script src="main.js"></script>
    </body>
</html>