
<div class="container" style="width: 100%; display:flex; justify-content: center">
    <fieldset style="width: 70%;">
        <legend>新增問卷</legend>

        <div>
            <div>
                <label for="title">問卷名稱</label>
                <input type="text" name="subject">
            </div>
            <div class="option-bar">
                <input type="text" name="option[]" id="" style="width: 70%;">
                <input type="button" value="更多" id="add">
            </div>

        </div>

    </fieldset>
</div>

<script>
    $('#add').on('click', () => {
        $newOpt = `
            <div>
                <input type="text" name="option[]" id="" style="width: 70%;">
            </div>
        `;
        $('.option-bar').before($newOpt);
    });
</script>