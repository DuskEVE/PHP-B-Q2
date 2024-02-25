<div>
    <fieldset style="width: 60%; margin: auto;">

        <div>請輸入信箱以查詢密碼</div>
        <div><input type="text" class="forget-email" style="width: 90%;"></div>
        <div class="result"></div>
        <div><button class="forget-submit">尋找</button></div>

    </fieldset>
</div>

<script>
    $('.forget-submit').on('click', () => {
        let email = $('.forget-email').val();

        $.post('./api/forget.php', {email}, (response) => $('.result').text(response));
    });
</script>