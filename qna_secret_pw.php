<?php
include "include.php";
$uspw=$_POST["uspw"];
$usid=$_POST["writer"];
$no=$_POST["no"];
// echo $no;echo$uspw;
$sql="select * from myblog_admin where usid='$usid' and uspw='$uspw'";
$rs=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($rs);
// echo$row["usid"];
if(isset($row["uspw"])){
    $secretok="1"
?>
    <script>
        location.href="qna_content.php?secretok=<?php echo $secretok?>& no=<?php echo $no?>";
    </script>
<?php
} else{
?>
    <script>
        alert("비밀번호가 정확하지 않습니다.");
        location.href="qna_secret_content.php?no=<?php echo $no?>&writer=<?php echo $usid?>";
    </script>
<?php
}
?>