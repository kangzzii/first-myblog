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
            <p class="i1">회원 가입</p>
            
        </div>
     </div>
    <section>
    <div class="g4">
            <br>
            <h1>회원 가입</h1>
            <br>
            <br>
            <hr>
    </div>
    <div id="signup">
        <form name="signupf" method="POST" action="signup_ok.php">
        <table class="signup">
            <tr>
                <th>아이디</th>
                <td><input type="text" class="signup1" name="usid"
                    placeholder="아이디를 입력해주세요">
                    <input type="button" value="ID 중복확인" class="signup2" onclick="idcheck()">
                    <input type="hidden" class="signup1" name="usidok">
                    <script>
                        function idcheck(){
                            if(signupf.usid.value==""){
                                alert("아이디를 입력하세요.")
                                signupf.usid.focus();return false;
                            }
                                window.open("idcheck.php?usid="+signupf.usid.value,"pop","width=400,height=150")
                            
                        }
                    </script>
                </td>
            </tr>
            <tr>
                <th>비밀번호</th>
                <td><input type="password" class="signup1" name="uspw"
                    placeholder="비밀번호를 입력해주세요"></td>
            </tr>
            <tr>
                <th>비밀번호 재확인</th>
                <td><input type="password"class="signup1" name="uspwc"
                     placeholder="비밀번호를 입력해주세요">   
                </td>
            </tr>
            <tr>
                <th>이름</th>
                <td><input type="text" class="signup1" name="usname"
                    placeholder="이름을 입력해주세요"></td>
            </tr>
            <tr>
                <th>생년월일<span style="color: gray;font-size: small;">(선택)</span></th>
                <td><input type="date" class="signup1" name="usbd"></td>
            </tr>
            <tr>
                <th>성별<span style="color: gray;font-size: small;">(선택)</span></th>
                <td><input type="radio" name="gender" value="남성">남성
                    <input type="radio" name="gender" value="여성">여성
                </td>
            </tr>
            <tr>
                <th>이메일</th>
                <td><input type="text"class="signup1" name="usemail"></td>
            </tr>
            <tr>
                <th>최종학력<span style="color: gray;font-size: small;">(선택)</span></th>
                <td><select class="signup1" name="grade">
                        <option vlaue="중졸">중졸</option>
                        <option vlaue="고졸">고졸</option>
                        <option vlaue="대졸">대졸</option>
                        <option vlaue="대학원졸">대학원졸</option>
                     </select></td>
            </tr>
            <tr>
                <th>취미<span style="color: gray;font-size: small;">(선택)</span></th>
                <td>
                    <input type="checkbox" value="등산" name="hobby[]">등산
                    <input type="checkbox" value="운동" name="hobby[]">운동
                    <input type="checkbox" value="음악감상" name="hobby[]">음악감상
                    <input type="checkbox" value="영화" name="hobby[]">영화
                
                </td>
            </tr>
            <tr>
                <th>기타<span style="color: gray;font-size: small;">(선택)</span></th>
                <td><textarea class="signup3" cols="100" rows="10" name="memo" placeholder="요구사항 혹은 남기고 싶은 말을 적어주세요"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="reset" value="다시작성" class="signup2"
                    style="background-color: rgb(58, 0, 0);color: white;
                        float:left;">
                    <input type="button" value="가입하기" class="signup2" onclick="send()"
                    style="background-color:#506d84;color: white;float:right;">
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
        if(signupf.usid.value==""){alert("ID를 입력하세요");signupf.usid.focus();return false;}
        if(signupf.usidok.value==""){alert("ID중복확인을 하세요");signupf.usid.focus();return false;}
        if(signupf.uspw.value==""){alert("비밀번호를 입력하세요");signupf.uspw.focus(); return false;}
        if(signupf.uspwc.value==""){alert("한번 더 비밀번호를 입력하세요");signupf.uspwc.focus(); return false;}
        if(signupf.uspw.value!=signupf.uspwc.value){alert("비밀번호가 같지 않습니다.");signupf.uspwc.focus(); return false;}
        if(signupf.usname.value==""){alert("이름을 입력하세요");signupf.usname.focus(); return false;}
        if(signupf.usemail.value==""){alert("Email을 입력하세요");signupf.usemail.focus(); return false;}

        document.signupf.submit();
    }
</script>