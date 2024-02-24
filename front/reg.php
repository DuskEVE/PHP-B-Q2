<div>
    <fieldset style="width: 65%; margin: auto;">
        <legend>會員註冊</legend>
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
    </fieldset>
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
        $.post('./api/reg.php', {user, password, email}, (response) => {
            if(response === '1'){
                alert('註冊完成，歡迎加入');
                location.href = './index.php';
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