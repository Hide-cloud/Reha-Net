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
        <link href="{{ asset('css/top.css') }}" rel="stylesheet" type="text/css">
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


        <!-- title -->
            <div class="top-area">
            <div class="message">
                <h2>手軽に始めるリハビリ</h2>
                <p>QOLアップを目指して</p>
                <p>Let's　start　exercise.</p>
            </div>
        </div>


        <!-- container -->
        <div class="contents">
        <div class="area">
              <div class="menu">
                 <h2 class='search-genre__title'><span>キーワードから探す</span></h2>
                  <form  class="keywordform" method="post">
                  @csrf
                    <input class="keywordbox" placeholder="キーワード[例：yohji yamamoto]" name="serch_menu">
                    <input class="kewordbtn" type="submit" name="commit" value="検 索">
                  </form>
              
                <div class='search-genre'>
                      <h2 class='search-genre__title'>
                      <span>ジャンルから探す</span>
                      </h2>
                      <div class='search-genre__area'>
                        <ul class='top-genres'>
                           <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="上肢">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://contents.oricon.co.jp/special/img/55000/55229/thumb/img660/1601452520816.png" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>上肢</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="下肢">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://cdn.bg-mania.jp/images/2020/06/tbm_20200605195931.jpeg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>下肢</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="体幹">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://img.freepik.com/free-photo/muscular-man-showing-six-pack-abs-isolated-on-white-background_1150-2947.jpg?size=626&ext=jpg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>体幹</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="手指">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://grapee.jp/wp-content/uploads/13480_main-768x576.jpg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>手指</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                              <form method="post">
                              @csrf
                               <input type="hidden" name="serch_menu" value="発声">
                               <button type="submit">
                               <a class="top-genre-link"><img class="top-genre__img" src="https://www.sakura-st-dc.com/shared/images/letter/0006.jpg" />
                               <div class="top-genre__font">
                                  <div class='top-genre__name'>
                                    <span>発声</span>
                                  </div>
                                  <div class='top-genre__store-count'>
                                     <span>6件</span>
                                  </div>
                                 </div>
                               </a>
                               </button>
                              </form>
                             </li>
                        </ul>
                      </div>
                      
                </div>
         
                <div class='search-genre'>
                      <h2 class='search-genre__title'>
                      <span>目標から探す</span>
                      </h2>
                      <div class='search-genre__area'>
                      <ul class='top-genres'>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="食事">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://resources.matcha-jp.com/resize/720x2000/2019/10/24-88964.jpeg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>食事</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="歩行">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://www.descente.co.jp/media/wp-content/uploads/2020/07/00383-min.jpg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>歩行</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="洗体">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://diamond.jp/mwimgs/d/d/450/img_dde67115e6fc83cb87250812b9ac37d527601.jpg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>洗体</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                             <form method="post">
                             @csrf
                              <input type="hidden" name="serch_menu" value="階段">
                              <button type="submit">
                              <a class="top-genre-link"><img class="top-genre__img" src="https://woman.mynavi.jp/lifesupport/creditcard/wp/wp-content/uploads/2019/03/walking-waon-1-480x318.jpg" />
                              <div class="top-genre__font">
                                 <div class='top-genre__name'>
                                   <span>階段</span>
                                 </div>
                                 <div class='top-genre__store-count'>
                                    <span>6件</span>
                                 </div>
                                </div>
                              </a>
                              </button>
                             </form>
                            </li>
                            <li class='top-genre'>
                              <form method="post">
                              @csrf
                               <input type="hidden" name="serch_menu" value="仕事">
                               <button type="submit">
                               <a class="top-genre-link"><img class="top-genre__img" src="https://paraft.jp/files/reportsimg/article/16000784/ir0cpxas0jnoac8f60g8dzs9.jpg" />
                               <div class="top-genre__font">
                                  <div class='top-genre__name'>
                                    <span>仕事</span>
                                  </div>
                                  <div class='top-genre__store-count'>
                                     <span>6件</span>
                                  </div>
                                 </div>
                               </a>
                               </button>
                              </form>
                             </li>
                        
                        </ul>
                      </div>
                  </div>
                </div>
             
              </div>

            <!-- aside -->
            

            <div class="areas">
                <div class='user-info-containers'>
                    <div class='top-container'>
                       <div class="top_container_title">
                          <h3>新規会員登録</h3>
                       </div>
                       <div class='explain-login'>
                          <span>会員登録し、ログインすることでメニューを投稿したり、お気に入り登録ができ、自分だけのメニューを作ることができるようになります。</span>
                       </div>
                       <div class='sign-up-box'>
                          <a class="link-btn" href="{{ route('register') }}">新規登録</a>
                          <a class="link-btn" href="{{ route('login') }}">ログイン</a>
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