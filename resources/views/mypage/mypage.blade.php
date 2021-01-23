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
                     <a href="/"><i class="fas fa-home"></i>Reha-Net</a> 
                     › <i>{{ Auth::user()->name }}さんのマイページ</i> 
                 </div>
             </div>
             <div class="contents-wraps">
               <div class="content-wrap">
                   <div class='user-name'>
                      <p>{{ Auth::user()->name }}さん のマイページ</p>
                   </div>
                   <div class="user-nav-list">
                      <ul class="user-nav-bar">
                          <li class="user-nav">
                            <a class="user-nav-link" href=""><span class="user-nav-name">トップ</span></a>
                          </li>
                          <li class="user-nav">|</li>
                          <li class="user-nav">
                             <a class="user-nav-link" href="/mypage/{{ $user -> id }}/posted_menu"><span class="user-nav-name">投稿したメニュー</span></a>
                          </li>
                          <li class="user-nav">|</li>
                          <li class="user-nav">
                             <a class="user-nav-link" href="/mypage/{{ $user -> id }}/favorite"><span class="user-nav-name">お気に入り登録済み</span></a>
                          </li>
                       </ul>
                   </div>
               </div>
             </div>
             <div class="profile_top_area">
                  <div class="profile_top_title">
                    <p>｜登録情報｜</p>
                  </div>
                  <div class="user_register_information">
                      <div class="information_area">
                           <div class="icon_area">
                               <div class="icon_title">
                                   <p>プロフィール画像</p>
                               </div>
                               <div class="user_email">
                                   <p>{{ Auth::user()->email }}</p>
                               </div>
                           </div>
                           <div class="user_name_area">
                               <div class="user_name_title">
                                   <p>ユーザー名</p>
                               </div>
                               <div class="user_name">
                                   <p>{{ Auth::user()->name }}</p>
                               </div>
                           </div>
                           <div class="user_email_area">
                               <div class="user_email_title">
                                   <p>メールアドレス</p>
                               </div>
                               <div class="user_email">
                                   <p>{{ Auth::user()->email }}</p>
                               </div>
                           </div>
                       </div>  
                  </div>
                  <div class="menu_area_title">
                    <p>｜登録情報を変更する｜</p>
                  </div>
                  <form method="post">
                    @csrf
                      <div class="user_register_information">
                          <div class="information_area">
                               <div class="user_name_area">
                                   <div class="user_name_title">
                                       <p>新しいユーザー名</p>
                                   </div>
                                   <div class="user_name">
                                       <input type="text" name="name">
                                   </div>
                               </div>
                               <div class="user_email_area">
                                   <div class="user_email_title">
                                       <p>新しいメールアドレス</p>
                                   </div>
                                   <div class="user_email">
                                        <input type="text" name="email">
                                   </div>
                               </div>
                               <div class="user_password_area">
                                   <div class="user_password_title">
                                       <p>新しいパスワード</p>
                                   </div>
                                   <div class="user_password">
                                       <input type="text" name="password">
                                   </div>
                               </div>
                               <div class="submit_area">
                                  <div class="change_submit">
                                    <input type="submit" value="変更">
                                  </div>
                               </div>
                           </div>  
                      </div>
                   </form>
                   
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