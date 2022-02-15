<?php
include "include.php";
// $no=$_POST["no"];
$writer=$_SESSION["id"];
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$step=$_POST["step"]+1;
$p_no=$_POST["p_no"];
$secret=$_POST["secret"];
$sql="insert into qna2 (writer,title,content,writeday,step,p_no,secret) values('$writer','$title','$content','$writeday',$step,$p_no,'$secret')";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0;url='qna.php'">