<?php

if (!empty($_POST)) {
    $rows = $Qt->all(" where `id` in ('" . join("','", $_POST['select']) . "')");
    // dd($rows);
    $filename = date("Ymd") . rand(100000000, 999999999);
    $file = fopen("./doc/{$filename}.csv", "w+");
    fwrite($file, "\xEF\xBB\xBF");
    $chk = false;
    foreach ($rows as $idx => $row) {
        if (!$chk) {

            $cols = array_keys(($row));
            fwrite($file, "id,貓咪小物,貓咪玩具,逗貓棒,貓跳台1.0,貓跳台2.0,貓窩,背包,逗貓棒,貓咪大背包,會員帳號,姓名,會員電話,會員地址,總金額,訂單編號\n");
            $chk = true;
        }
        fwrite($file, join(",", $row) . "\r\n");
    }
    fclose($file);
}
?>
<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">訂單匯出</p>
        <!-- <?php

                if (!empty($_POST)) {
                    echo "<a href='./doc/{$filename}.csv' download>檔案已匯出，請點此連結下載</a>";
                }
                ?> -->
        <form action="?do=export" method="post">
            <?php
            if (!empty($_POST)) {
            ?>
                <a href="./doc/<?= $filename; ?>.csv" download class="btn btn-dark">檔案已匯出，請點此連結下載</a>

            <?php

            } else {
            ?>
                <input type="submit" value="匯出選擇的資料" class="btn btn-dark">
            <?php
            }
            ?>
            <div class="table-reponsive">
                <table class="table mx-auto" style="text-align: center;width:100%">
                    <tbody>
                        <input type="checkbox" name="" id="select">全部
                        <tr class="table-secondary">
                            <th>

                                勾選
                            </th>
                            <th>編號</th>
                            <th>貓咪小物</th>
                            <th>玩具</th>
                            <th>逗貓棒a</th>
                            <th>貓跳台1.0</th>
                            <th>貓跳台2.0</th>
                            <th>貓窩</th>
                            <th>背包</th>
                            <th>逗貓棒b</th>
                            <th>貓咪大背包</th>
                            <th>會員帳號</th>
                            <th>姓名</th>
                            <th>電話</th>
                            <th>地址</th>
                            <th>總金額</th>
                            <th>訂單編號</th>


                        </tr>
                        <!-- 取資料料表資料放入後台顯示表格中 -->

                        <?php
                        $rows = $Qt->all();
                        foreach ($rows as $row) {
                        ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="select[]" value="<?= $row['id']; ?>">
                                </td>
                                <?php
                                foreach ($row as $value) {
                                ?>
                                    <td>
                                        <?= $value ?>
                                    </td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-3"> <button class="btn my-btn-ok" type="button" onclick="location.href='?do=order'">返回</button></div>


        </form>
    </div>
</div>
<script>
    $("#select").on("change", function() {
        if ($(this).prop('checked')) {
            $("input[name='select[]']").prop('checked', true);
        } else {
            $("input[name='select[]']").prop('checked', false);
        }
    })
</script>