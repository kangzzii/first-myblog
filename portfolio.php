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
            <li><a href="profile.php">Profile</a></li>
            <li><a href="photo.php">Photo</a></li>
            <li><a href="portfolio.php">Portfolio ▼</a></li>
        </ul>
        </div>
    </div>
    <section>
    <div class="g4">
        <h1>Portfolio</h1><br>
        <input type="button" class="uploadbt" value="Upload" 
                style="width:100px;height: 30px;float: right;
                background-color: #7788998a;border-radius: 30px;
                color: white;" onclick="location.href='portfolio_write.php'">
        <p>밥값하는 개발자 강지연을 소개합니다.</p>
        <br><br>
        <hr>
    </div>
    
    <div id="portfoliobox">
        <div class="portbox">
            <div class="pb0">
                
            <div class="pb1">
               <img src="images/hanamlogo.png" >
            </div>
            <div class="pb2">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    일반형 홈페이지 </p>
            </div>
            <div class="pb3">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    <a href="https://rkd3116.cafe24.com/hanam/nav.html">바로가기</a>
                <p><span style="color:#6f6f85;font-size: small;"> ■</span>
                    완성일자11.30</p>
            </div>
            </div>
        </div>
        <div class="portbox"onclick="location.href='travel/index.html'">
            <div class="pb0">
            <div class="pb1">
                <img src="images/travellogo2.png">
            </div>
            <div class="pb2">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                   일반형 홈페이지</p>
            </div>
            <div class="pb3">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    조별프로젝트<br>
                    &ensp;&ensp;여행사홈페이지</p></p>
                <p><span style="color:#6f6f85;font-size: small;"> ■</span>
                    완성일자10.22</p>
            </div>
            </div>
        </div>
        <div class="portbox"onclick="location.href='yg/yg.html'" >
            <div class="pb0">
            <div class="pb1">
                <img src="images/yglogo.jpg">
            </div>
            <div class="pb2">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    일반형 홈페이지</p>
            </div>
            <div class="pb3">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    YG Entertainment 홈페이지 Copy<br>
                    &ensp;&ensp;메인페이지만 제작</p>
                <p><span style="color:#6f6f85;font-size: small;"> ■</span>
                    완성일자10.13</p>
            </div>
            </div>
        </div>
        
        <div class="portbox">
            <div class="pb0">
            <div class="pb1">
                <img src="images/logo1.png">
            </div>
            <div class="pb2">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    반응형 홈페이지</p>
            </div>
            <div class="pb3">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    여행사사이트 리뉴얼 페이지<br>
                    &ensp;&ensp;상세페이지 전체제작</p>
                <p><span style="color:#6f6f85;font-size: small;"> ■</span>
                    완성일자10.03</p>
            </div>
            </div>
        </div>
        <div class="portbox">
            <div class="pb0">
            <div class="pb1">
                <img src="images/logo5.jpg">
            </div>
            <div class="pb2">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    부트스트랩 반응형</p>
            </div>
            <div class="pb3">
                <p><span style="color:darkblue;font-size: small;"> ■</span>
                    조별프로젝트<br>
                    &ensp;&ensp;상세페이지 전체 제작<br>
                    &ensp;&ensp;메뉴얼 별도</p></p>
                <p><span style="color:#6f6f85;font-size: small;"> ■</span>
                    완성일자10.10</p>
            </div>
            </div>
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
