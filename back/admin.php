<fieldset>
    <legend>帳號管理</legend>

<form action="./api/del_acc.php" method="post">
<?php
    $rows=$User->all();
?>
<table>
    <tr>
        <td>帳號</td>
        <td>密碼</td>
        <td>刪除</td>
    </tr>

<?php
foreach($rows as $row){
?>    
    <tr>
        <td><?=$row['acc'];?></td>
        <!-- 用星星顯示原本的密碼 -->
        <td><?=str_repeat("*",strlen($row['pw']));?></td> 
        <td><input type="checkbox" name="del[]" value="<?=$row['id'];?>"></td>
    </tr>
<?php
}
?>
</table>

<div class="ct">
    <input type="submit" value="確定刪除">
    <input type="reset" value="清空選取">
</div>
</form>
   
    <h2>新增會員</h2>
<div style='color:red'>*請設定您要註冊的帳號及密碼(最長12個字元)</div>
<table>
    <tr>
        <td>Step1:登入帳號</td>
        <td><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td>Step2:登入密碼</td>
        <td><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td>Step3:再次確認密碼</td>
        <td><input type="password" name="pw2" id="pw2"></td>
    </tr>
    <tr>
        <td>Step4:信箱(忘記密碼時使用)</td>
        <td><input type="email" name="email" id="email"></td>
    </tr>
    <tr>
        <td>
            <button onclick="reg()">註冊</button>
            <button onclick="reset()">清除</button>
        </td>
        <td></td>
    </tr>
</table>


<script>
    function reset(){
        $("#acc,#pw,#pw2,#email").val('')
    }

    function reg(){
        let user={
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val(),
        }

        if(user.acc=='' || user.pw =='' || user.pw2=='' || user.email==''){   //檢查欄位是否有空白
            alert("不可空白");
        }else{
            if(user.pw ==user.pw2){  //檢查密碼是否相同
                $.post("./api/chk_acc.php",user,(result)=>{
                    if(parseInt(result)===1){  //檢查帳號是否重覆
                        alert("帳號重覆");
                    }else{  //新增帳號
                        $.post("./api/reg.php",user,()=>{  //ajax
                            reset(); //按下alert確定後，清除已填資料
                        })
                    }
                    

                })
        }else{    
            alert("密碼錯誤")
        }  //密碼不相同
    }
}

</script>
</fieldset>