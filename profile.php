<?php
include "include.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome to kang-g homepage!!</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
    <style>
    
    </style>
</head>
<body>
    <header>
        <ul class="nav">
            <li><a href="index.php"><img src="images/logo.png" style="width: 50px;height: 50px;"></a></li>
            <li><a href="notice.php">Notice</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="guest.php">Guest</a></li>
            <li><a href="qna.php">QnA</a></li>
            <li><a href="inc.php">Inc</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li>+
                <?php if(!isset($_SESSION["id"])){?>
                <ul class="nav2">
                    <li onclick="location.href='login.php'">Login</li>
                    <li onclick="location.href='signup.php'">SignUp</li>
                    <li onclick="location.href='idpw.php'">ID/PW</li>
                 </ul>
                <?php }else{ ?>
                <ul class="nav2">
                    <li onclick="location.href='logout.php'">Logout</li>
                    <li onclick="location.href='edit_check.php'">Edit</li>
                    <li onclick="del()">탈퇴하기</li>
                    <script>
                        function del(){
                           if(confirm("정말로 탈퇴 하시겠습니까?")){
                            location.href="del.php"}
                        }
                    </script>
                </ul>
                <?php }?>   
            </li>
             </ul>
    </header>
    <div id="box1">
        <div class="g0">
            <p class="g2">프론트엔드 개발자</p>
            <p class="g3">밥값 하는 개발자 <span style="font-size: 1.4em;text-shadow: 2px 2px 2px darkblue;">강지연</span>을 소개합니다.</p>
        <ul class=g1>
            <li><a href="greet.php">Greet</a></li>
            <li><a href="profile.php">Profile ▼</a></li>
            <li><a href="photo.php">Photo</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
        </ul>
        </div>
    </div>
    <section>
    <div class="g4">
            <h1>프로필</h1><br>
            <p>밥값하는 개발자 강지연을 소개합니다.</p>
            <br><br>
            <hr>
            </div>
    <div id="profile">
        <div class="h1">
            <ul class="h3">
                <li><b>둘러보기</b></li>
                <li>About me
                    <div class="h4">
                        <div class="h5"><img src="images/0.jpg" style="width: 350px;height: 350px;">
                        <p><span style="color:darkblue"> ■</span>&ensp; 강지연</p>
                        <p><span style="color:darkblue; font-size: small;"> ■</span>&ensp; Jee Yeun Kang,姜知延</p>
                        </div>
                    </div>
                </li>
                <li>출생
                    <div class="h4">
                        <div class="h5"><img src="images/1.png" style="width: 350px;height:350px;">
                        <p><span style="color:darkblue"> ■</span>&ensp; 대한민국 부산광역시 </p>
                        <p><span style="color:darkblue"> ■</span>&ensp; 1994년 3월 출생 </p>
                        </div>
                    </div>
                </li>
                <li>학력
                    <div class="h4">
                        <div class="h5"><img src="images/4.jpg" style="width: 400px;height: 250px;">
                        <p><span style="color:darkblue"> ■</span>&ensp;경성대학교 중국어통번역학과  </p>
                        <p>(2013.02~2018.02)</p>
                        </div>
                    </div>
                </li>
                <li>경력
                    <div class="h4">
                    <div class="h6">
                        <img src="images/2.jpg" style="width: 250px;height: 250px;">
                        <p><span style="color:darkblue"> ■</span>&ensp; GKL청년인턴<br>
                            2017.07~2017.12</p>
                        <br><br><p></p>
                        <p><span style="color:darkblue;"> ■</span>&ensp; 중국비자서비스센터 근무<br>
                            2018.10~2020.08</p>
                        <img src="images/3.jpg"style="width: 220px;height: 220px;">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="h2">
            <img src="images/loading.png">
            <p class="h7">원하시는 탭을 선택 해 주세요.</p>
        </div>
       
            
        
        
    </div>
    </section>
    <div id="fix">
        <ul class="fix">
            <li><p style="font-weight: bold;text-align: center;font-size: 1.2em;">How to Contact <span style="color: goldenrod;">Kang-G</span></p></li>
            <a href="https://www.facebook.com" target="_blank"><li><img src="images/facebook.png"></li></a>
            <a href="https://www.instagram.com" target="_blank"><li><img src="images/insta.png"></li></a>
            <a href="https://twitter.com" target="_blank"><li><img src="images/twitter.png"></li></a>
            <a href="https://www.youtube.com" target="_blank"><li><img src="images/youtube.png"></li></a>
            <a href="http://blog.naver.com" target="_blank"><li><img src="images/naver.png"></li></a>
        </ul>
    </div>
    <footer>
        <div class="ft">
        <div class="ft1">
            <h3>Login</h3>
            <ul>
                <li><a href="login.php">Login</a></li>
                <li><a href="Signup.php">Signup</a></li>
                <li><a href="idpw.php">ID/PW</a></li>
            </ul>
        </div>
        <div class="ft1">
            <h3>Menu</h3>
        <ul>
            <li><a href="index.php">Main</a></li>
            <li><a href="notice.php">Notice</a></li>
            <li><a href="board.php">Board</a></li>
            <li><a href="guest.php">Guest</a></li>
            <li><a href="qna.php">QnA</a></li>
            <li><a href="inc.php">Inc</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
        </ul>
        </div>
        <div class="ft2">
            <h3>About Me</h3>
            <ul>
                <li><a href="greet.php">Greet</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="photo.php">Photo</a></li>
            </ul>
        </div>
            <div class="ft3">
                All rights reserved by Jeeyeun Kang <br>
                responsible site since 2021.09.30<br>
            </div>
        </div>
        
    </footer>
</body>
</html>
