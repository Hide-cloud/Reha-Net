<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

        <!-- script -->
        <script src="https://kit.fontawesome.com/94583bb1d4.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <!-- css -->
        <link href="{{ asset('css/mypage/start_menu.css') }}" rel="stylesheet">

        
    </head>

     <body>
        <!-- header -->
        <header>
            <!-- navi -->
            <nav class="headerarea">

                <ul class="header-left">
                   <!-- Authentication Links -->
                    <li>
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Reha_Net</a>
                    </li>
                </ul>


                <ul class="header-right">
                   <!-- Authentication Links -->
                    <li>
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/post_menu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>メニューを作る</a>
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
        </header>



        <!-- container -->
        <div class="warapper">
             <div class="directory">
                 <div class="directory-list">
                     <a href="{{ route('home') }}"><i class="fas fa-home"></i>Reha-Net</a> 
                     › <a href="/mypage/{{ Auth::user()->id }}">マイページ</a>
                     › <a href="/">マイメニュー</a> 
                 </div>
             </div>
        </div>


        <div class="title_wrapper">
           <div class="title_contents">
               <div class="title_area">
                    <div class="start_title">
                        <p>{{ Auth::user()->name }}さんのリハビリメニュー</p>
                    </div>
               </div>
           </div>
        </div>

             
       <!-- container -->
        <div class="container">
          <div class="menu_flex">
            <div class="mymenu_area">
              @if(isset($mymenus))
                @foreach( $mymenus as $mymenu )
                  <div class="mymenu">
                    <div class="mymenu_contents">
                        <div class="title">
                           <a href="/mypage/favorite_menu/{{ $mymenu -> favorite_menu_id }}">{{ $mymenu -> title }}</a>
                        </div>

                        <div class="method">
                          <div class="keyword">
                             <p class="key">方法：</p>
                             <p class="method_contents">{{ $mymenu -> method }}</p>
                          </div>
                        </div>
                    </div>
                  </div>
                @endforeach
              @elseif(!isset($mymenus))
                  <div class="notmymenu">
                      <div class="notmymenu_contents">
                          <p>まだマイメニューに登録していません</p>
                      </div>
                  </div>
              @endif
            <div>
          </div>
        </div>
        
        

        <!-- footer -->
        <footer>
            <div class="footer-list">
              <a href="#">TOPへ</a>
              <p>&copy;Reha-Net</p>
            </div>
        </footer>


        <script src="main.js"></script>
    </body>
</html>