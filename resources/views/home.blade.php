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

        <style>
          html {
    height: 100%;
    width:100%;
}

body {
    height : 100%;   
    margin : 0;
}

a {
    text-decoration:none;
}
    
a:link {
    color:#000000;
}
    
a:visited {
    color:#000000;
}


ul {
    list-style: none;
}

.container {
    max-width: 1170px;
    width: 80%;
    margin: 0 auto;
    padding: 50px 0;
}




/* header
--------------------*/
header {
    height: 180px;
    width: 100%;
}

.header-left {
    margin-left: 50px; 
    float: left;
}

.header-left img {
    width: 250px;
}


/* navi
--------------------*/

nav {
    height: 15px;
    margin: 80px auto 0 auto;
    position: relative;
}

nav ul {
    margin-left: auto;
    float: right;
}

nav li {
    margin-right: 50px;
    opacity: 0.6;
    font-weight: bold;
    float: left;
}

nav li:hover {
    opacity: 1;
}

#navi {
    display: none;
}




/* main
--------------------*/

.top-area {
    background-image: url("https://thumb.photo-ac.com/88/88ddddea8d503541fd08adf08c69d3fa_t.jpeg");
    background-size: cover;
    height:600px;
    width: 100%;
}

.message {
    color: #311731;
    width: 60%;
    text-align: center;
    padding: 50px 0;
}

.message h2 {
    font-size: 50px;
    letter-spacing: 5px;
    padding-top: 50px;
}

.message p {
    font-weight: bold;
    letter-spacing: 5px;
    line-height: 40px;
    padding-bottom: 50px;
    font-size:30px
}


/* contents
--------------------*/

.contents {
    margin-top: 30px;
    margin-right: 20px;
    display:flex;
}

.contents h2 {
    color:#4F4B4B;
    font-size: 25px;
    font-family: 'Gurmukhi MN',sans-serif;
    margin-left:20px;
}



/* contents
--------------------*/
.area{
    background-color:lightgray;
    margin-top:10px;
    margin-right:10px;
    margin-bottom:10px;
    margin-left:10px;
}

.keywordform{
  margin-left:20px;
}

.keywordbox{
  width:500px;
  height:40px;
  font-size:15px;
}

.kewordbtn{
  width:70px;
  height:40px;
  font-size:20px;
}

.top-genre__img{
    width:140px;
    height:110px;
}


.top-genres {
    display: flex;
}

.top-genre{
    margin-right:10px;
    margin-bottom:10px;
    position: relative;
}

.top-genre__font{
    position: absolute;
    top: 55px;
    left:55px;
}

.top-genre__name{
    color:rgb(34, 33, 33);
    font-size:20px;
    font-weight: bold;
}

.top-genre__store-count{
    font-size:13px;
}

/* contents(新規登録へ)
--------------------*/






footer {
    width: 80%;
    margin: 0 auto;
}
  
footer img {
    width: 125px;
}

