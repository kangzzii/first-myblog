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
                <li><a href="inc.php">Inc </a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A ▼</a></li>
                
            </ul>
        </div>
     </div>
    <section>
        <div class="g4">
                <br>
                <h1>질문과답변 > 답변하기</h1>
                <br>
                <br>
                <hr>
        </div>
        <!-- qna_re 작성 시작 -->
            <?php
            $p_no=$_GET["p_no"];
            $step=$_GET["step"];
            $no=$_GET["no"];
            $secret=$_GET["secret"];
            ?>
        <div id="notice">
            <form name="frm1" method="post" action="qna_write_re_ok.php">
                <table class="board_write_table">
                    <tr>
                        <td>제목</td>
                        <td><input type="text" name="title" placeholder="제목을 입력하세요" class="board_write_text"></td>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td>
                            <textarea name="content" cols="100" rows="10" placeholder="내용을 입력하세요" class="board_write_textarea" ></textarea>
                        </td>
                    </tr>
                    <!-- pno랑 step값 도 같이 write_re.ok에 보내야함으로! -->
                        
                        <input type="hidden" name="secret" value="<?php echo $secret ?>">
                        <input type="hidden" name="no" value=<?php echo $no?>>
                        <input type="hidden" name="p_no" value=<?php echo $p_no?>>
                        <input type="hidden" name="step" value=<?php echo $step?>>
                    <!-- 작성자 제한 두기(admin을 했을 경우에만 글 작성가능하게 만든것) -->
                    <?php if (isset($_SESSION["id"])){
                            if($_SESSION["id"]=="admin"){
                        ?>
                    <tr>
                        <td colspan="2" style="background-color:white" align="center">
                            <input type="reset" value="다시작성 하기" class="board_write_bt" style="background-color:crimson">
                            <input type="button" value="추가하기" onclick="send()" class="board_write_bt" style="background-color:skyblue">
                            <input type="button" value="뒤로가기" onclick="location.href='qna.php'" class="board_write_bt" style="background-color:#333">
                        </td>
                    </tr>
                    <?php } }?>
                    <script>
                        function send(){
                            if(frm1.title.value==""){
                                alert("제목을 입력하세요");
                                frm1.title.focus();return false;
                            }
                            if(frm1.content.value==""){
                                alert("내용을 입력하세요");
                                frm1.content.focus();return false;
                            }
                            document.frm1.submit();
                        }
                    </script>
                    <!-- 작성자 제한 두기(admin을 했을 경우에만 글 작성가능하게 만든것) 끝-->
                </table>
            </form>
        </div>
        <!-- qna_re 작성 끝 -->
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