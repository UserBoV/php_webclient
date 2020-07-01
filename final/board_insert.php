<?php
include_once "./import.php";
include_once "./config.php";
include_once "./db/db_con.php";
include_once "./header.php";

function randString($length)
    {
        $characters = "abcdefghijklmnopqrstuvwxyz";
        $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $characters .= "_";

        $string_generated = "";

        $nmr_loops = $length;
        while ($nmr_loops--){
            $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string_generated;
    }
$attach = randString(15);
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
!empty($_POST["content"]) ? $content= $_POST['content'] : $content = "";

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "파일이 너무 큽니다";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "사진 파일만 업로드 할 수 있습니다";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "파일이 업로드 되지 못했습니다";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

		$filename = $_FILES["fileToUpload"]["name"].$attach;
		$imgurl = "./uploads/".$_FILES["fileToUpload"]["name"];
        $size = $_FILES["fileToUpload"]["size"];
		$sql = "insert into images(id, content, filename, imgurl, size) values('$userid','$content','$filename','$imgurl','$size')";
        mysqli_query($con,$sql);
        echo mysqli_error($con);
        mysqli_close($con);
        echo "
            <script>
                location.href = 'board.php';
                alert('글 작성이 완료되었습니다');
            </script>
            ";
    } else {
        echo mysqli_error($con);
    }
}
?>