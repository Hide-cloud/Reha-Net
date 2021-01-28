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
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
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


        <!-- title -->
            <div class="top-area">
            <div class="message">
                <h2>手軽に始めるリハビリ</h2>
                <p>自分だけのメニューを見つけよう</p>
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
                    <input class="keywordbox" placeholder="キーワード[例：手のリハビリ]" name="serch_menu">
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
                                    <span>{{ $arm_menus_count }}件</span>
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
                                    <span>{{ $leg_menus_count }}件</span>
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
                                    <span>{{ $trunk_menus_count  }}件</span>
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
                                    <span>{{ $finger_menus_count  }}件</span>
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
                                     <span>{{ $voice_menus_count }}件</span>
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
                                    <span>{{ $eat_menus_count }}件</span>
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
                                    <span>{{ $walk_menus_count }}件</span>
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
                                    <span>{{ $wash_menus_count }}件</span>
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
                                    <span>{{ $stairs_menus_count }}件</span>
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
                                     <span>{{ $work_menus_count }}件</span>
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