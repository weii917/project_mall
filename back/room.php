<!-- 8.做title 使用modal新增圖片 -->
<!-- 11.完成後台標題管理資料列表功能及更新圖片按鈕設定 -->
<!-- 13. 做更新圖片功能到modal/upload.php再到api/update.php更新-->
<div class="container-fluid">
    <div class="row mt-3  mb-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">房型管理</p>
        <form method="post" action="./api/edit.php">

            <table width="100%" style="text-align: center;">
                <tbody>
                    <tr class="">
                        <td width="30%">圖片</td>
                        <td width="20%">房型</td>
                        <td width="40%">文字</td>
                        <td width="5%">顯示</td>
                        <td width="5%">刪除</td>
                        <td></td>
                    </tr>

                    <!-- 取資料料表資料放入後台顯示表格中 -->
                    <?php
                    $total = $DB->count();
                    $div = 3;
                    $pages = ceil($total / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;
                    $rows = $DB->all(" limit $start,$div");
                    foreach ($rows as $row) {

                    ?>
                        <tr class="p-2">
                            <td><img src="./img/<?= $row['img']; ?>" class="m-2" style="width:300px;height:200px"></td>
                            <td><input class="form-control text-center" type="text" name="room[]" value="<?= $row['room']; ?>" style="width:70%"></td>
                            <td><textarea class="form-control" type="text" name="text[]" style="width:100%;height:300px"><?= $row['text']; ?></textarea></td>
                            <!-- <td width="23%"><input class="form-control" type="text" name="text[]" value="<?= $row['text']; ?>" style="width:90%"></td> -->
                            <td><input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                            <td><input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                            <td><input class="btn my-btn-update" type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更新圖片"></td>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- 處理分頁 -->
            <div class="mt-3">
                <ul class="nav nav-pills justify-content-center">
                    <?php
                    if ($now > 1) {
                        $prev = $now - 1;
                        echo "<li class='nav-item'><a class='text-bg-light nav-link' href='?do=$do&p=$prev'><i class='fa-solid fa-backward'></i></a></li>";
                    }
                    for ($i = 1; $i <= $pages; $i++) {
                        $activeClass = ($now == $i) ? 'bg-dark-subtle' : '';
                        echo "<li class='nav-item '><a class='text-bg-light nav-link $activeClass' href='?do=$do&p=$i'>$i</a></li>";
                    }
                    if ($now < $pages) {
                        $next = $now + 1;
                        echo "<li class='nav-item'><a class=' text-bg-light nav-link' href='?do=$do&p=$next'><i class='fa-solid fa-forward'></i></a></li>";
                    }
                    ?>
                </ul>
            </div>
            <table class="mt-5" style="margin-top:40px; width:85%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="200px"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增房型圖片"></td>
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