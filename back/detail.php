<?php
$row = $Order->find($_GET['id']);
?>
<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">訂單編號<?= $row['no']; ?>的詳細資料</p>

        <table class="mx-auto" style="text-align: center;width:60%">
            <tbody>
                <tr>
                    <td class="tt ct">帳號</td>
                    <td class="pp">
                        <?= $row['acc']; ?>
                    </td>
                </tr>
                <tr>
                    <td class="tt ct">姓名</td>
                    <td class="pp"><input type="text" name="name" value="<?= $row['name']; ?>" class="form-control text-center"></td>
                </tr>
                <tr>
                    <td class="tt ct">聯絡電話</td>
                    <td class="pp"><input type="text" name="tel" value="<?= $row['tel']; ?>" class="form-control text-center"></td>
                </tr>
                <tr>
                    <td class="tt ct">聯絡住址</td>
                    <td class="pp"><input type="text" name="addr" value="<?= $row['addr']; ?>" class="form-control text-center"></td>
                </tr>
                <tr>
                    <td class="tt ct">電子信箱</td>
                    <td class="pp"><input type="text" name="email" value="<?= $row['email']; ?>" class="form-control text-center"></td>
                </tr>


            </tbody>

        </table>
        <table class="mx-auto mt-5" style="width:90%">
            <tr class="tt ct">
                <td>編號</td>
                <td class="text-center">商品名稱</td>
                <td class="text-center">數量</td>
                <td class="text-center">單價</td>
                <td class="text-end">小計</td>

            </tr>
            <?php
            $total = 0;
            $cart = unserialize($row['cart']);
            foreach ($cart as $id => $qt) {
                $good = $Goods->find($id);
            ?>
                <tr class="pp ct">
                    <td><?= $good['no']; ?></td>
                    <td class="text-center"><?= $good['name']; ?></td>
                    <td class="text-center"><?= $qt; ?></td>
                    <td class="text-center"><?= $good['price']; ?></td>
                    <td class="text-end"><?= $good['price'] * $qt; ?></td>

                </tr>

            <?php
                $total = $good['price'] * $qt;
            }
            ?>
            <tr>
                <td colspan="5" class="text-end fs-4">總計:<?= $total; ?></td>
            </tr>
        </table>
        <div class="text-center mt-5">
            <input type="hidden" name="id" value="<?= $row['id']; ?>">
            <input class="btn my-btn-ok" type="submit" value="編輯">
            <input class="btn my-btn-reset" type="reset" value="重置">
            <input class="btn btn-dark" type="button" value="取消" onclick="location.href='?do=order'">
        </div>

    </div>
</div>