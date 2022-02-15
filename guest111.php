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
                <li><a href="board.php">Board </a></li>
                <li><a href="inc.php">Inc</a></li>
                <li><a href="guest.php">Guest ▼</a></li>
                <li><a href="qna.php">Q&A</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>질문과 답변</h1>
            <br>
            <br>
            <hr>
    </div>
    <div id="notice">
        <form name="frm1" method="post">
            <!-- 원글 시작 -->
            <div id="inputData">
                <h3>방명록 쓰기</h3>
                <textarea name="memo" rows="5"cols="80"> </textarea>
                <!-- 로그인 했을때만 버튼이 나타나게 -->
                <?php if(isset($_SESSION["id"])){?>
                    <input type="button" value="글 남기기" class="guest_write_bt" onclick="gotoGuest()">
                <?php } ?>
                <!-- 로그인 했을때만 버튼이 나타나게 끝 -->
                <!-- 방명록 원글 스크립트 -->
                <script>
                    function gotoGuest(){
                        if(frm1.memo.value==""){
                            alert("내용을 입력하세요");
                            frm1.emmo.focus();return false;
                        }else{
                            document.frm1.action="guest_write_ok.php";
                            document.frm1.submit();
                        }
                    }
                </script>
                <!-- 방명록 원글 스크립트 끝-->
            </div>
            <!-- 방명록 원글이 작성될 루틴 박스 -->
            <?php
            $sql="select * from guest order by no desc";
            $rs=mysqli_query($conn,$sql);
            $i=0;
            while($row=mysqli_fetch_array($rs)){
                $i++;
            ?>
            <div id="data">
                <?php echo nl2br($row["memo"])?>
                <!-- 원글에 대한 댓글 -->
                <?php
                $no=$row["no"];
                $sql2="select * from guest_re where p_no=$no";
                $rs2=mysqli_query($conn,$sql2);
                while($row2=mysqli_fetch_array($rs2)){
                ?>

                    <p>ㄴ <?php echo $row2["memo"]?> by <?php echo $row2["writer"]?></p>
            <?php } ?>
                <!-- 원글에 대한 댓글 끝 -->
                <a href="#" onclick="send('re_data<?php echo $i ?>',<?php echo $row["no"]?>)"><font color="orange">답글 작성</font></a>
                <div id="re_data<?php echo $i?>"></div>
            </div>
            <?php } ?>
            <!-- send(),reclose() 스크립트 -->
            <script>
                function send(p,p_no){
                    if(document.getElementById("re_data1")){
                        document.getElementById("re_data1").innerHTML="";
                    }
                    if(document.getElementById("re_data2")){
                        document.getElementById("re_data2").innerHTML="";
                    }
                    if(document.getElementById("re_data3")){
                        document.getElementById("re_data3").innerHTML="";
                    }
                    if(document.getElementById("re_data4")){
                        document.getElementById("re_data4").innerHTML="";
                    }
                    if(document.getElementById("re_data5")){
                        document.getElementById("re_data5").innerHTML="";
                    }
                    document.getElementById(p).innerHTML="<input type='text' name='re' size='70'> <input type='hidden' name='p_no' value='"+p_no+"'> <a href='#' onclick='resend()'>답글</a> <a href='#' onclick='reclose()'>close</a>";
                }
                function reclose(){
                    if(document.getElementById("re_data1")){
                        document.getElementById("re_data1").innerHTML="";
                    }
                    if(document.getElementById("re_data2")){
                        document.getElementById("re_data2").innerHTML="";
                    }
                    if(document.getElementById("re_data3")){
                        document.getElementById("re_data3").innerHTML="";
                    }
                    if(document.getElementById("re_data4")){
                        document.getElementById("re_data4").innerHTML="";
                    }
                    if(document.getElementById("re_data5")){
                        document.getElementById("re_data5").innerHTML="";
                    }
                }
            </script>
            <!-- send() 스크립트 끝 -->
            <!-- 방명록 원글이 작성될 루틴 박스 끝-->
         <!-- 원글 끝 -->
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