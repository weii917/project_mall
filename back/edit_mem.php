<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">編輯會員資料</p>
        <?php
        $row = $Mem->find($_GET['id']);
        ?>
        <form action="./api/save_mem.php" method="post">
            <table class="mx-auto" style="text-align: center;width:60%">
                <tbody>
                    <tr>
                        <td class="tt ct">帳號</td>
                        <td class="pp">
                            <?= $row['acc']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tt ct">密碼</td>
                        <td class="pp"><?= str_repeat("*", strlen($row['pw'])); ?></td>
                    </tr>
                    <tr>
                        <td class="tt ct">姓名</td>
                        <td class="pp"><input type="text" name="name" value="<?= $row['name']; ?>" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <td class="tt ct">電話</td>
                        <td class="pp"><input type="text" name="tel" value="<?= $row['tel']; ?>" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <td class="tt ct">住址</td>
                        <td class="pp"><input type="text" name="addr" value="<?= $row['addr']; ?>" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <td class="tt ct">電子信箱</td>
                        <td class="pp"><input type="text" name="email" value="<?= $row['email']; ?>" class="form-control text-center"></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-5">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <input class="btn my-btn-ok" type="submit" value="編輯">
                <input class="btn my-btn-reset" type="reset" value="重置">
                <input class="btn btn-dark" type="button" value="取消" onclick="location.href='?do=mem'">
            </div>
        </form>
    </div>
</div>