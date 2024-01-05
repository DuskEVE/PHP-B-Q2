
<div class="container" style="width: 100%; display:flex; justify-content:center; margin-bottom:10px;">
    <form action="./api/delete_account.php" method="post" style="width: 60%;">
    <table style="width: 100%;">
        <tr style="background-color: lightgray;">
            <th style="width: 40%;">帳號</th>
            <th style="width: 40%;">密碼</th>
            <th style="width: 20%;">刪除</th>
        </tr>
        <?php
        $datas = $User->searchAll();
        foreach($datas as $data){
        ?>
        <tr>
            <td><?=$data['user']?></td>
            <td><?=str_repeat('*', strlen($data['password']))?></td>
            <td style="text-align: center;"><input name="del[]" type="checkbox" value="<?=$data['id']?>"></td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="3" style="text-align: center;">
                <input type="submit" value="確定刪除" >
                <input type="reset" value="清空選取" >
            </td>
        </tr>
    </table>
    </form>
</div>

<form action="" method="post" style="width: 60%; margin: auto">
    <fieldset>
        <legend>會員註冊</legend>
        <span style="color: red;">*請設定您要註冊的帳號及密碼(最長12個字元)</span>
        <table style="text-align: center;">
            <tr>
                <td style="background-color: lightgray;"><label for="user">Step1:登入帳號</label></td>
                <td><input type="text" id="user" name="user"></td>
            </tr>
            <tr>
                <td style="background-color: lightgray;"><label for="password">Step2:登入密碼</label></td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td style="background-color: lightgray;"><label for="passwordRe">Step3:再次確認密碼</label></td>
                <td><input type="password" id="passwordRe" name="passwordRe"></td>
            </tr>
            <tr>
                <td style="background-color: lightgray;"><label for="email">Step4:信箱(忘記密碼時使用)</label></td>
                <td><input type="text" id="email" name="email"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="註冊" id="submit">
                    <input type="button" value="清除" id="reset">
                </td>
                <td>
                </td>
            </tr>
        </table>
    </fieldset>
</form>

<script>
    let account = {user, password, passwordRe, email};

    $('#submit').on('click', () => {
        account = {
            user: $('#user').val(),
            password: $('#password').val(),
            passwordRe: $('#passwordRe').val(),
            email: $('#email').val()
        };

        if(account.user==='' || account.password==='' || account.passwordRe==='' || account.email==='') alert('不可空白');
        else if(account.password !== account.passwordRe) alert('密碼錯誤');
        else{
            $.post('./api/reg_check.php', {user: account.user}, (respond) => {
                console.log(respond);
                if(Number(respond)) alert('帳號重複');
                else{
                    $.post('./api/reg.php', account);
                    location.reload();
                }
            });
        }

    });
    $('#reset').on('click', () => account = {user, password, passwordRe, email});

</script>
