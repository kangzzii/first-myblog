<?php
include "include.php";
$usid=$_SESSION["id"];
$sql="select * from myblog_admin where usid='$usid'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
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
                    <li onclick="del()">????????????</li>
                    <script>
                        function del(){
                           if(confirm("????????? ?????? ???????????????????")){
                            location.href="del.php"}
                        }
                    </script>
                </ul>
                <?php }?>   
            </li>
        </ul>
    </header>
    <div id="box3">
        <div class="i0">
            <p class="i1">?????? ??????</p>
            
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>?????? ??????</h1>
            <br>
            <br>
            <hr>
    </div>
    <div id="signup" style="height:300px">
        <form name="signupf" method="POST" action="edit_check_ok.php">
        <table style="width:1200px;text-align:center">
            <tr>
                <td style="font-weigh:bold;font-size:1.3em;padding:20px">???????????? ??????</td>
            </tr>
            <tr>
                <td style="padding:20px">
                    <input type="password" class="signup1" name="uspw"placeholder="??????????????? ??????????????????">
                    <input type="submit" value="??????" class="signup2" 
                    style="background-color:#506d84;color: white;">
                </td>
            </tr>
        </table>
        </form>
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
<script>
 function send(){
        if(signupf.uspw.value==""){alert("??????????????? ???????????????");signupf.uspw.focus(); return false;}
        if(signupf.uspwc.value==""){alert("?????? ??? ??????????????? ???????????????");signupf.uspwc.focus(); return false;}
        if(signupf.uspw.value!=signupf.uspwc.value){alert("??????????????? ?????? ????????????.");signupf.uspwc.focus(); return false;}
        if(signupf.usname.value==""){alert("????????? ???????????????");signupf.usname.focus(); return false;}
        if(signupf.usemail.value==""){alert("Email??? ???????????????");signupf.usemail.focus(); return false;}

        document.signupf.submit();
    }
</script>