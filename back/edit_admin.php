<?php
$row = $Admin->find($_GET['id']);
$pr = unserialize($row['pr']);
?>

<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">修改管理員權限</p>
        <form method="post" action="./api/save_admin.php">
            <table class="mx-auto" style="width:60%">
                <tbody>
                    <tr>
                        <td width="40%">帳號</td>
                        <td class="pp"><input type="text" name="acc" value="<?= $row['acc']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="40%">密碼</td>
                        <td class="pp"><input type="password" name="pw" value="<?= $row['pw']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <td width="20%">權限</td>
                        <td class="pp">
                            <div>
                                <input type="checkbox" name="pr[]" value="1" <?= (in_array(1, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                網站標題管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="2" <?= (in_array(2, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                訂房管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="3" <?= (in_array(3, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                關於我們管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="4" <?= (in_array(4, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                房型管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="5" <?= (in_array(5, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                商品管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="6" <?= (in_array(5, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                商品訂單管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="7" <?= (in_array(7, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                聯絡我們管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="8" <?= (in_array(8, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                住宿需知資料管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="9" <?= (in_array(9, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                輪播圖片管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="10" <?= (in_array(10, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                選單管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="11" <?= (in_array(11, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                頁尾版權資料管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="12" <?= (in_array(12, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                管理者帳號管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="13" <?= (in_array(13, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                會員帳號管理
                            </div>
                            <div>
                                <input type="checkbox" name="pr[]" value="14" <?= (in_array(14, $pr)) ? 'checked' : ''; ?> class="form-check-input">
                                進站總人數管理
                            </div>

                        </td>
                    </tr>


                </tbody>
            </table>
            <table class="mx-auto" style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
                        <td width="42%"></td>
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