<?php
    include_once "./import.php";
    include_once "./config.php";
    include_once "./db/db_chat_con.php";
    include_once "./db/db_con.php";
    include_once "./header.php";

          $sql1 = "SELECT gg.* from chat_cont as gg
                    JOIN chat_cont as s
                    ON s.box_num = gg.box_num
                    where gg.id not in ('$userid') and s.id='$userid';
          ";
          $result1 = mysqli_query($con,$sql1);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ChatBot</title>
  </head>
  <body>
  <?php
    while($rows1 = mysqli_fetch_array($result1)){?>

      <form class="list-group" method = "post" action = "chat_start.php">
        <button type = "submit" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><?=$rows1['id']?> 님과의 채팅방</h5>
          </div>
          <p class="mb-1">방 고유번호 : <?=$rows1['box_num']?></p>
          <small>채팅을 보려면 클릭하세요</small>
          <input type = "hidden" value = "<?=$rows1['id']?>" name = "chat_id">
        </button>
      </form>

    <?php }
  ?>
  
  </body>
</html>