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
        <link href="{{ asset('css/mypage/favorite_details.css') }}" rel="stylesheet">

        
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
                     › <a href="">{{ $menu -> title }}</a> 
                 </div>
             </div>
        </div>

             <div class="menu_detail">
                  <div class="menu_header">
                         <div class="menu_title">
                            <p>{{ $menu -> title }}</p>
                         </div>

                         <div class="mymenu_form">
                             @if(isset($mymenu))   
                                
                                 <form method="post">
                                    @csrf
                                    <ul class="favorite_form_list">
                                         <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                         <input type="hidden" name="favorite_menu_id" value="{{ $menu -> id }}">
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
                                         <li><input type="submit" value="リハビリメニューから外す"></li>
                                    
                                         <li>※登録済み</li>
                                         <li><i class="fas fa-running"></i></i> </li>
                                    </ul>
                                 </form>
                                  
                             @elseif(!isset($mymenu))
                                 
                                  <form method="post">
                                     @csrf
                                     <ul class="favorite_form_list">
                                       <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                       <input type="hidden" name="favorite_menu_id" value="{{ $menu -> id }}">
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
                                       <li><input type="submit" value="リハビリメニューに追加"></li>
                                  
                                       <li><i class="fas fa-walking"></i></li>
                                     </ul>
                                 </form>
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

        
        
        
        <div class="startpage_link">
          <p>マイリハビリメニューページへ</p>
            <a href="/mypage/mymenu/{{ Auth::user()->id }}" class="btn btn-c">Let's リハビリ</a>
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