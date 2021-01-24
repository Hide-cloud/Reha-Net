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
                     › <a href="/">全てのメニュー</a> 
                 </div>
             </div>
        </div>

             <div class="menu_detail">
                  <div class="menu_header">
                         <div class="menu_title">
                            <p>{{ $menu -> title }}</p>
                         </div>
                         <div class="favorite_form">
                             @if(isset($favorite))   
                                <ul class="favorite_form_list">
                                 <form method="post">
                                    @csrf
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <input type="hidden" name="menu_id" value="{{ $menu -> id }}">
                                      <input type="hidden" name="title" value="{{ $menu -> title }}">
                                      @if(isset($menu -> disease))
                                      @foreach($menu -> disease as $disease )
                                      <input type="hidden" name="disease[]" value="{{ $disease }}">
                                      @endforeach
                                      @endif
                                      @if(isset($menu -> keyword))
                                      @foreach($menu -> keyword as $keyword )
                                      <input type="hidden" name="keyword[]" value="{{ $keyword }}">
                                      @endforeach
                                      @endif
                                      <input type="hidden" name="item" value="{{ $menu -> item }}">
                                      <input type="hidden" name="method" value="{{ $menu -> method }}">
                                      <input type="hidden" name="youtube_url" value="{{ $menu -> youtube_url }}">
                                      <input type="hidden" name="video_path" value="{{ $menu -> video_path }}">
                                      <li><input type="submit" value="お気に入りから外す"></li>
                                 </form>
                                      <li>※登録済み</li>
                                      <li><i class="fa fa-bookmark"></i> </li>
                                </ul>
                                  
                             @elseif(!isset($favorite))
                                 <ul class="favorite_form_list">
                                  <form method="post">
                                     @csrf
                                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                       <input type="hidden" name="menu_id" value="{{ $menu -> id }}">
                                       <input type="hidden" name="title" value="{{ $menu -> title }}">
                                          @if(isset($menu -> disease))
                                          @foreach($menu -> disease as $disease )
                                          <input type="hidden" name="disease[]" value="{{ $disease }}">
                                          @endforeach
                                          @endif
                                          @if(isset($menu -> keyword))
                                          @foreach($menu -> keyword as $keyword )
                                          <input type="hidden" name="keyword[]" value="{{ $keyword }}">
                                          @endforeach
                                          @endif
                                          <input type="hidden" name="item" value="{{ $menu -> item }}">
                                          <input type="hidden" name="method" value="{{ $menu -> method }}">
                                          <input type="hidden" name="youtube_url" value="{{ $menu -> youtube_url }}">
                                          <input type="hidden" name="video_path" value="{{ $menu -> video_path }}">
                                       <li><input type="submit" value="お気に入りに追加"></li>
                                  </form>
                                  <li><i class="fa fa-bookmark-o"></i></li>
                                 </ul>
                             @endif
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
                     <ul class="menu_keyword">
                           <li class="key">投稿者：</li>
                           <li class="keycutbar"><a href="/userprofile/{{ $contributor_id }}">{{ $contributor_name }}</a></li>
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