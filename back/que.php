
<div class="container" style="width: 100%; display:flex; justify-content: center">
    <form action="./api/add_que.php" method="post" style="width: 70%;">
        <fieldset style="width: 100%;">
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
                <div>
                    <input type="submit" value="新增">|
                    <input type="reset" value="清空">
                </div>
            </div>
        </fieldset>
    </form>
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