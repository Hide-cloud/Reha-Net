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
        <link href="{{ asset('css/mypage/mypage_tops.css') }}" rel="stylesheet">
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
                     <a href="{{ route('home') }}"><i class="fas fa-home"></i>Reha-Net</a> 
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
                             <a class="user-nav-link" href="/mypage/{{ Auth::user()->id }}"><span class="user-nav-name"><i class="far fa-star"></i>登録情報</span></a>
                          </li>
                          <li class="user-nav">|</li>
                          <li class="user-nav">
                            <a class="user-nav-link" href="/mypage/mymenu/{{ Auth::user()->id }}"><span class="user-nav-name"><i class="fas fa-running"></i>Let's リハビリ</span></a>
                          </li>
                          <li class="user-nav">|</li>
                          <li class="user-nav">
                             <a class="user-nav-link" href="/mypage/{{ Auth::user()->id }}/posted_menu"><span class="user-nav-name">投稿したメニュー</span></a>
                          </li>
                          <li class="user-nav">|</li>
                          <li class="user-nav">
                             <a class="user-nav-link" href="/mypage/{{ Auth::user()->id }}/favorite"><span class="user-nav-name"><i class="far fa-star"></i>お気に入り登録済み</span></a>
                          </li>
                       </ul>
                   </div>
               </div>
             </div>
             <div class="profile_top_area">
                 <div class="profile_top_left_area">
                        <div class="profile_top_title">
                          <p>｜目標｜</p>
                        </div>

                        <div class="profile_goal">
                        @if(isset( $user -> goal ))
                          <p>{{ $user -> goal }}</p>
                        @else
                          <p>まだ目標が登録されていません</p>
                        @endif
                        </div>

                        <div class="profile_top_title">
                          <p>｜疾患｜</p>
                        </div>

                        <div class="profile_disease">
                        @if(isset( $user -> disease ))
                          <ul class="disease_area">
                            @foreach($user -> disease as $key)
                              <li>{{ $key }}</li>
                            @endforeach
                          </ul>
                        @else
                          <p>まだ疾患が登録されていません</p>
                        @endif
                        </div>
                        
                 </div>
                 <div class="profile_top_right_area">
                   <form method="post">
                     @csrf
                           <div class="menu_area_title">
                              <p>｜目標を変更する｜</p>
                           </div>
                           <div class="goal_disease_form">
                                <div class="goal_form">
                                    <input type="text" name="goal" placeholder="例）箸でご飯が食べれるようになる">
                                </div>
                           </div>
                      
                      
                           <div class="menu_area_title">
                             <p>｜疾患を変更する｜</p>
                           </div>
                           <div class="disease_form">
                                <div class="checkbox_area">
                                   <input type="checkbox" id="03-A" name="disease[]" value="脳血管障害">
                                       <label for="03-A" class="checkbox03">脳血管障害</label>
                                    <input type="checkbox" id="03-B" name="disease[]" value="骨折">
                                        <label for="03-B" class="checkbox03">骨折</label>
                                    <input type="checkbox" id="03-C" name="disease[]" value="呼吸器疾患">
                                        <label for="03-C" class="checkbox03">呼吸器疾患</label>
                                    <input type="checkbox" id="03-D" name="disease[]" value="心疾患">
                                       <label for="03-D" class="checkbox03">心疾患</label>
                                    <input type="checkbox" id="03-E" name="disease[]" value="廃用症候群">
                                        <label for="03-E" class="checkbox03">廃用症候群</label>
                                    <input type="checkbox" id="03-F" name="disease[]" value="リウマチ">
                                        <label for="03-F" class="checkbox03">リウマチ</label>
                                    <input type="checkbox" id="03-G" name="disease[]" value="パーキンソン病">
                                       <label for="03-G" class="checkbox03">パーキンソン病</label>
                                    <input type="checkbox" id="03-H" name="disease[]" value="神経疾患">
                                       <label for="03-H" class="checkbox03">神経疾患</label>
                                    <input type="text" name="disease[]" placeholder="その他">
                                </div>
                                <div class="menu_post_btn">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="submit" value="登録する" class="submit_form">
                                </div>
                           </div>
                   </form>
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