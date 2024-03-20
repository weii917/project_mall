<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">訂單管理</p>

        <table class="mx-auto" style="text-align: center;width:100%">
            <tbody>
                <tr class="yel">
                    <td width="16.6%">訂單編號</td>
                    <td width="16.6%">金額</td>
                    <td width="16.6%">會員帳號</td>
                    <td width="16.6%">姓名</td>
                    <td width="16.6%">下單日期</td>
                    <td width="16.6%">操作</td>
                </tr>
                <!-- 取資料料表資料放入後台顯示表格中 -->

                <?php
                $rows = $Order->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><a href="?do=detail&id=<?= $row['id']; ?>">
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


    </div>
</div>