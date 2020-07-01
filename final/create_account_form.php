<script>

    $(function(){
        $("#join_id").blur(function(){
            if($(this).val()==""){
                $("#id_join_check").html("아이디를 입력하세요").css("color" , "red").attr("id-check","1");
            }else{
                check_id_ajax();
            }
        });
        $("#join_ag_pw").blur(function(){
          if($(this).val()==""){
            $("#pw_join_check").html("비밀번호를 입력하세요").css("color" , "red");
          }else{
            if($(this).val()==$("#join_pw").val()){
                $("#pw_join_check").html("비밀번호가 일치합니다").css("color" , "green");
            }else{
              $("#pw_join_check").html("비밀번호가 일치하지 않습니다").css("color" , "red");
            }
          }
        });
        $("#join_pw").blur(function(){
          var getCheck= RegExp(/^[a-zA-Z0-9]{4,12}$/);
          if($(this).val()==""){
            $("#pw_join_check").html("비밀번호를 입력하세요").css("color" , "red");
          }else{
            if(getCheck.test($("#join_pw").val())){
              if($(this).val()==$("#join_ag_pw").val()){
                $("#pw_join_check").html("비밀번호가 일치합니다").css("color" , "green");
              }else{
                $("#pw_join_check").html("비밀번호가 일치하지 않습니다").css("color" , "red");
              }
            }else{
              $("#pw_join_check").html("비밀번호가 너무 짧습니다").css("color" , "red");
            }

          }
        });
    })
    function check_id_ajax(){
        $.ajax({
            url : "./id_check.php",
            type : "post",
            dataType: "json",
            data :{
                id : $("#join_id").val()
          },
            success : function (data){
              if(data.check){
                $("#id_join_check").html("사용 가능한 아이디입니다.").css("color" , "green")
              }else{
                $("#id_join_check").html("이미 존재하는 아이디입니다.").css("color" , "red")
              }
            }
          });
    }
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
  <button class="btn btn-primary btn-lg btn-block" type="button" data-toggle="collapse" data-target="#create_collapse" aria-expanded="false" aria-controls="create_collapse">
    회원가입
  </button>
<div class="collapse" id="create_collapse">
  <div class="card card-body">
  <form class="needs-validation visible" method = "post" action = "create_account.php" novalidate >
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="join_id">아이디</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">>></span>
        </div>
        <input type="text" class="form-control"id="join_id" name = "join_id" placeholder="아이디" aria-describedby="inputGroupPrepend" required>
      </div>
      <div name = "id_join_check" id = "id_join_check"></div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="join_name">이름</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">>></span>
        </div>
        <input type="text" class="form-control"id="join_name" name = "join_name" placeholder="이름" aria-describedby="inputGroupPrepend" required>
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 mb-3">
      <label for="join_pw">비밀번호</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">>></span>
        </div>
        <input type="password" class="form-control" id="join_pw" name = "join_pw" placeholder="비밀번호" aria-describedby="inputGroupPrepend" required>
      </div>
    </div>
    <div class="col-md-6 mb-3">
      <label for="join_ag_pw">비밀번호 확인</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">>></span>
        </div>
        <input type="password" class="form-control" id="join_ag_pw" name = "join_ag_pw" placeholder="비밀번호 확인" aria-describedby="inputGroupPrepend" required>
      </div>
      <div name = "pw_join_check" id = "pw_join_check"></div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit" id = "join_account">완료</button>
</form>  
</div>
</div>