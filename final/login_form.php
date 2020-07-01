<script>
    $(function(){
        $("#login_id").blur(function(){
            if($(this).val()==""){
                $("#id_check_msg").html("아이디를 입력하세요").css("color" , "red");
            }else{
                $("#id_check_msg").html("");
            }
        });
        $("#login_pw").blur(function(){
            if($(this).val()==""){
                $("#pw_check_msg").html("비밀번호를 입력하세요").css("color" , "red");
            }else{
                $("#pw_check_msg").html("");
            }
        });
    })
</script>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
<?php
  if($userid!=""){
    ?><a role="button" class="btn btn-primary btn-lg btn-block" href = "logout.php">로그아웃</a><?php
  }
else{?>
<button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    로그인
  </button>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <form class="needs-validation visible" method = "post" action = "login.php" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="login_id">아이디</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">>></span>
        </div>
        <input type="text" class="form-control" id="login_id" name = "login_id" placeholder="아이디" aria-describedby="inputGroupPrepend" required>
      </div>
      <div name = "id_check_msg" id = "id_check_msg"></div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="login_pw">비밀번호</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">>></span>
        </div>
        <input type="password" class="form-control" id="login_pw" name = "login_pw" placeholder="비밀번호" aria-describedby="inputGroupPrepend" required>
      </div>
      <div name = "pw_check_msg" id = "pw_check_msg"></div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">확인</button>
</form>  </div>
</div>
<?php
}?>