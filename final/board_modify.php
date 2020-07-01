<?php
include_once "./import.php";
include_once "./config.php";
include_once "./db/db_con.php";
include_once "./header.php";

!empty($_POST["img_url"]) ? $img_url = $_POST['img_url'] : $img_url = "";
!empty($_POST["remove_content"]) ? $remove_content= $_POST['remove_content'] : $remove_content = "";

$sql = "DELETE from images where num = '$remove_content'";
if(mysqli_query($con,$sql)){
    unlink($img_url);
    echo "
    <script>
                alert('삭제 했습니다');
                location.href = 'board.php';
    </script>
    ";
}
?>