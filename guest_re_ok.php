<?php
include "include.php";
$re=$_POST["re"];
$p_no=$_POST["p_no"];
$page=$_POST["page"];
$writer=$_SESSION["id"];
$sql="insert into guest_re (memo,writer,p_no) values ('$re','$writer',$p_no)";
mysqli_query($conn,$sql);
?>
<script>
    alert("작성 완료")
</script>
<meta http-equiv="refresh" content="0;url='guest.php?page=<?php echo $page ?>'">