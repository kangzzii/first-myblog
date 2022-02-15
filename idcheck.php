<?php
include "include.php";
$id=$_GET["usid"];
// echo $id;
$sql="select * from myblog_admin where usid='$id'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Id중복체크</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div align="center" style="margin-top:50px">
        <?php if($row["usid"]){?>
        이미 사용중인 아이디 입니다.
        
        <div style="width:100px;height:30px;text-align:center;line-height:30px;background-color:orange;color:white;display:inline-block;">
            <a href="javascript:re()">다시작성 하기</a>
        </div>
        <?php } else{?>
        사용가능한 아이디입니다.
        <div style="width:100px;height:30px;text-align:center;line-height:30px;background-color:seagreen;color:white;display:inline-block;">
            <a href="javascript:send()">사용하기</a>
        </div>
        <?php }?>
    </div>
</body>
</html>
<script>
function re(){
    opener.document.signupf.usid.value="";
    opener.document.signupf.usid.focus();
    self.close();
}
function send(){
    opener.document.signupf.usidok.value="ok";
    opener.document.signupf.uspw.focus();
    self.close();
}
</script>