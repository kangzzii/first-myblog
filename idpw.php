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
    <div id="login" style="width:1100px;display:flex;
    margin-bottom: 100px;" >
        <form name="frmId" method="post" action="id_ok.php">
            <table class="idpw">
                <tr>
                    <th colspan="2">
                        아이디 찾기
                    </th>
                </tr>
                <tr>
                    <td>이름</td>
                    <td>
                        <input type="text" name="usname" placeholder="이름을 입력하세요" class="idpwbar">
                    </td>
                </tr>
                <tr>
                    <td>이메일</td>
                    <td>
                        <input type="text" name="usemail" placeholder="이메일을 입력하세요" class="idpwbar">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" value="ID찾기" class="idpwbt" onclick="idsend()">
                    </td>
                </tr>
                <?php if(isset($_POST["result1"])){ ?>
                <tr>
                    <td colspan="2">
                       찾으시는 계정은 <span style="color:red"> <?php echo $_POST["result1"] ?> </span> 입니다.
                    </td>
                </tr>
                <?php } ?>
            </table>
            <script>
                function idsend(){
                    if(frmId.usname.value==""){
                        alert("이름을 입력하세요.");
                        frmId.usname.focus();return false();
                    }
                    if(frmId.usemail.value==""){
                        alert("이메일을 입력하세요.");
                        frmId.usemail.focus();return false();
                    }
                    document.frmId.submit();
                }
            </script>
        </form>
        <form name="frmpw" method="post" action="pw_ok.php">
            <table class="idpw">
                <tr>
                    <th colspan="2">
                        비밀번호 찾기
                    </th>
                </tr>
                <tr>
                    <td>이름</td>
                    <td>
                        <input type="text" name="usname" placeholder="이름을 입력하세요" class="idpwbar">
                    </td>
                </tr>
                <tr>
                    <td>아이디</td>
                    <td>
                        <input type="text" name="usid" placeholder="아이디를 입력하세요" class="idpwbar">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" value="비밀번호찾기" class="idpwbt" onclick="Pwsend()">
                    </td>
                </tr>
                <?php if(isset($_POST["result2"])){ ?>
                <tr>
                    <td colspan="2">
                       찾으시는 계정의 비밀번호는 <span style="color:red"> <?php echo $_POST["result2"] ?> </span> 입니다.
                    </td>
                </tr>
                <?php } ?>
            </table>
            <script>
                function Pwsend(){
                    if(frmpw.usname.value==""){
                        alert("이름을 입력하세요.");
                        frmpw.usname.focus();return false();
                    }
                    if(frmpw.usid.value==""){
                        alert("아이디를 입력하세요.");
                        frmpw.usid.focus();return false();
                    }
                    document.frmpw.submit();
                }
            </script>
        </form>
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
        if(idpw1.usname.value==""){alert("이름을 입력하세요");idpw1.usname.focus();return false;}
        if(idpw1.usemail.value==""){alert("Email을 입력하세요");idpw1.usemail.focus(); return false;}
        document.idpw1.submit();
    }
</script>