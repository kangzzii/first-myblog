<?php
include "include.php";
$no=$_GET["no"];
$sql="update qna2 set title='삭제된 질문입니다.',writer='',writeday='',content=''where no=$no";
mysqli_query($conn,$sql);
?>
<script>
alert("삭제되었습니다.")
</script>
<meta http-equiv="refresh" content="0,url='qna.php'">