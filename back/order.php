<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">訂單管理</p>
        <div> <button class="btn btn-dark w-30" onclick="location.href='?do=export'">匯出資料</button></div>

        <table class="mx-auto table" style="text-align: center;width:100%">
            <tbody>
                <tr class="table-secondary">
                    <td width="16.6%">訂單編號</td>
                    <td width="16.6%">金額</td>
                    <td width="16.6%">會員帳號</td>
                    <td width="16.6%">姓名</td>
                    <td width="16.6%">下單日期</td>
                    <td width="16.6%">操作</td>
                </tr>
                <!-- 取資料料表資料放入後台顯示表格中 -->

                <?php
                $total = $Order->count();
                $div = 8;
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                $rows = $Order->all(" limit $start,$div");
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><a href="?do=detail&id=<?= $row['id']; ?>" title='詳細訂單'>
                                <?= $row['no']; ?>
                            </a></td>

                        <td><?= $row['total']; ?></td>
                        <td><?= $row['acc']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= date("Y/m/d", strtotime($row['orderdate'])); ?></td>
                        <td>
                            <?php
                            echo "<button class='btn my-btn-reset' onclick='del(&#39;orders&#39;,{$row['id']})'>刪除</button>";

                            ?>
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
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

    </div>
</div>