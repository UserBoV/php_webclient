<?php
        include_once "./import.php";
        include_once "./config.php";
        include_once "./header.php";
        include_once "./db/db_con.php";

        $sql = "select * from account";
        $result = mysqli_query($con, $sql);
?>
  <body>
<?php while($rows = mysqli_fetch_array($result)){
  $list_id = $rows['id'];
  $list_name = $rows['name'];
  if($list_id!=$userid){
  ?>
  <div class="card">
    <div class="card-body">
    <form method = "post" action = "chat_start.php">
      <h5 class="card-title">유저 아이디 : <?=$list_id?></h5>
      <p class="card-text" >유저 이름 : <?=$list_name?></p>
      <input type = "hidden" value = "<?=$list_id?>" name = "chat_id">
      <button type = "submit" class="btn btn-primary">1:1 채팅 시작하기</button>
    </form>
    </div>
    </div>
  </div>
<br>
<?php }};?>
</body>
</html>