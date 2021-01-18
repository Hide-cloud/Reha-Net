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


/* contents
--------------------*/

.contents {
    margin-top: 50px;
    display:flex;
}

.contents h1 {
    text-align: center;
    color:#4F4B4B;
    font-size: 30px;
    font-family: 'Gurmukhi MN',sans-serif;
}



/* contents(メニュー投稿)
--------------------*/
.menu{
    margin-top:10px;
    margin-right:10px;
    margin-bottom:10px;
    margin-left:10px;
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

/* メニュー投稿フォーム */
.menu_form{
    width:80%;
    background-color:red;
    margin-left:20px;
}

/* チェックボックス03 */
input[type=checkbox] {
    display: none;
}
.checkbox03 {
    box-sizing: border-box;
    cursor: pointer;
    display: inline-block;
    padding: 5px 30px;
    position: relative;
    width: auto;
}
.checkbox03::before {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 3px;
    content: '';
    display: block;
    height: 16px;
    left: 5px;
    margin-top: -8px;
    position: absolute;
    top: 50%;
    width: 16px;
}
.checkbox03::after {
    border-right: 6px solid #fedd1e;
    border-bottom: 3px solid #fedd1e;
    content: '';
    display: block;
    height: 20px;
    left: 7px;
    margin-top: -16px;
    opacity: 0;
    position: absolute;
    top: 50%;
    transform: rotate(45deg) translate3d(0,2px,0) scale3d(.7,.7,1);
    transition: transform .2s ease-in-out, opacity .2s ease-in-out;
    width: 9px;
}
input[type=checkbox]:checked + .checkbox03::before {
    border-color: #666;
}
input[type=checkbox]:checked + .checkbox03::after {
    opacity: 1;
    transform: rotate(45deg) scale3d(1,1,1);
}




.sign-up-box .link-btn{
    padding: 1em 2em;
    border: solid 1px #0f9ada;
    border-radius: 4px;
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.2);
    background: #03A9F4;
    color: #FFF;
    font-size: 12px;
    text-decoration: none;
    text-shadow: 0 1px 0 rgba(0,0,0,0.2);
}

/* contents(マイプロフィール欄)
--------------------*/
.user-info-containers{
    width:100%;
    margin: 30px;
}


.top-containers{
    text-align: center;
    width: 80%;
    padding: 30px;
    background-color: oldlace;
}

.profile_list{
    margin: 8px 0;
    color: gray;
    font-size: 18px;
    width:70%;
}

.profile_list li{
    margin: 30px;
}



.vision-area {
    margin-top: 50px;
    text-align: center;
    color: #4F4B4B;
    height: 380px;
}

.visions {
    width: 33%;
    float: left;
}

.visions img {
    width:60%;
}

.vision-icon p {
    font-weight: bold;
    font-size: 30px;
}

.text-contents {
    width: 80%;
    display: inline-block;
}




.mandatory {
    color: white;
    font-size: 12px;
    background-color: red;
    padding: 3px 3px;
    margin-left: 5px;
}
.alertarea {
    color: red;
    background-color: #fee;
    background-image: url("img/alerticon.png");
    background-repeat: no-repeat;
    background-position: 0.35em center;
    display: inline-block;
    border-radius: 0.5em;
    margin-left: 0.5em;
    padding:1px 0.5em 1px 32px;
}

.alertarea:empty {
    display: none;
}


.page_top{
    width: 100px;
    height: 60px;
    position: fixed;
    right: 0;
    bottom: 0;
    background: #4F4B4B;
    opacity: 0.6;
}
  
.page_top a{
    position: relative;
    display: block;
    width: 100px;
    height: 60px;
    text-decoration: none;
}

.page_top a::before{
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    content: '\f102';
    font-size: 25px;
    color: #fff;
    position: absolute;
    width: 25px;
    height: 25px;
    top: -25px;
    bottom: 0;
    right: 0;
    left: 0;
    margin: auto;
    text-align: center;
}

.page_top a::after{
    content: 'PAGE TOP';
    font-size: 13px;
    color: #fff;
    position: absolute;
    top: 30px;
    bottom: 0;
    right: 0;
    left: 0;
    margin: auto;
    text-align: center;
}

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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>メニューを探す</a>
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



        <!-- container -->
        <div class="contents">
            <div class="area">
              <div class="menu">
               <h1>メニューを作る</h1>
                   <div class="menu_form">
                       <form method="post" enctype="multipart/form-data">
                         @csrf
                           <div class="form_title">
                              <p>メニュータイトル：</p>
                              <input type="text" placeholder="例)" name="title">
                           </div>
                           <div class="keyword">
                               <!--チェックボックス03-->
                               <p>ジャンル(複数選択可)：</p>
                                <input type="checkbox" id="03-A" name="keyword[]" checked="checked">
                                   <label for="03-A" class="checkbox03">上肢</label>
                                <input type="checkbox" id="03-B" name="keyword[]">
                                    <label for="03-B" class="checkbox03">下肢</label>
                                <input type="checkbox" id="03-C" name="keyword[]">
                                    <label for="03-C" class="checkbox03">体幹</label>
                                <input type="checkbox" id="03-D" name="keyword[]">
                                   <label for="03-D" class="checkbox03">食事</label>
                                <input type="checkbox" id="03-E" name="keyword[]">
                                    <label for="03-E" class="checkbox03">歩行</label>
                                <input type="checkbox" id="03-F" name="keyword[]">
                                    <label for="03-F" class="checkbox03">洗体</label>
                                <input type="checkbox" id="03-G" name="keyword[]">
                                   <label for="03-G" class="checkbox03">階段</label>
                                <input type="checkbox" id="03-H" name="keyword[]">
                                    <label for="03-H" class="checkbox03">仕事</label>
                                <input type="checkbox" id="03-I" name="keyword[]">
                                    <label for="03-I" class="checkbox03">発声</label>
                           </div>
                           <div class="item">
                              <p>使用する道具：</p>
                              <input type="text" placeholder="" name="item">
                           </div>
                           <div class="method">
                              <p>実施方法：</p>
                              <textarea type="text" placeholder="" name="method"></textarea>
                           </div>
                           <div class="video">
                              <!-- <p>参考動画(自分で作成した動画)：</p>    -->
                              <!-- <input type="file" name="video[]">  -->          
                              <!-- <p>&nbsp;</p>                       -->

                              <p>参考動画(YouTubeよりURL)：</p>
                              <input type="text" placeholder="" name="youtube_url">
                           </div>
                           <div class="post_btn">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="submit" value="作成する">
                           </div>
                          
                       </form>
                    </div>
                <div class='search-genre'>
                      
                
                      
                      
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