footer p {
    color: #b3aeb5;
    font-size: 12px;
}
        </style>
    </head>

     <body>
        <!-- header -->
        <header>
            <div class="container" id="top">
                <div class="header-left">
                    <div class="header-left">
                        <p>Reha-Net</p>
                      </div>
                </div>
                
                <!-- navi -->
                <nav class="flex-center position-ref full-height">

                  <ul class="top-right links">
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
        <!-- hamburger -->
                <div id="navi">
                        <ul>
                            <li><a href="#about" class="js-smooth-scroll">About</a></li>
                            <li><a href="#vision" class="js-smooth-scroll">Vison</a></li>
                            <li><a href="#contact" class="js-smooth-scroll">Contact</a></li>
                        </ul>
                </div>
                <div id="hamburger">
                    <span class="inner_line" id="line1"></span>
                    <span class="inner_line" id="line2"></span>   
                    <span class="inner_line" id="line3"></span>           
                </div>
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
                    <input class="keywordbox" placeholder="キーワード[例：yohji yamamoto]" name="serch_menu">
                    <input class="kewordbtn" type="submit" name="commit" value="検 索">
                  </form>
              <!--
                <div class='search-genre'>
                      <h2 class='search-genre__title'>
                      <span>ジャンルから探す</span>
                      </h2>
                      <div class='search-genre__area'>
                        <ul class='top-genres'>
                          <li class='top-genre'>
                            <a class="top-genre-link" href="/menu/serch_arm"><img class="top-genre__img" src="https://contents.oricon.co.jp/special/img/55000/55229/thumb/img660/1601452520816.png" />
                               <div class="top-genre__font">
                                  <div class='top-genre__name'>
                                    <span>上肢</span>
                                  </div>
                                  <div class='top-genre__store-count'>
                                    <span>25件</span>
                                  </div>
                               </div>
                            </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_leg"><img class="top-genre__img" src="https://cdn.bg-mania.jp/images/2020/06/tbm_20200605195931.jpeg" />
                             <div class="top-genre__font">
                               <div class='top-genre__name'>
                                 <span>下肢</span>
                               </div>
                               <div class='top-genre__store-count'>
                                 <span>19件</span>
                               </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_trunk"><img class="top-genre__img" src="https://img.freepik.com/free-photo/muscular-man-showing-six-pack-abs-isolated-on-white-background_1150-2947.jpg?size=626&ext=jpg" />
                             <div class="top-genre__font">
                                <div class='top-genre__name'>
                                  <span>体幹</span>
                                </div>
                                <div class='top-genre__store-count'>
                                  <span>17件</span>
                                </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_finger"><img class="top-genre__img" src="https://grapee.jp/wp-content/uploads/13480_main-768x576.jpg" />
                             <div class="top-genre__font">
                                <div class='top-genre__name'>
                                  <span>手指</span>
                                </div>
                                <div class='top-genre__store-count'>
                                  <span>8件</span>
                                </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_vocalization"><img class="top-genre__img" src="https://www.sakura-st-dc.com/shared/images/letter/0006.jpg" />
                             <div class="top-genre__font">
                                <div class='top-genre__name'>
                                  <span>発声</span>
                                </div>
                                <div class='top-genre__store-count'>
                                   <span>6件</span>
                                </div>
                               </div>
                             </a>
                          </li>
                        </ul>
                      </div>
                      
                </div>
               -->
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
                        <!--
                        <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_eat"><img class="top-genre__img" src="https://resources.matcha-jp.com/resize/720x2000/2019/10/24-88964.jpeg" />
                             <div class="top-genre__font">
                               <div class='top-genre__name'>
                                 <span>食事</span>
                               </div>
                               <div class='top-genre__store-count'>
                                 <span>19件</span>
                               </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_walk"><img class="top-genre__img" src="https://www.descente.co.jp/media/wp-content/uploads/2020/07/00383-min.jpg" />
                             <div class="top-genre__font">
                               <div class='top-genre__name'>
                                 <span>歩行</span>
                               </div>
                               <div class='top-genre__store-count'>
                                 <span>19件</span>
                               </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_wash"><img class="top-genre__img" src="https://diamond.jp/mwimgs/d/d/450/img_dde67115e6fc83cb87250812b9ac37d527601.jpg" />
                             <div class="top-genre__font">
                               <div class='top-genre__name'>
                                 <span>洗体</span>
                               </div>
                               <div class='top-genre__store-count'>
                                 <span>19件</span>
                               </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_stairs"><img class="top-genre__img" src="https://woman.mynavi.jp/lifesupport/creditcard/wp/wp-content/uploads/2019/03/walking-waon-1-480x318.jpg" />
                             <div class="top-genre__font">
                               <div class='top-genre__name'>
                                 <span>階段</span>
                               </div>
                               <div class='top-genre__store-count'>
                                 <span>19件</span>
                               </div>
                              </div>
                             </a>
                          </li>
                          <li class='top-genre'>
                             <a class="top-genre-link" href="/menu/serch_work"><img class="top-genre__img" src="https://paraft.jp/files/reportsimg/article/16000784/ir0cpxas0jnoac8f60g8dzs9.jpg" />
                             <div class="top-genre__font">
                               <div class='top-genre__name'>
                                 <span>仕事</span>
                               </div>
                               <div class='top-genre__store-count'>
                                 <span>19件</span>
                               </div>
                              </div>
                             </a>
                          </li>
                          -->
                        </ul>
                      </div>
                  </div>
                </div>
             
              </div>

            <!-- aside -->
            <div class="area">
               <div class='user-info-containers'>
                  <div class='top-containers'>
                     <h3>{{ Auth::user()->name }}さん</h3>
                     <p><a href="/mypage/{{ Auth::user()->id }}" class="btn btn-sky btn-block">マイページへ</a></p>
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