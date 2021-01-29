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
        <link href="{{ asset('css/menu_details.css') }}" rel="stylesheet">
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
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>Reha_Net</a>
                    </li>
                </ul>

                 @if (Route::has('login'))
                 <ul class="header-right">
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
        </header>



        <!-- container -->
        <div class="warapper">
             <div class="directory">
                 <div class="directory-list">
                     <a href="/"><i class="fas fa-home"></i>Reha-Net</a> 
                     › <a href="/">全てのメニュー</a> 
                 </div>
             </div>
        </div>

             <div class="menu_detail">
                  <div class="menu_header">
                         <div class="menu_title">
                            <p>{{ $menu -> title }}</p>
                         </div>
                         
                  </div>  
                  <div class="menu_keyword_area">
                  <ul class="menu_keyword">
                           <li class="key">対象疾患：</li>
                         @if(isset($menu -> disease))
                         @foreach($menu -> disease as $disease )
                           <li class="key">{{ $disease }}</li>
                           <li class="keycutbar">/</li>
                         @endforeach
                         @endif
                     </ul>
                     <ul class="menu_keyword">
                           <li class="key">キーワード：</li>
                        @if(isset($menu -> keyword))
                         @foreach($menu -> keyword as $keyword )
                           <li class="key">{{ $keyword }}</li>
                           <li class="keycutbar">/</li>
                         @endforeach
                         @endif
                     </ul>
                  </div>
                  <div class="video_and_explain">
                       <div class="video">
                          @if(isset($menu -> youtube_url))
                           <?php 
                             $str = str_replace("https://youtu.be/","",$menu -> youtube_url);
                             //iframe用のアドレスに変換する
                             $return_ad = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$str.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                           ?>
                           <p><?php echo $return_ad ?></p>
                          @elseif(isset($menu -> video_path))
                           <video controls poster="" id="video" width="560" height="315" type="video/mp4">
                           　　<source src="{{ asset('storage/menu_video/'.$menu -> video_path) }}"　type="video/mp4">
                              <p>このブラウザでは動画を再生することができません。最新版のブラウザをご利用ください。</p>
                           </video>
                           <!-- 自動再生バージョン
                           <video controls　autoplay loop muted poster="" playsinline  width="560" height="315"　type="video/mp4">
	                           <source src="{{ asset('storage/menu_video/'.$menu -> video_path) }}">
                               <p>このブラウザでは動画を再生することができません。最新版のブラウザをご利用ください。</p>
                           </video>
                           -->
                          @endif
                       </div>
     
                       <div class="menu-explain">
                           <div class="item_area">
                             <div class="item_title">
                              <p>使用する道具</p>
                             </div>
                             @if(isset($menu -> item))
                             <div class="item">
                              <p>{{ $menu -> item }}</p>
                             </div>
                             @else
                             <div class="item">
                               <p>※道具は使用しません</p>
                             </div>
                             @endif
                           </div>
                           <div class="method_area">
                             <div class="method_title">
                              <p>方法</p>
                             </div>
                             <div class="method">
                              <p>{{ $menu -> method }}</p>
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