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
        <link href="{{ asset('css/posted.css') }}" rel="stylesheet">

        
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
                 <div class="row justify-content-center">
                     <div class="col-md-8">
                         <div class="card">
                             <div class="card-body">
                                 <h1 class="row justify-content-center">メニューを作成しました！</h1>
                                 <div class="row justify-content-center send-to">
                                     <p><a href="" class="send-link">
                                         <i class="fas fa-users big-icon-posts"></i><br>メニュー検索へ</a>
                                     </p>
                                     <p><a href="" class="send-link">
                                         <i class="fas fa-users big-icon-posts"></i><br>ブックマークリストを確認！</a>
                                     </p>
                                 </div>
                                 <div class="row justify-content-center send-to">
                                     <p><a href="/mypage/{{ Auth::user()->id }}" class="send-link">
                                         <i class="fas fa-user big-icon-posts"></i><br>マイページへ</a>
                                     </p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
            </div>
            </div>




            <!-- aside -->
            <div class="area">
               <div class='user-info-containers'>
                  <div class='top-containers'>
                     <h3>{{ Auth::user()->name }}さん</h3>
                     <p><a href="/myprofile/{{ Auth::user()->id }}" class="btn btn-sky btn-block">プロフィールへ</a></p>
                     <ul class='profile_list'>
                        <div class="btn-sidebar">
                            <li><a href="" class="btn btn-sky btn-block">フォロー一覧</a></li>
                            <li><a href="" class="btn btn-sky btn-block">Let's リハビリ</a></li>
                            <li><a href="" class="btn btn-sky btn-block">お気に入りメニュー</a></li>
                        </div>
                     </ul>
                     <div class='sign-up-box'>
                          <a class="link-btn" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>
                     </div>
                  </div>
               </div>
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