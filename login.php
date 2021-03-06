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
        </ul>
    </header>
    <div id="login">
        <div class="login">
            <form name="login1" method="POST" action="login_ok.php">
            <table class="login_t">
                <tr>
                    <td colspan="3">
                        <img src="images/logo.png"onclick="location.href='index.php'">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="text" class="log2" 
                        placeholder="   아이디 또는 이메일 입력"  name="usid">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="password" 
                        placeholder="비밀번호를 입력해주세요."
                        class="log2" name="uspw">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="button" class="loginbt" value="로그인" onclick="send()">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="button" 
                        onclick="location.href='signup.php'"
                        class="log1"value="회원가입">
                    </td>
                    <td>
                        <input type="button"  
                        onclick="location.href='idpw.php'"
                        class="log1"value="계정찾기">
                    </td>
                    <td>
                        <input type="button" 
                        onclick="location.href='idpw.php'"
                        class="log1"value="비밀번호찾기">
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
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
<script>
    function send(){
        if(login1.usid.value==""){alert("ID를 입력하세요");login1.usid.focus();return false;}
        if(login1.uspw.value==""){alert("PW를 입력하세요");login1.uspw.focus(); return false;}
        document.login1.submit();
    }
</script>