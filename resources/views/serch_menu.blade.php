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
        <link href="{{ asset('css/.css') }}" rel="stylesheet">
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

.warapper{
    text-align: center
}

.directory-list{
    font-size:13px;
}

.directory-list a{
    color:blue;
}


.searched_result{
    margin:30px;
}

.result_title{
    font-size:25px;
    font-weight:bold;
}

.result_count{
    margin-left:20px;
}

/* contents(メニュー一覧)
--------------------*/
.menu_area{
    width:70%;
    display:inline-block;
    
}

.menu_list{
    border-top: medium solid gray;
    box-sizing: border-box;
    font-family: 'メイリオ', 'Meiryo', 'ＭＳ ゴシック','Hiragino Kaku Gothic ProN','ヒラギノ角ゴ ProN W3',sans-serif;
}

.titlebar{
    vertical-align: middle;
    border-bottom: thin solid gray;
    display:flex;
    align-items:center;
}

.title{
    margin: 4px 8px 4px 8px;
}

.title a{
    color:blue;
    font-size:18px;
    
}

.keyword{
    display:flex;
}

.key{
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

.keycutbar{
    margin: 4px 8px 4px 0;
}

.method_contents{
    margin: 4px 8px 4px 0;
    background-color:oldlace;
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
        <header>
            <div class="container" id="top">
                <div class="header-left">
                    <div class="header-left">
                        <p>Reha-Net</p>
                      </div>
                </div>
                
                <!-- navi -->
                <nav class="flex-center position-ref full-height">

                  <ul class="top-right links">
                     <!-- Authentication Links -->
                      <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>メニューを探す</a>
                      </li>
                      <li>
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/mypage/{{ Auth::user()->id }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>マイページへ</a>
                      </li>
                      <li>
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                          </div>
                      </li>
                  </ul>

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
                     <span class="result_title">"{{ $serch_menu }}"　に関するメニュー</span>
                     <span class="result_count">25件</span>
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
                                   <a href="/menu/{{ $serch_menu -> id }}">{{ $serch_menu -> title }}</a>
                                </div>
                                <ul class="keyword">
                                    <li class="key">キーワード：</li>
                                  @foreach($serch_menu -> keyword as $keyword )
                                    <li class="key">{{ $keyword }}</li>
                                    <li class="keycutbar">/</li>
                                  @endforeach
                                </ul>
                             </div>
                             <div class="method">
                               <ul class="keyword">
                                  <li class="key">方法：</li>
                                  <li class="method_contents">{{ $serch_menu -> method }}</li>
                               </ul>
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