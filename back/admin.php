
<div style="margin-bottom: 20px;">
    <h2>帳號管理</h2>
    <form action="./api/del_user.php" method="post" style="width: 80%; margin: auto">
        <table style="width: 100%;">
            <tr style="text-align: center; background-color: lightgray;">
                <td>帳號</td>
                <td>密碼</td>
                <td>刪除</td>
            </tr>
            <?php
            $users = $User->searchAll();
            foreach($users as $user){
                if($user['user'] == 'admin') continue;
                $password = str_repeat('*', strlen($user['password']))
            ?>
            <tr style="text-align: center;">
                <td><?=$user['user']?></td>
                <td><?=$password?></td>
                <td><input type="checkbox" name="del[]" value="<?=$user['id']?>"></td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div style="text-align: center;">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
</div>


<div style="width: 65%;">
    <h2>新增會員</h2>
    <div style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字元)</div>
    <table style="width: 100%;">
        <tr>
            <td style="width: 40%; background-color: lightgray">Step1:登入帳號</td>
            <td><input type="text" class="reg-user" style="width: 90%;"></td>
        </tr>
        <tr>
            <td style="width: 40%; background-color: lightgray">Step2:登入密碼</td>
            <td><input type="password" class="reg-password" style="width: 90%;"></td>
        </tr>
        <tr>
            <td style="width: 40%; background-color: lightgray">Step3:再次確認密碼</td>
            <td><input type="password" class="reg-password-re" style="width: 90%;"></td>
        </tr>
        <tr>
            <td style="width: 40%; background-color: lightgray">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" class="reg-email" style="width: 90%;"></td>
        </tr>
        <tr>
            <td>
                <button class="reg-submit-btn" style="margin-left: 10px;">註冊</button>
                <button class="reg-reset-btn" style="margin-left: 10px;">清除</button>
            </td>
        </tr>
    </table>
</div>


<script>

$('.reg-submit-btn').on('click', () => {
    let user = $('.reg-user').val();
    let password = $('.reg-password').val();
    let passwordRe = $('.reg-password-re').val();
    let email = $('.reg-email').val();

    if(user.length===0 || password.length===0 || passwordRe.length===0 || email.length===0) alert('不可空白');
    else if(password !== passwordRe) alert('密碼錯誤');
    else{
        $.post('./api/add_user.php', {user, password, email}, (response) => {
            if(response === '1'){
                alert('會員新增成功');
                location.reload();
            }
            else alert(response);
        });
    }
});
$('reg-reset-btn').on('click', () => {
    $('.reg-user').val('');
    $('.reg-password').val('');
    $('.reg-password-re').val('');
    $('.reg-email').val('');
});

</script>