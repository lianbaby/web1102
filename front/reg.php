<fieldset>
    <legend>會員註冊</legend>
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
</fieldset>

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
                            alert("註冊完成，歡迎加入");
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