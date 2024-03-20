<?php
if (isset($_GET['error'])) {
    echo "<script>alert('{$_GET['error']}')</script>";
}
?>

<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">管理者帳號管理</p>
        <form method="post" action="./api/edit.php">
            <table class="mx-auto" style="text-align: center;width:60%">
                <tbody>
                    <tr class="yel">
                        <td width="40%">帳號</td>
                        <td width="40%">密碼</td>
                        <td width="20%">管理</td>
                    </tr>
                    <!-- 取資料料表資料放入後台顯示表格中 -->

                    <?php
                    $rows = $Admin->all();
                    foreach ($rows as $row) {


                    ?>
                        <tr>

                            <td><input class="form-control" type="text" name="acc[]" value="<?= $row['acc']; ?>" style="width:100%"></td>
                            <td><input class="form-control" type="password" name="pw[]" value="<?= $row['pw']; ?>" style="width:100%"></td>
                            <td> <?php
                                    if ($row['acc'] == 'admin') {
                                        echo "此帳號為最高權限";
                                    } else {
                                        if ($_SESSION['admin'] == 'admin') {
                                    ?>

                                        <button class="btn btn-secondary" type="button" onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">管理</button>
                                        <button class="btn btn-outline-dark" type="button" onclick="del('admin',<?= $row['id']; ?>)">刪除</button>
                                <?php
                                        } else {
                                            echo '';
                                        }
                                    }
                                ?>
                            </td>

                        </tr>
                        <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <table class="mx-auto" style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="42%"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增管理者帳號"></td>
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