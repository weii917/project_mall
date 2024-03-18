<!-- 15. 套用Title的功能到Ad功能去-->

<div class="col" style="height: 80%;">
    <div class="row mt-5 mb-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">訂房管理</p>
        <form method="post" action="./api/edit.php">
            <table width="100%" style="text-align: center;">
                <tbody>
                    <tr class="yel">
                        <td width="5%">編號</td>
                        <td width="12%">電子郵件</td>
                        <td width="12%">手機號碼</td>
                        <td width="10%">飼主姓名</td>
                        <td width="10%">貓咪姓名</td>
                        <td width="10%">預計入住日期</td>
                        <td width="10%">預計退房日期</td>
                        <td width="8%">房型</td>
                        <td width="5%">貓數</td>
                        <td width="10%">如何得知</td>
                        <!-- <td width="10%">其他補充</td> -->
                        <td width="10%">刪除</td>

                    </tr>
                    <!-- 取資料料表資料放入後台顯示表格中 -->

                    <?php
                    $total = $DB->count();
                    $div = 5;
                    $pages = ceil($total / $div);
                    $now = $_GET['p'] ?? 1;
                    $start = ($now - 1) * $div;
                    $rows = $DB->all(" limit $start,$div");
                    foreach ($rows as $idx => $row) {

                        // echo dd($rows);
                        // exit
                    ?>
                        <tr>

                            <td><input class="form-control" type="no" name="no[]" value="<?= $row['id']; ?>" style="width:90%"></td>

                            <td><input class="form-control" type="text" name="email[]" value="<?= $row['email']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="phone[]" value="<?= $row['phone']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="name[]" value="<?= $row['name']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="catname[]" value="<?= $row['catname']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="datein[]" value="<?= $row['datein']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="dateout[]" value="<?= $row['dateout']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="room[]" value="<?= $row['room']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="catnum[]" value="<?= $row['catnum']; ?>" style="width:90%"></td>
                            <td><input class="form-control" type="text" name="know[]" value="<?= $row['know']; ?>" style="width:90%"></td>
                            <!-- <td><input class="form-control" type="text" name="other[]" value="<?= $row['other']; ?>" style="width:90%"></td> -->
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            <!-- <td><input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>></td> -->
                            <td><input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>

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
            <table style="margin-top:40px; width:80%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="200px"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增訂房"></td>
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