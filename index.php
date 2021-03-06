<?php
include "include.php";
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
    <section>
        <div id="all">
            <div id="box">
                <div class="a0">
                    <a href="profile.php"><p class="a1">Profile</p></a>
                </div>
                <div class="a0">
                    <a href="greet.php"> <p class="a2">Greet</p></a>   
                </div>
                
                <div class="a3">
                    <p class="a4">강지연知延</p>
                    <p>JeeYeun Kang</p>
                </div>
                
            </div>
            <div id="box">
                <div class="b1">
                    <p class="b2"><span style="color: #506d84;">N</span>otice</p>
                    <ul class="b3">
                        <li>첫번째 공지사항입니다</li>
                        <li>두번째 공지사항입니다.</li>
                    </ul>
                </div>
                <a href="notice.php"><div class="b4"></div></a>
            </div>
            <div id="box">
            <div class="b1">
                    <p class="b2"><span style="color: #506d84;">B</span>oard</p>
                    <ul class="b3">
                        <li>첫번째 게시물입니다</li>
                        <li>두번째 게시물입니다.</li>
                    </ul>
                </div>
                <a href="board.php"><div class="b4"></div></a>
            </div>
            <div id="box">
                <div class="b1">
                    <p class="b5">Q&nbsp;<span style="color: goldenrod;">&</span>&nbsp;A</p>
                </div>
                <a href="qna.php"><div class="b4"></div></a>
            </div>
            <div id="box">
                <p class="c1">Portfolio 
                <div class="imgslide">
                    <div class="imgslide2">
                        <img src="images/slide1.jpeg">
                        <img src="images/slide2.jpeg">
                        <img src="images/slide3.jpeg">
                        <img src="images/slide4.jpeg">
                        <img src="images/slide5.jpeg">
                    </div>
                    <div class="imgslide_frame" onclick="location.href='portfolio.php'" ></div>
                </div>
            </div>
            <div id="box" onclick="location.href='inc.php'">
                <a href="inc.php"><div class="d1">
                    <p class="b2"><span style="color: #a7866c;">I</span>nc</p>
                </div></a>
                <div class="d2"></div>
            </div>
            <div id="box">
                <p class="b2" style="margin-top: 5px;color: #333;text-align: center;">
                    <span style="color: #a7866c;">G</span>uest
                <input type="button" value="+ more +" style="margin-top: 20px;background-color: #333333;;"
                class="c0" onclick="location.href='guest.php'"></p>
                <table class="f1">
                    <tr><td style="text-align: center;
                        background-color: #33333321;;width: 80px;">09.30</td>
                        <td style="padding-left: 10px;">안녕하세요 앞구르기 뒷구르기 어쩌고 저쩌고 궁시렁 궁시렁 축배를 들어라~~오늘을 위해서~~내일을 향해서~~~ </td>
                    </tr>
                    <tr><td style="text-align: center;
                            background-color: #33333321;">10.02</td>
                        <td style="padding-left: 10px;">2차 접종완!항체생성 되는거 맞나 하나도 안아픈데...</td>
                    </tr>
                </table>
            </div>
            <div id="box">
                <iframe width="460" height="234" src="https://www.youtube.com/embed/kpF0n39xXVM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div id="box">
                <iframe width="460" height="234" src="https://www.youtube.com/embed/fdI6-dbkqkI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div id="box">
                <div class="b1">
                    <p class="b2"><span style="color: #506d84;">P</span>hot<span style="color: #a7866c;">o</span></p>
                </div>
                <a href="photo.php"><div class="b4"></div></a>
            </div>
            <!-- sms -->
            <div id="box">
                <a style="margin-left: 20px;" href="https://www.facebook.com" target="_blank">facebook</a>
                <div class="box2"><img src="images/facebook.png"></div>
            </div>
            <div id="box">
                <a style="margin-left: 20px;"href="https://www.instagram.com" target="_blank">instagram</a>
                <div class="box2"><img src="images/insta.png"></div>
            </div>
            <div id="box">
                <a style="margin-left: 20px;"href="https://twitter.com" target="_blank">twitter</a>
                <div class="box2"><img src="images/twitter.png"></div>
            </div>
            <div id="box">
                <a style="margin-left: 20px;"href="https://www.youtube.com" target="_blank">youtube</a>
                <div class="box2"><img src="images/youtube.png"></div>
            </div>
            <div id="box">
                <a style="margin-left: 20px;"href="http://blog.naver.com" target="_blank">naver blog</a>
                <div class="box2"><img src="images/naver.png"></div>
            </div>
        </div>
    </section>
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