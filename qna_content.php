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
        <!-- 비밀글 여부 따지기 -->
        <?php 
            $no=$_GET["no"];
            $sql1="select secret from qna2 where no=$no";
            $rs1=mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($rs1);
            // echo$row1["secret"];
            if($row1["secret"]=="1"){
                $secretok=$_GET["secretok"];
                if(isset($secretok)){
            ?>
            <table class="board_write_table">
                <tr>
                    <td colspan="2" align="center" style="background-color:white">
                        <b>질문과답변 내용 보기</b>
                    </td>
                </tr>
                <?php
                $no=$_GET["no"];
                $sql="select * from qna2 where no=$no";
                $rs=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($rs);
                ?>
                <tr>
                    <td>글 제목</td>
                    <td><?php echo $row["title"]?></td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td><?php echo $row["writer"]?></td>
                </tr>
                <tr>
                    <td>작성일</td>
                    <td><?php echo $row["writeday"]?></td>
                </tr>
                <tr>
                    <td>글내용</td>
                    <td><?php echo nl2br($row["content"])?></td>
                </tr>
                <!-- qna 버튼 -->
                <tr>
                    <td colspan="2" align="center" style="background-color:white">
                        <input type="button" value="list" class="board_write_bt" 
                        style="background-color:blue" onclick="location.href='qna.php'">
                    <!-- 답변하기 기능은 admin만 -->
                    <?php if(isset($_SESSION["id"])){
                            if($_SESSION["id"]=="admin"){?>
                        <input type="button" value="답변하기" class="board_write_bt" 
                        style="background-color:seagreen" 
                        onclick="send(<?php echo $row["p_no"]?>,<?php echo $row["step"]?>,<?php echo $no?>,<?php echo $row["secret"]?>)">
                        <input type="button" value="글 전체 삭제" class="board_write_bt" 
                        style="background-color:crimson"  onclick="del_admin()">
                    <?php } ?>
                        <!-- 답변하기 스크립트 -->
                        <script>
                            function send(p_no,step,no,secret){
                                location.href="qna_write_re.php?p_no="+p_no+"&step="+step+"&no="+no+"&secret="+secret;
                            }
                            function del_admin(){
                                if(confirm("삭제하시겠습니까?")){
                                    location.href="qna_all_del.php?p_no=<?php echo $row["p_no"]?>";
                                }
                            }
                        </script>
                        <!-- 답변하기 스크립트 끝 -->
                    <!-- 답변하기 기능은 admin만 끝 -->
                    <!-- 수정 삭제 기능은 작성자만  -->
                    <?php if($_SESSION["id"]==$row["writer"]){ ?>
                        <input type="button" value="수정" class="board_write_bt" style="background-color:orange" 
                        onclick="location.href='qna_edit.php?no=<?php echo $no?>'">
                        <input type="button" value="삭제" class="board_write_bt" 
                        style="background-color:crimson"  onclick="del()">
                    <?php } }?>
                        <!-- 수정삭제 스크립트 -->
                        <script>
                            function del(){
                                if(confirm("삭제하시겠습니까?")){
                                    location.href="qna_del.php?no=<?php echo $row["no"]?>";
                                }
                            }
                        </script>
                        <!-- 수정삭제 스크립트 끝 -->
                    <!-- 수정 삭제 기능은 작성자만  -->
                    </td>
                </tr>
                <!-- qna버튼 끝 -->
            </table>
            <?php }else{ ?>
                  <h1>비밀글 입니다.</h1>  
            <?php } } else if($row1["secret"]=="0"){?>
            <!-- 비밀글 여부 따지기 끝 -->
        <table class="board_write_table">
            <tr>
                <td colspan="2" align="center" style="background-color:white">
                    <b>질문과답변 내용 보기</b>
                </td>
            </tr>
            <?php
            $no=$_GET["no"];
            $sql="select * from qna2 where no=$no";
            $rs=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($rs);
            ?>
            <tr>
                <td>글 제목</td>
                <td><?php echo $row["title"]?></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><?php echo $row["writer"]?></td>
            </tr>
            <tr>
                <td>작성일</td>
                <td><?php echo $row["writeday"]?></td>
            </tr>
            <tr>
                <td>글내용</td>
                <td><?php echo nl2br($row["content"])?></td>
            </tr>
            <!-- qna 버튼 -->
            <tr>
                <td colspan="2" align="center" style="background-color:white">
                    <input type="button" value="list" class="board_write_bt" 
                    style="background-color:blue" onclick="location.href='qna.php'">
                <!-- 답변하기 기능은 admin만 -->
                <?php if(isset($_SESSION["id"])){
                        if($_SESSION["id"]=="admin"){?>
                    <input type="button" value="답변하기" class="board_write_bt" 
                    style="background-color:seagreen" 
                    onclick="send(<?php echo $row["p_no"]?>,<?php echo $row["step"]?>,<?php echo $no?>)">
                    <input type="button" value="글 전체 삭제" class="board_write_bt" 
                    style="background-color:crimson"  onclick="del_admin()">
                <?php } ?>
                    <!-- 답변하기 스크립트 -->
                    <script>
                        function send(p_no,step,no){
                            location.href="qna_write_re.php?p_no="+p_no+"&step="+step+"&no="+no;
                        }
                        function del_admin(){
                            if(confirm("삭제하시겠습니까?")){
                                location.href="qna_all_del.php?p_no=<?php echo $row["p_no"]?>";
                            }
                        }
                    </script>
                    <!-- 답변하기 스크립트 끝 -->
                <!-- 답변하기 기능은 admin만 끝 -->
                <!-- 수정 삭제 기능은 작성자만  -->
                <?php if($_SESSION["id"]==$row["writer"]){ ?>
                    <input type="button" value="수정" class="board_write_bt" style="background-color:orange" 
                    onclick="location.href='qna_edit.php?no=<?php echo $no?>'">
                    <input type="button" value="삭제" class="board_write_bt" 
                    style="background-color:crimson"  onclick="del()">
                <?php } }?>
                    <!-- 수정삭제 스크립트 -->
                    <script>
                        function del(){
                            if(confirm("삭제하시겠습니까?")){
                                location.href="qna_del.php?no=<?php echo $row["no"]?>";
                            }
                        }
                    </script>
                    <!-- 수정삭제 스크립트 끝 -->
                <!-- 수정 삭제 기능은 작성자만  -->
                </td>
            </tr>
            <!-- qna버튼 끝 -->
        </table>
        <?php }?>
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