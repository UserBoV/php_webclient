<?php
    include_once "./import.php";
    include_once "./config.php";
    include_once "./db/db_chat_con.php";
    include_once "./db/db_con.php";
    include_once "./header.php";

    if(mysqli_connect_errno()){
		echo "연결실패! ".mysqli_connect_error();
	}
	$sql = "SELECT * FROM images";
	$result = mysqli_query($con, $sql);
?>


<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col-6">
    <?php
    while($row = mysqli_fetch_array($result)){?>
        <br>
        <form class="card" style="width: 18rem;" method = "post" action = "board_modify.php">
        <img src= "<?=$row['imgurl']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?=$row['id']?>님</h5>
            <p class="card-text"><?=$row['content']?></p>
            <input type = "hidden" value = "<?=$row['imgurl']?>" name = "img_url">
            <input type = "hidden" value = "<?=$row['num']?>" name = "remove_content">
            <?php
              if($row['id']==$userid){?>
              <button type="submit" class="btn btn-primary">삭제하기</button>
            <?php  }
            ?>
        </div>
        </form>
        <br>
   <?php }?>
    </div>
    <div class="col">
    </div>
  </div>
</div>

<div class="input-group mb-3 fixed-bottom" >
    <div class="input-group-append">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contentModal">글쓰기</button>
    </div>
</div>


<div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="contentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" method="post" enctype="multipart/form-data" action = "board_insert.php">

      <div class="modal-header">
        <h5 class="modal-title" id="contentModalLabel"><?=$userid?>님의 글쓰기 페이지</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      <div class="input-group">
        <textarea name = 'content' class="form-control" aria-label="With textarea"></textarea>
        </div>
      </div>

      <div class="modal-footer">
      <input type="file" name="fileToUpload" id="fileToUpload">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <button type="submit" class="btn btn-primary">저장</button>
      </div>

    </form>
  </div>
</div>
