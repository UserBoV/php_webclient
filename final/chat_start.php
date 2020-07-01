<?php
    include_once "./import.php";
    include_once "./config.php";
    include_once "./db/db_chat_con.php";
    include_once "./db/db_con.php";
    include_once "./header.php";

    if($userid==""){
        echo "
            <script>
                        alert('올바르지 않은 접근입니다');
                        location.href = 'index.php';
            </script>
    ";
    }else{
    function randString($length)
    {
        $characters = "abcdefghijklmnopqrstuvwxyz";
        $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $characters .= "_";

        $string_generated = "";

        $nmr_loops = $length;
        while ($nmr_loops--){
            $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $string_generated;
    }

    isset($_POST["chat_id"]) ? $rec_id = $_POST["chat_id"] : $rec_id = null;

    $sql = "SELECT gg.box_num from chat_cont as gg
            JOIN chat_cont as s
            ON s.box_num = gg.box_num
            where( gg.id = '$rec_id' and s.id = '$userid')";
    $res = mysqli_query($con, $sql);
    $fet = mysqli_fetch_array($res);
    mysqli_error($con);
    if($fet==null){
        $check_box=false;
        //echo "if문 진입"."<br>";
        while($check_box==false){
            //echo("while문 진입")."<br>";
            $rand = randString(10);
            $sql = "select * from chat_cont where box_num='$rand'";
            $result = mysqli_query($con,$sql);
            $fetch = mysqli_fetch_array($result);
            if($fetch == null ){
                //echo("삽입문 진입")."<br>";
                $sql = "insert into chat_cont(box_num, id) values('$rand', '$rec_id'),('$rand','$userid')";
                mysqli_query($con,$sql);
                $check_box = true;
                //echo("삽입 성공")."<br>";
                $sql = "CREATE TABLE $rand (
                            id varchar(20) not null,
                            content varchar(255) not null,
                            chat_date datetime not null
                )";
                if(mysqli_query($chat_con,$sql)){
                    //echo "테이블 성공"."<br>";
                }else{
                    //echo "테이블 실패"."<br>";
                    echo mysqli_error($chat_con);
                }
            }else{
                $check_box = false;
            }
        }
    }else{
    }
}
?>
<script>
var first = 0;
$(document).ready(function() {
        chat_show();
        $("#chat_input").keydown(function(key) {
            if (key.keyCode == 13) {
                chat_insert();
            }
        });
        $("#btn_chat").click(function() {
                chat_insert();
        });
        first = 1;
    });
function s_cur_user(chat, id){
    var result = '';
    var check_id = '<?=$userid?>';
    if(id==check_id){
        result +="<div align = 'right'>"
            +"<div class='alert alert-primary w-25 text-center' role='alert'>"
            + chat;
            +"</div>"
            +"</div>";
   }else{
        result +="<div align = 'left'>"
            +"<div class='alert alert-danger w-25 text-center' role='alert'>"
            + chat;
            +"</div>"
            +"</div>";
    }
    return result;
}
function chat_show(){
    $.ajax({
        url : "https://sir.ctsoft.kr/attendance.php",
        type : "post",
        traditional : true,
        dataType : "json",
        data:{
            student_number : "201533788",
            student_name : "오상철",
            del_pass : "dkssudgktpdyqksrkqtmqslek"
    },
        success : function(data){
            /*for(var i=0; i<(data.check).length; i++){
                $('#content').append(s_cur_user(data.check[i],data.id[i]));
            }*/
        },
        error : function(request,error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        }
    })
}
function chat_insert(){
    $.ajax({
        url : "./chat_insert.php",
        type : "post",
        dataType: "json",
        data :{
            rec_id : '<?=$rec_id?>',
            content : $("#chat_input").val()
    },
        success : function (data){
            $("#chat_input").val("");
            chat_show();
        }
    });
}
</script>
<div class="mx-auto alert alert-success" style="width: 160px;"><?=$rec_id?>님과의 대화</div>
<div class = "content" id = "content"></div>
<div class="input-group mb-3 fixed-bottom">
    <input type="text" class="form-control" id = "chat_input" placeholder="입력하세요" aria-label="chat_content" aria-describedby="button-addon2">
    <div class="input-group-append">
        <button class="btn btn-primary" type="button" id="btn_chat">전송</button>
    </div>
</div>