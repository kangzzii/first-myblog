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
                <li><a href="board.php">Board ▼</a></li>
                <li><a href="inc.php">Inc</a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>게시판</h1>
            <br>
            <br>
            <hr>
    </div>
    <div id="notice">
        <table class="board_write_table">
            <tr>
                <td colspan="2" align="center" style="background-color:white">
                    <b>게시판 내용 보기</b>
                </td>
            </tr>
            <?php
            $no=$_GET["no"];
            $sql="update board set hit=hit+1 where no=$no";
            $rs=mysqli_query($conn,$sql);
            $sql="select * from board where no=$no";
            $rs=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($rs);
            ?>
            <tr>
                <td style="width:100px">글 번호</td>
                <td><?php echo $row["no"]?></td>
            </tr>
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
            <tr>
                <td>조회수</td>
                <td><?php echo $row["hit"]?></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" value="list" class="board_write_bt" style="background-color:blue" onclick="location.href='board.php'">
                <?php if(isset($_SESSION["id"])){
                        if($_SESSION["id"]==$row["writer"]){    
                ?>
                    <input type="button" value="수정" class="board_write_bt" style="background-color:orange" 
                    onclick="location.href='board_edit.php?no=<?php echo $no?>'">
                    <input type="button" value="삭제" class="board_write_bt" style="background-color:crimson"  onclick="del()">
                <?php } else if($_SESSION["id"]=="admin"){?>
                    <input type="button" value="수정" class="board_write_bt" style="background-color:orange" 
                    onclick="location.href='board_edit.php?no=<?php echo $no?>'">
                    <input type="button" value="삭제" class="board_write_bt" style="background-color:crimson"  onclick="del()">
                <?php } }?>
                </td>
            </tr>
            <script>
                function del(){
                    if(confirm("삭제하시겠습니까?")){
                        location.href="board_del.php?no=<?php echo $no?>";
                    }
                }
            </script>
        </table>
        <br><br><br>
        <div style="width:1250px;flex-wrap:wrap">
            <!-- 댓글 시작 -->
            <?php
                $sql="select * from board_re where p_no=$no";
                $rs2=mysqli_query($conn,$sql);
                while($row2=mysqli_fetch_array($rs2)){
            ?>
                 <div class="board_re_box">
                    <div class="board_re_writer">
                        <?php echo $row2["writer"]?>
                    </div>
                <?php if(isset($_SESSION["id"])){
                        if($_SESSION["id"]==$row2["writer"]){
                    ?>
                    <div class="board_re_del">
                        <a href="javascript:del_re(<?php echo $row2["no"]?>,<?php echo $no?>)">댓글 삭제</a>
                    </div> 
                <?php } }?>
                    <div class="board_re_content">
                        <h5 style="text-indent:10px"><?php echo $row2["writeday"]?></h5>
                        <h3 style="text-indent:10px"><?php echo $row2["memo"]?></h3>
                    </div>
                </div>
                <!-- 댓글 삭제 스크립트 -->
                <script>
                    function del_re(no,p_no){
                        if(confirm("정말로 삭제하시겠습니까?")){
                            location.href="board_re_del.php?no="+no+"&p_no="+p_no;
                        }
                    }
                </script>
                <!-- 댓글 삭제 스크립트 끝 -->
            <?php }?>
            <!-- 댓글 끝 -->
        </div>
        <div align="center" style="width:1200px;height:50px;margin-top:30px">
            <form name="frm1" method="post" action="board_content_re.php">
                <input type="text" name="memo" size="50" required class="board_write_text" style="border-bottom:1px solid lightgray">
                <input type="hidden" name="p_no" value="<?php echo $row["no"]?>">
                <input type="submit" value="댓글" class="board_write_bt" style="background-color:#333">
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