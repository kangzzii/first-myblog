<?php
include "include.php";
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$writer="관리자";
$sql="insert into notice (title,content,writeday,writer) values('$title','$content','$writeday','$writer')";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0,url='notice.php'">