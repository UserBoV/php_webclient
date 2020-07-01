<script>
$(function(){
        $("a1").click(function(){
            alert('로그인하세요!');
        });
    });
</script>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="index.php">
        <img src="./img/chat_icon.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            PlayGround
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
        <?php
            if($userid==""){
                ?><a1 class="nav-link" href = "#" id = "modify_account">채팅방</a1><?php
            }else{?>
            <a class="nav-link" href="chat_box.php">채팅방<span class="sr-only">(current)</span></a>
            <?php } ?>
        </li>
        <li class="nav-item active">
            <?php
            if($userid==""){
                ?><a1 class="nav-link" href = "#" id = "modify_account">계정 정보</a1><?php
            }else{?>
                <a class="nav-link" href = "#"><?=$userid."님으로 로그인 했습니다."?></a>
                <?php
            }
            ?>
        </li>
        <li class="nav-item active">
        <?php
            if($userid==""){
                ?><a1 class="nav-link" href = "#" id = "modify_account">유저리스트</a1><?php
            }else{?>
                <a class="nav-link" href="user.php">유저 리스트</a>
                <?php
            }
            ?>
        </li>
        <li class="nav-item active">
        <?php
            if($userid==""){
                ?><a1 class="nav-link" href = "#" id = "modify_account">게시판</a1><?php
            }else{?>
                <a class="nav-link" href="board.php">게시판</a>
                <?php
            }
            ?>
        </li>
        </ul>
    </div>
</nav>