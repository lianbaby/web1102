<fieldset>
    <legend>會員登入</legend>
    <table>
        <tr>
            <td>帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <!-- 注意，在取function名字時，不要取到保留字，例如clear -->
            <td><button onclick="login()">登入</button></td>
            <td><button onclick="reset()">清除</button></td> 
            <td>
                <a href="?do=forgot">忘記密碼</a>
                <a href="?do=reg">尚未註冊</a>
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reset(){
        $("#acc,#pw").val('');
    }

    function login(){
        let user ={ //去抓帳號、密碼的value
            acc:$("#acc").val(),
            pw:$("#pw").val()
        }
        .post("./api/chk_acc.php",user,(result)=>{ //.post傳送資料        
            if(parseInt(result)===1){ //拿到的result解析成數字
                //有此帳號
                $.post("./api/chk_pw.php",user,(result)=>{
                    if(parseInt(result)===1){
                        //帳密正確
                        if(user.acc==='admin'){ //如果是管理者，到後台
                            location.href='back.php';
                        }else{
                            location.href='index.php'; //其他就是到首頁
                        }
                    }else{
                        //密碼錯誤
                        alert("密碼錯誤");
                    }
                })
            }else{
                //無此帳號
                alert("查無帳號");
            }
        })
    }
</script>


