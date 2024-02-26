
<fieldset style="width: 80%; margin: auto;">
    <legend>新增文章</legend>
    <form action="./api/add_post.php" method="post" style="width: 100%;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 20%; text-align: center;">文章標題</td>
                <td><input type="text" name="title" style="width: 90%;"></td>
            </tr>
            <tr>
                <td style="width: 20%; text-align: center;">文章分類</td>
                <td>
                    <select name="type_id">
                    <?php
                    $types = $Type->searchAll();
                    foreach($types as $type){
                        echo "<option value='{$type['id']}'>{$type['type']}</option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="width: 20%; text-align: center;">文章內容</td>
                <td><textarea name="text" style="width: 90%; height: 300px;"></textarea></td>
            </tr>
        </table>
        <div style="text-align: center;">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</fieldset>