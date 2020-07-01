<?php
    include_once "./config.php";
    include_once "./db/db_chat_con.php";
    include_once "./db/db_con.php";

    !empty($_POST["rec_id"]) ? $rec_id = $_POST['rec_id'] : $rec_id = "";
    !empty($_POST["content"]) ? $chat_content = $_POST['content'] : $chat_content = "";

    if($rec_id!=""&&$chat_content!=""){
        $box_num;
        $sql1 = "SELECT gg.box_num from chat_cont as gg
                    JOIN chat_cont as s
                    ON s.box_num = gg.box_num
                    where( gg.id = '$rec_id' and s.id = '$userid')
        ";
        $result1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $box_num = $row1['box_num'];
        $sql = "insert into $box_num
                    (id,content,chat_date)
                values
                    ('$userid','$chat_content',NOW())
        ";
        if(mysqli_query($chat_con,$sql)){
            $ret = true;
        }else{
            $ret = false;
        }
    }
    echo json_encode($ret);
?>