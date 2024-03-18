<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">選單管理</p>
        <form method="post" action="./api/edit.php">
            <table width="100%" style="text-align: center">
                <tbody>
                    <tr class="yel">
                        <td width="30%">主選單名稱</td>
                        <td width="30%">選單連結網址</td>
                        <!-- <td width="10%">次選單數</td> -->
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <!-- 取資料料表資料條件為'menu_id'=0 放入後台顯示表格中 -->
                    <!-- 'menu_id'=0是主選單 -->
                    <?php

                    $rows = $DB->all();
                    foreach ($rows as $row) {
                    ?>
                        <tr>
                            <td>
                                <input class="form-control" type="text" name="text[]" value="<?= $row['text']; ?>">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="href[]" value="<?= $row['href']; ?>">
                            </td>
                            <td>
                                <input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                            </td>
                            <td>
                                <input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                            </td>
                            <!-- <td>
                                <input class="btn my-btn-update" type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/submenu.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')">
                            </td> -->
                        </tr>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="42%"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增主選單"></td>
                        <td class="">
                            <input class="btn my-btn-ok" type="submit" value="修改確定">
                            <input class="btn my-btn-reset" type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>