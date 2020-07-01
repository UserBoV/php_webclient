<?php
    include_once "./config.php";
    include_once "./db/db_chat_con.php";
    include_once "./db/db_con.php";

    !empty($_POST["rec_id"]) ? $rec_id = $_POST['rec_id'] : $rec_id = "";
    !empty($_POST["type"]) ? $type= $_POST['type'] : $type = "";

    if($rec_id!=""){
        $box_num;
        $sql1 = "SELECT gg.box_num from chat_cont as gg
                    JOIN chat_cont as s
                    ON s.box_num = gg.box_num
                    where( gg.id = '$rec_id' and s.id = '$userid')
        ";
        $result1 = mysqli_query($con,$sql1);
        $row1 = mysqli_fetch_array($result1);
        $box_num = $row1['box_num'];
        if($type==0){
            $chat_sql = "SELECT * FROM $box_num ORDER BY chat_date ";
        }else{
            $chat_sql = "SELECT * FROM $box_num WHERE chat_date=now()";
        }

        if($result = mysqli_query($chat_con,$chat_sql)){
            $i=0;
            while($row = mysqli_fetch_array($result)){
                $line['check'][$i] = $row['content'];
                $line['id'][$i] = $row['id'];
                $i++;
            }
         }else{
            echo mysqli_error($chat_con);
        }
    }
    if($line!=null){
        echo json_encode($line,JSON_UNESCAPED_UNICODE);
    }
?>