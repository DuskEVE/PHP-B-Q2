
<form action="./api/login.php" method="post" style="width: 40%; margin: auto">
    <fieldset>
        <legend>會員登入</legend>

        <table style="text-align: center;">
            <tr>
                <td style="background-color: lightgray;"><label for="user">帳號:</label></td>
                <td><input type="text" id="user" name="user"></td>
            </tr>
            <tr>
                <td style="background-color: lightgray;"><label for="password">密碼:</label></td>
                <td><input type="password" id="password" name="password"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="送出">
                    <input type="reset" value="清除">
                </td>
                <td>
                    <a href="./index.php?do=forget">忘記密碼</a>|
                    <a href="./index.php?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>