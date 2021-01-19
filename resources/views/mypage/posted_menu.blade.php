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
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/post_menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>メニューを作る</a>
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
        
        </header>


        <!-- container -->
        <div class="warapper">
             <div class="directory">
                 <div class="directory-list">
                     <a href="/"><i class="fas fa-home"></i>Reha-Net</a> 
                     › <i>{{ $user -> name }}さんのマイページ</i> 
                 </div>
             </div>
             <div class="">
               <div class="content-wrap">
                   <div class='user-name'>
                      <p>{{ $user -> name }}さん のマイページ</p>
                   </div>
                   <ul class="user-nav-bar">
                       <li class="user-nav first-nav">
                         <a class="user-nav-link" href="/mypage/{{ $user -> id }}"><span class="user-nav-name">トップ</span></a>
                       </li>
                       <li class="user-nav">
                          <a class="user-nav-link" href="/mypage/{{ $user -> id }}/posted_menu"><span class="user-nav-name">投稿したメニュー</span></a>
                       </li>
                       <li class="user-nav">
                          <a class="user-nav-link" href="/mypage/{{ $user -> id }}/favorite"><span class="user-nav-name">お気に入り登録済み</span></a>
                       </li>
                       <li class="user-nav">
                          <a class="user-nav-link" href=""><span class="user-nav-name">編集</span></a>
                       </li>
                    </ul>
               </div>
             </div>
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