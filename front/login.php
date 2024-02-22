
<div>
    <fieldset style="width: 50%; margin: auto;">
        <legend>會員登入</legend>
        <table style="width: 100%;">
            <tr>
                <td style="width: 40%; background-color: lightgray">帳號:</td>
                <td><input type="text" class="login-user" style="width: 90%;"></td>
            </tr>
            <tr>
                <td style="width: 40%; background-color: lightgray">密碼:</td>
                <td><input type="password" class="login-password" style="width: 90%;"></td>
            </tr>
            <tr>
                <td>
                    <button class="login-submit-btn" style="margin-left: 10px;">登入</button>
                    <button class="login-reset-btn" style="margin-left: 10px;">清除</button>
                </td>
                <td style="text-align: right;">
                    <a href="?do=forget">忘記密碼</a>|<a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
    </fieldset>
</div>

<script>
const resetInput = () => {
    $('.login-user').val('');
    $('.login-password').val('');
};

$('.login-submit-btn').on('click', () => {
    let user = $('.login-user').val();
    let password = $('.login-password').val();
    console.log(user, password);
    $.post('./api/login.php', {user, password}, (response) => {
        if(response === 'user') location.href = './index.php';
        else if(response === 'admin') location.href = './admin.php';
        else{
            alert(response);
            resetInput();
        }
    });
})
$('.login-reset-btn').on('click', resetInput);
</script>