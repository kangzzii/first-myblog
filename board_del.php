<?php
include "include.php";
$no=$_GET["no"];
$sql="delete from board where no=$no";
mysqli_query($conn,$sql);
?>
<script>
    alert("삭제되었습니다.")
    history.go(-2);
</script>
<?php
?>
