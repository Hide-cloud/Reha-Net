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
        <link href="{{ asset('css/post_menus.css') }}" rel="stylesheet">
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


                <ul class="header-right">
                   <!-- Authentication Links -->
                    <li>
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>メニューを探す</a>
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
        <div class="contents">
            
        <div class="area">
              <div class="menu_post">
                   <div class="menu_post_title">
                        <h1>メニューを作る(自分で動画を投稿する)</h1>
                   </div>
                   <div class="moveMyvideo">
                        <button><a href="/post_menu/myvideo">※YouTube動画を投稿する場合はこちらへ</a></button>
                   </div>

                  <!-- validation -->
                   @if ($errors->any())
                     <div class="alert alert-danger">
                          @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                          @endforeach
                     </div>
                   @endif

                   <div class="menu_form">
                     <div class="menu_form_fontarea">
                       <form method="post" enctype="multipart/form-data">
                         @csrf
                           <div class="form_title">
                              <p>メニュータイトル：</p>
                              <input type="text" placeholder="例)：片麻痺の方の箸を使った食事練習" name="title" class="title_form">
                           </div>

                           <div class="disease">
                              <!--チェックボックス03-->
                              <p>対象疾患(複数選択可)：</p>
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
                              </div>
                           </div>

                           <div class="keyword">
                               <!--チェックボックス04-->
                               <p>ジャンル(複数選択可)：</p>
                               <div class="checkbox_area">
                                    <input type="checkbox" id="04-A" name="keyword[]" value="上肢">
                                       <label for="04-A" class="checkbox03">上肢</label>
                                    <input type="checkbox" id="04-B" name="keyword[]" value="下肢">
                                        <label for="04-B" class="checkbox03">下肢</label>
                                    <input type="checkbox" id="04-C" name="keyword[]" value="体幹">
                                        <label for="04-C" class="checkbox03">体幹</label>
                                    <input type="checkbox" id="04-D" name="keyword[]" value="食事">
                                       <label for="04-D" class="checkbox03">食事</label>
                                    <input type="checkbox" id="04-E" name="keyword[]" value="歩行">
                                        <label for="04-E" class="checkbox03">歩行</label>
                                    <input type="checkbox" id="04-F" name="keyword[]" value="洗体">
                                        <label for="04-F" class="checkbox03">洗体</label>
                                    <input type="checkbox" id="04-G" name="keyword[]" value="階段">
                                       <label for="04-G" class="checkbox03">階段</label>
                                    <input type="checkbox" id="04-H" name="keyword[]" value="仕事">
                                        <label for="04-H" class="checkbox03">仕事</label>
                                    <input type="checkbox" id="04-I" name="keyword[]" value="発声">
                                        <label for="04-I" class="checkbox03">発声</label>
                               </div>
                           </div>
                           <div class="post_item">
                              <p>使用する道具：</p>
                              <input type="text" placeholder="例)：箸、ゴルフボール、鉛筆" name="item" class="item_form">
                           </div>
                           <div class="post_method">
                              <p>実施方法：</p>
                              <textarea type="text" placeholder="例)：箸、ゴルフボール、鉛筆" name="method"　class="method_form"></textarea>
                           </div>
                           <div class="video_area">
                               <p>参考動画(自分で作成した動画)：</p>    
                               <input type="file" name="video_path">        
                               <p>&nbsp;</p>                       
                           </div>
                           
                           <div class="menu_post_btn">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="submit" value="作成する" class="submit_form">
                           </div>
                          
                       </form>
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