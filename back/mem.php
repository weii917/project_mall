<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">會員管理</p>

        <table class="mx-auto" style="text-align: center;width:60%">
            <tbody>
                <tr class="yel">
                    <td width="30%">帳號</td>
                    <td width="30%">會員帳號</td>
                    <td width="20%">註冊日期</td>
                    <td width="20%">管理</td>
                </tr>
                <!-- 取資料料表資料放入後台顯示表格中 -->

                <?php
                $rows = $Mem->all();
                foreach ($rows as $row) {
                ?>
                    <tr>

                        <td><?= $row['name']; ?></td>
                        <td><?= $row['acc']; ?></td>
                        <td><?= $row['regdate']; ?></td>
                        <td>
                            <?php
                            echo "<button class='btn my-btn-ok mx-2' onclick='location.href=&#39;?do=edit_mem&id={$row['id']}&#39;'>修改</button>";
                            echo "<button class='btn my-btn-reset' onclick='del(&#39;mem&#39;,{$row['id']})'>刪除</button>";
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