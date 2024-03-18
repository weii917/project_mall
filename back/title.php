<div class="container-fluid">
    <!-- <?php
            $rows = $DB->all(['sh' => 1]);
            foreach ($rows as $row) {

            ?>
        <div class="row"><img src="./img/<?= $row['img']; ?>" class="mx-auto" style="width:80%;height:550px" alt=""></div>
    <?php
            } ?> -->
    <div class="row mt-3  mb-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">網站標題管理</p>
        <form method="post" action="./api/edit.php">

            <table width="100%" style="text-align: center;">
                <tbody>
                    <tr class="">
                        <td width="45%">網站標題</td>
                        <td width="23%">替代文字</td>
                        <td width="7%">顯示</td>
                        <td width="7%">刪除</td>
                        <td></td>
                    </tr>

                    <!-- 取資料料表資料放入後台顯示表格中 -->
                    <?php
                    $rows = $DB->all();
                    foreach ($rows as $row) {


                    ?>
                        <tr class="p-2">
                            <td width="45%"><img src="./img/<?= $row['img']; ?>" class="m-2" style="width:300px;height:200px"></td>
                            <td width="23%"><textarea class="form-control" type="text" name="text[]" style="width:100%;height:100px"><?= $row['text']; ?></textarea></td>

                            <td width="7%"><input class="form-check-input" type="radio" name="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                            <td width="7%"><input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                            <td><input class="btn my-btn-update" type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更新圖片"></td>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table class="mt-5" style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="200px"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增網站標題圖片"></td>
                        <td class="cent">
                            <input class="btn my-btn-ok" type="submit" value="修改確定">
                            <input class="btn my-btn-reset" type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>