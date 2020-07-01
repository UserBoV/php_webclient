<?php
        include_once "./import.php";
        include "./config.php";
        include_once "./header.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PlayGround</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
  </div>
<div class="jumbotron">
    <h1 class="display-4">PlayGround에 오신것을 환영합니다.</h1>
    <p class="lead">현재 개발중입니다.</p>
    <hr class="my-4">
    <p>다양한 옵션을 개발중입니다.</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="about_service.php" role="button">더 확인하러 가기</a>
    </p>
</div>
  <div class="row">
    <div class="col-sm">
    <?php include_once "./login_form.php"?>
    </div>
    <div class="col-sm">
    <?php include_once "./create_account_form.php"?>
    </div>
  </div>
</div>
  </body>
</html>