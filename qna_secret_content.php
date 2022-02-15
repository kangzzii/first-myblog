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
    <div id="box3">
        <div class="i0">
            <p class="i1">고객 지원</p>
            <ul class=i2>
                <li><a href="notice.php">Notice</a></li>
                <li><a href="board.php">Board</a></li>
                <li><a href="inc.php">Inc</a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A  ▼</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>질문과답변</h1>
            <br>
            <br>
            <hr>
    </div>
    <div id="notice">
        <?php 
            $no=$_GET["no"];
            $p_no=$_GET["p_no"];
            $sql="select p_no from qna2 where no=$no";
            $rs=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($rs);
            $p_no=$row["p_no"];
            $sql="select * from qna2 where p_no=$p_no and step=0";
            $rs=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($rs);
            $askperson=$row["writer"];
            // echo $askperson;
        ?>
        <div align="center">
            <h3>비밀글 입니다</h3>
            <h5>작성하신 계정의 비밀번호를 입력하세요</h5>
            <h5>답변 보기는 로그인을 하셔야 비밀번호가 자동완성 됩니다</h5>
            <form name="frm_S" method="post" action="qna_secret_pw.php">
                <?php if(isset($_SESSION["id"])){ 
                    if($_SESSION["id"]=="admin"){
                    $writer=$_GET["writer"];
                    $sql2="select * from myblog_admin where usid='$writer'";
                    $rs2=mysqli_query($conn,$sql2);
                    $row2=mysqli_fetch_array($rs2);
                    ?>
                    <input type="password" name="uspw" value="<?php echo $row2["uspw"]?>">
                <?php }
                    else if($_SESSION["id"]==$row["writer"]){
                    $sql3="select * from myblog_admin where usid='admin'";
                    $rs3=mysqli_query($conn,$sql3);
                    $row3=mysqli_fetch_array($rs3);
                    ?>
                    <input type="password" name="uspw" value="<?php echo $row3["uspw"]?>">
                <?php
                    } } else{?>
                    <input type="password" name="uspw">
                <?php }?>
                <input type="hidden" name="writer" value="<?php echo $writer?>">
                <input type="hidden" name="no" value="<?php echo $no?>">
                <input type="submit" value="전송">
            </form>
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