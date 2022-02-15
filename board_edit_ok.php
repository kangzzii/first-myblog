<?php
include "include.php";
$no=$_POST["no"];
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$sql="update board set title='$title',content='$content',writeday='$writeday'where no=$no;";
mysqli_query($conn,$sql);
?>
<meta http-equiv="refresh" content="0,url='board.php'">