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
        
         <div class="menu_area">
            @foreach($arm_menus as $arm_menu)
                <div class="menu_list">
                  <div class="titlebar">
                      <div class="title">
                         <a href="/menu/{$arm_menu -> id}">{{ $arm_menu -> title }}</p>
                      </div>
                      <ul class="keyword">
                        @foreach($arm_menu -> keyword as $keyword )
                          <li>{{ $keyword }}</li>
                        @endforeach
                      </ul>
                   </div>
                      <div class="method">
                         <p>{{ $arm_menu -> method }}</p>
                      </div>
                </div>
            @endforeach
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