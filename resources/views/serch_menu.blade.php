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
        <link href="{{ asset('css/serch_menu.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="responsive.css" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        
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
                     › <a href="/">全てのメニュー</a> 
                     › <span>{{ $serch_menu }}　に関するメニュー</span>
                 </div>
             </div>

             <div class="searched_result">
                  <div class="searched_heading-box__result">
                     <span class="result_title">"{{ $serch_menu }}"　に関するメニュー</span>
                     <span class="result_count">25件</span>
                  </div>
             </div>


             <div class="menu_area">
                @if(isset($serch_menus))
                   @foreach($serch_menus as $serch_menu)
                       <div class="menu_list">
                            <div class="titlebar">
                                <div class="title">
                                   <a href="/menu/{{ $serch_menu -> id }}">{{ $serch_menu -> title }}</a>
                                </div>
                                
                                <ul class="keyword">
                                    <li class="key">対象疾患：</li>
                                  @if(isset($serch_menu -> disease))
                                  @foreach($serch_menu -> disease as $disease )
                                    <li class="key">{{ $disease }}</li>
                                    <li class="keycutbar">/</li>
                                  @endforeach
                                  @endif
                                </ul>
                                
                                <ul class="keyword">
                                    <li class="key">キーワード：</li>
                                  @if(isset($serch_menu -> keyword))
                                  @foreach($serch_menu -> keyword as $keyword )
                                    <li class="key">{{ $keyword }}</li>
                                    <li class="keycutbar">/</li>
                                  @endforeach
                                  @endif
                                </ul>

                             </div>
                             <div class="method">
                               <ul class="keyword">
                                  <li class="key">方法：</li>
                                  <li class="method_contents">{{ $serch_menu -> method }}</li>
                               </ul>
                             </div>
                       </div>
                   @endforeach
                   <div class="d-flex justify-content-center">
                        {{ $serch_menus->appends(array('sort' => 'date'))->links('vendor.pagination.sample-pagination') }}
                   </div>
                @elseif(empty($serch_menus))
                  <p>まだ"{{ $serch_menu }}"に関するメニューの投稿がありません</p>
                @endif
                   
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