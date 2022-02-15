<?php
include "include.php";
$title=$_POST["title"];
$writer=$_POST["writer"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$sql="insert into board (title,writer,content,writeday) values ('$title','$writer','$content','$writeday')";
$rs=mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0,url='board.php'">