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
    <script src="//code.jquery.com/jquery-1.12.3.min.js"></script>
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
                <li><a href="inc.php">Inc ▼</a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>자료실</h1>
            <br>
            <br>
            <hr>
    </div>
    <div id="notice">
        <form name="frm1" enctype="multipart/form-data" method="post" action="inc_write_ok.php">
            <!-- inc 가져오기 시작 -->
            <?php
            $no=$_GET["no"];
            $sql="update inc set hit=hit+1 where no=$no";
            $rs=mysqli_query($conn,$sql);
            $sql="select * from inc where no=$no";
            $rs=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($rs);
            ?>
            <table class="board_write_table">
                <tr>
                    <td>제목</td>
                    <td><input type="text" name="title"value="<?php echo $row["title"]?>" readonly class="board_write_text"></td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td><input type="text" name="writer"value="<?php echo $row["writer"]?>" readonly class="board_write_text"></td>
                </tr>
                <tr>
                    <td>작성일</td>
                    <td><input type="text" name="writeday"value="<?php echo $row["writeday"]?>" readonly class="board_write_text"></td>
                </tr>
                <tr>    
                    <td>조회수</td>
                    <td><?php echo $row["hit"]?></td>
                </tr>
                <tr>
                    <td>파일명</td>
                    <td>
                        <a href="down.php?fname=<?php echo $row["fname"]?>">
                            <b> <?php echo $row["fname"] ?></b>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>첨부파일</td>
                    <td>
                        <?php
                        $fname="../file/".$row["fname"];
                        ?>
                        <img src="<?php echo $fname?>">
                    </td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td>
                        <textarea name="content" readonly cols="100" rows="10" class="board_write_textarea" >
                        <?php echo $row["content"]?>
                        </textarea>
                    </td>
                </tr>
                <!-- inc 가져오기 끝 -->
                <tr>
                    <td colspan="2" style="background-color:white">
                        <!-- 글쓴이& 관리자 만 삭제 가능해야하니까 -->
                        <?php
                            if(isset($_SESSION["id"])){
                                if($_SESSION["id"]==$row["writer"]){
                        ?>
                            <input type="button" value="삭제하기" onclick="del_inc()" class="inc_re_bt" style="background-color:red">
                        <?php
                                }else if($_SESSION["id"]=="admin"){
                        ?>
                                <input type="button" value="삭제하기" onclick="del_inc()" class="inc_re_bt" style="background-color:red">
                        <?php            
                                } }
                        ?>
                            <!-- 삭제 스크립트 -->
                            <script>
                                function del_inc(){
                                    if(confirm("정말로 삭제 하시겠습니까?")){
                                        location.href="inc_del.php?no=<?php echo $row["no"]?>&fname=<?php echo $row["fname"]?>"
                                    }
                                }
                            </script>
                            <!-- 삭제 스크립트 끝 -->
                        <!-- 글쓴이& 관리자 만 삭제 가능해야하니까 끝-->

                        <input type="button" value="돌아가기" onclick="location.href='inc.php'" class="inc_re_bt">
                    </td>
                </tr>
            </table>
        </form>
        <form name="frm2" method="post" action="inc_content_re.php">
            <!-- 별점? -->
            <div id="point_box">
                    <div class="grade_btM" onclick="M_bt()">-</div>
                    <input type="radio" name="point" value="0" checked>0
                    <input type="radio" name="point" value="10">10
                    <input type="radio" name="point" value="20">20
                    <input type="radio" name="point" value="30">30
                    <input type="radio" name="point" value="50">50
                    <div class="grade_btP" onclick="P_bt()">+</div>
                <input type="hidden" name="result" value="0">
                <!-- 별점 스크립트 제이쿼리도 같이 돌아감!-->
                <script>
                    $(function(){
                        
                        var idx=0;
                        var point=document.getElementsByName("point");
                        $(".grade_btM").click(function(){
                            if(idx!=0){
                                idx--;
                            }
                            point[idx].checked=true;
                            frm2.result.value=point[idx].value;//result에 찍은값 넣기
                        })
                        $(".grade_btP").click(function(){
                            if(idx!=4){
                                idx++
                            }
                            point[idx].checked=true;
                            frm2.result.value=point[idx].value;//result에 찍은값 넣기
                        })
                        //위에 문장만 사용하면 라디오를 직접 클릭하면 result에 값이 안올라옴.!! 값올라오게 하기 위한 문장임~
                        //1)input타입에서 name='포인트'인데 종류가 radio인것!을 골라내고
                        $("input[name='point']:radio").click(function(){
                            for(i=0;i<5;i++){ //3)기억시키기 위해서 idx를 for문장을 돌려서
                                if(point[i].checked==true){ //4)point[i]값이 참일때 까지 돌려서 참이면
                                    idx=i; //5)참일때i값을 idx로 보내줘서 +-일때도 순서를 기억해서 올바르게 움직이게 바꿔준다!
                                }
                            }
                            frm2.result.value=this.value;//2)라디오 의 벨류값을 들고가는데 배열이 엉망 +-는 기억을 해줘야함
                        })
                    })
                </script>
                <!-- 별점 스크립트끝 -->
            </div>
            <!-- 별점 끝 -->
            <!-- 댓글기능 -->
                <!-- 댓글 작성 -->
                    <div style="margin:30px 0 30px 0;">
                        <input type="text" name="memo" class="inc_re_text_bar">
                        <input type="hidden" name="p_no" value="<?php echo $row["no"] ?>">
                        <input type="hidden"  name="sender" value="<?php echo $row["writer"]?>">
                        <input type="button" onclick="inc_re()" value="작성" class="inc_re_bt">
                    </div> 
                    <!-- 댓글 스크립트 -->
                    <script>
                        function inc_re(){
                            if(frm2.memo.value==""){
                                alert("댓글을 입력하세요.");
                                frm2.memo.focus();return false;
                            }else{
                                document.frm2.submit();
                            }
                        }
                    </script>
                    <!-- 댓글 스크립트 끝 -->
        </form>
            <!-- 댓글 작성 끝 -->
            <!-- 댓글 보기 -->
            <?php
            $sql="select * from inc_re";
            $rs=mysqli_query($conn,$sql);
            ?>
            <table class="inc_content_re_table">
                <?php
                while($row=mysqli_fetch_array($rs)){
                ?>
                <tr>
                    <td>작성자 : <?php echo $row["writer"]?><br>
                        작성일 : <?php echo $row["writeday"]?>
                    </td>
                    <td><?php echo $row["memo"]?></td>
                    <!-- 댓글 작성자 관리자만 지울수 있어야함 -->
                    <?php
                    if(isset($_SESSION["id"])){
                        if($_SESSION["id"]==$row["writer"]){
                    ?>
                    <td style="width:100px;text-align:center;background-color:crimson;color:white;">
                        <a href="javascript:inc_re_del(<?php echo $row["no"]?>,<?php echo $row["p_no"]?>)">댓글 삭제</a>
                    </td>
                    <?php }else if($_SESSION["id"]=="admin"){
                    ?>
                    <td style="width:100px;text-align:center;background-color:crimson;color:white;">
                        <a href="javascript:inc_re_del(<?php echo $row["no"]?>,<?php echo $row["p_no"]?>)">댓글 삭제</a>
                    </td>
                    <?php
                    } }?>
                        <!-- 댓삭 스크립트 -->
                        <script>
                            function inc_re_del(no,p_no){
                                if(confirm("정말로 삭제 하시겠습니까?")){
                                    location.href="inc_re_del.php?no="+no+"&p_no="+p_no;
                                }
                            }
                        </script>
                        <!-- 댓삭 스크립트 끝 -->
                     <!-- 댓글 작성자 관리자만 지울수 있어야함 끝 -->
                </tr>
                <?php }?>
            </table>
            <!-- 댓글 보기 끝 -->
        <!-- 댓글기능 끝 -->
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