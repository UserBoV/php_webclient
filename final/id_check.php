<?php
    include_once "./db/db_con.php";
    !empty($_POST["id"]) ? $id = $_POST['id'] : $id = "";
    $ret["check"] = false;

    if($id!=""){
        $query = "select
                    id
                from
                    account
                where
                    id = '$id'
        ";

        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_array($result);
        if($row==0){
            $ret["check"] = true;
        }else{
            $ret["check"] = false;
        }
    }
    echo json_encode($ret);
?>