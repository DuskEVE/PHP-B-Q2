
<fieldset style="width: 70%; margin: auto;">
    <legend>新增問卷</legend>

    <div style="display: flex;">
        <div style="width: 30%; background-color: lightgray;">問卷名稱</div>
        <div style="width: 60%;"><input type="text" class="que-title" style="width: 90%;"></div>
    </div>
    <div class="all-subject">
        <div style="background-color: lightgray; margin: 3px 0 3px 0;">
            選項: <input type="text" class="que-subject" style="width: 60%;"> <button class="add-subject-btn">更多</button>
        </div>
    </div>
    <div>
        <button class="que-submit-btn">新增</button>|
        <button class="que-reset-btn">清空</button>
    </div>

</fieldset>

<script>
    $('.add-subject-btn').on('click', () => {
        let element = `
        <div style="background-color: lightgray; margin: 3px 0 3px 0;">
            選項: <input type="text" class="que-subject" style="width: 60%;">
        </div>
        `;
        $('.all-subject').prepend(element);
    });
    $('.que-submit-btn').on('click', () => {
        let title = $('.que-title').val();
        let subject = [];
        $('.que-subject').each((index, element) => {
            subject.push($(element).val());
        });

        $.post('./api/add_que.php', {title, subject}, () => location.href = '?do=que');
    });
    $('.que-reset-btn').on('click', () => {
        $('.que-title').val('');
        $('.que-subject').val('');
    });
</script>