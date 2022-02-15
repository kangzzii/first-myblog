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
                <li><a href="notice.php">Notice ▼</a></li>
                <li><a href="board.php">Board</a></li>
                <li><a href="inc.php">Inc</a></li>
                <li><a href="guest.php">Guest</a></li>
                <li><a href="qna.php">Q&A</a></li>
                
            </ul>
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>공지사항</h1>
            <br>
            <br>
            <hr>
            <div class="i4">
            <h3><span style="color:#a7866c;font-size: small;">■</span> 주제 검색하기</h3>
            <form name="frm1">
                    <select name="opt" style="float:right;margin-right:620px;height:40px">
                        <option value="title"> 제목</option>
                        <option value="writer"> 작성자</option>
                        <option value="content">내용</option>
                        <option value="all">제목+내용</option>
                        </select>
                        <input type="text" name="keyword"
                        style="width: 600px;height: 50px;font-size: large;float: right;" class="i5">
                        <img src="images/search.png" onclick="search()" class="searchimg">
            </form>
            <script>
                function search(){
                    if(frm1.keyword.value==""){
                        alert("키워드를 입력하세요")
                    }
                    location.href="notice_search.php?opt="+frm1.opt.value+"&keyword="+frm1.keyword.value;
                }
            </script>
            </div>  
    </div>
    <div id="notice">
        <table class="i3">
            <tr>
                <td>번호</td>
                <td>제목</td>
                <td>일자</td>
            </tr>
            <?php
            if(isset($_GET["page"])){
                $page=$_GET["page"];
                $group=ceil($page/5);
            }else{
                $page=1;
                $group=1;
            }
            $startrow=($page-1)*5;
            $sql2="select count(*) as cnt from notice";
            $rs2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($rs2);
            $cnt=$row2["cnt"];
            $pagecount=ceil($cnt/5);

            $sql="select * from notice order by no desc limit $startrow,5";
            $rs=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($rs)){
            ?>
            <tr>
                <td><?php echo $row["no"]?></td>
                <td><a href="notice_content.php?no=<?php echo $row["no"]?>"><?php echo $row["title"]?></a></td>
                <td><?php echo $row["writeday"]?></td>
            </tr>
            <?php }?>
            <?php if(isset($_SESSION["id"])){
                if($_SESSION["id"]=="admin"){
                ?>
            <tr>
                <td colspan="3">
                    <input type="button" value="공지사항추가" onclick="location.href='notice_write.php'">
                </td>
            </tr>
            <?php } }?>
           </table>
           
           <div class="i6">
                <p>
                    
                    <?php
                    $groupcount=ceil($pagecount/5);
                    $startpage=($group-1)*5+1;
                    $endpage=$startpage+4;
                    if($group>1){
                        $prevpage=($group-2)*5+1;
                        echo "<a href='notice.php?page=$prevpage'>PREV</a>&nbsp;";
                    }
                    for($i=$startpage;$i<=$endpage;$i++){
                        if($i>$pagecount){break;}
                        if($i == $page){
                            echo  "<a href='notice.php?page=$i'><font color='red'><&ensp; $i &ensp;></font></a>";
                        }else{
                    ?>
                    < &ensp; <a href="notice.php?page=<?php echo $i?>"><?php echo $i?></a> &ensp; >
                    <?php } }
                    if($group<$groupcount){
                        $nextpage=$group*5+1;
                        echo "<a href='notice.php?page=$nextpage'>NEXT</a>";
                    }
                    ?>
                    
                   
                </p>
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
<script>
    function send(){
        if(form4.search.value==""){alert("검색 할 내용을 입력하세요");form4.search.focus();return false;}
        document.form4.submit();
    }
</script>