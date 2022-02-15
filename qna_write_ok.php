<?php
include "include.php";
$writer=$_SESSION["id"];
$title=$_POST["title"];
$content=$_POST["content"];
$writeday=date("Y-m-d");
$step=0;
$sql="select ifnull(max(p_no),0)+1 as p_no from qna2";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
$p_no=$row["p_no"];
if(isset($_POST["secret"])){
    $secret=1;
}else{
    $secret=0;
}
// echo$secret;
$sql2="insert into qna2 (writer,title,content,writeday,step,p_no,secret) values ('$writer','$title','$content','$writeday',$step,$p_no,'$secret')";
mysqli_query($conn,$sql2);
?>
<meta http-equiv="refresh" content="0;url='qna.php'">