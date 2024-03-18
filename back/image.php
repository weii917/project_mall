<div class="col" style="height: 80%;">
    <div class="row mt-5 mb-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">輪播圖片管理</p>
        <form method="post" action="./api/edit.php">
            <table width="100%" style="text-align: center;">
                <tbody>
                    <tr class="yel">
                        <td width="40%">輪播圖片</td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <!-- 設定分頁變數 -->
                    <?php
                    $total = $DB->count();
                    $div = 3;
                    $pages = ceil($total / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;
                    $rows = $DB->all(" limit $start,$div");

                    foreach ($rows as $row) {


                    ?>
                        <!-- 做mvim時發現沒有id取用，所以這裡藏一個id讓mvim有id依據刪除編輯 -->
                        <tr>
                            <td width="45%"><img src="./img/<?= $row['img']; ?>" class="m-2" style="width:300px;height:200px" alt=""></td>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            <td width="7%"><input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td>
                            <td width="7%"><input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                            <td><input class="btn my-btn-update" type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更新輪播圖片"></td>
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
            <table style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="42%"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增輪播圖片"></td>
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