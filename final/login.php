<?php
    include_once "./db/db_con.php";
    $id = $_POST["login_id"];
    $pw = $_POST["login_pw"];

   $sql = "select * from account where id='$id' ";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) {
     echo("
           <script>
             alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else{
        $row = mysqli_fetch_array($result);
        $db_pw = $row["pw"];

        mysqli_close($con);

        if($pw != $db_pw){

           echo("
              <script>
                alert('비밀번호가 틀립니다!');
                history.go(-1);
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["userid"] = $row["id"];
            $_SESSION["username"] = $row["name"];

            echo("
              <script>
                alert('로그인 되었습니다');
                location.href = 'index.php';
              </script>
            ");
        }
     }
?>
