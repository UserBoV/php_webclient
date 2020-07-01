<?php
    include_once "./db/db_con.php";

    $id   = $_POST["join_id"];
    $pw = $_POST["join_pw"];
    $pw_check = $_POST["join_ag_pw"];
    $name = $_POST["join_name"];


    $query = "select id from account where id = '$id'  ";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    if($id==$pw){
        echo "
        <script>
            alert('아이디와 비밀번호가 같습니다!');
            history.go(-1);
        </script>
        ";
    }

    


    if($row==0&&($pw===$pw_check)){
        $sql = "insert into account (id, pw, name) values ('$id', '$pw', '$name')";
        if(mysqli_query($con, $sql)){
            echo "
            <script>
                location.href = 'index.php';
                alert('회원가입이 완료되었습니다');
            </script>
            ";
        }else{
            echo mysqli_error($con);
            echo "
            <script>
                alert('에러가 발생했습니다.잠시후 다시 시도해 주세요');
                location.href = 'index.php';
            </script>
            ";
        }
        mysqli_close($con);
    }else{
        echo "
        <script>
            alert('아이디와 비밀번호를 다시 확인해 주세요');
            history.go(-1);
        </script>
        ";
    }

    
?>