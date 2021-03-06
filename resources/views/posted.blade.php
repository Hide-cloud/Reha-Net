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
        <link href="{{ asset('css/posted_menu.css') }}" rel="stylesheet">

        
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
        <div class="contents">
            <div class="area">
              <div class="container">
                  <h1>メニューを作成しました！</h1>
                  <div class="page_link">
                      <div class="serch">
                          <p><a href="{{ route('home') }}"><i class="fas fa-search"></i>メニュー検索へ</a></p>
                      </div>
                      <div class="post">
                          <p><a href="/post_menu"><i class="fas fa-pencil-alt"></i>メニュー作成へ</a></p>
                      </div>
                  </div>
               </div>
            </div>




            <!-- aside -->
            <div class="areas">
               <div class=titlebar>
                  <p>プロフィール</p>
               </div>
               <div class='user-info-containers'>
                  <div class="user_information">
                     <div class="user_name">
                         <h3>{{ Auth::user()->name }}　さん</h3>
                     </div>
                     <div class="user_profile_area">
                         <ul class="user_profile_list">
                           <li><a href="/mypage/{{ Auth::user()->id }}" class="btn btn-sky btn-block"><i class="fas fa-house-user"></i>マイページへ</a></li>
                           <li><a href="/mypage/mymenu/{{ Auth::user()->id }}" class="btn btn-sky btn-block"><i class="fas fa-running"></i>Let's リハビリ</a></li>
                           <li><a href="/mypage/{{ Auth::user()->id }}/favorite" class="btn btn-sky btn-block"><i class="far fa-star"></i>お気に入りメニュー</a></li>
                         </ul>
                     </div>
                  </div>
                  <div class="sign-up-area">
                     <div class='sign-up-boxs'>
                             <a class="link-btns" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>
                     </div>
                  </div>
               </div>
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