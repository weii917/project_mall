<div class="container p-5 ">
    <h3 class='text-center fs-3 fw-bold'>新增管理者帳號</h3>
    <hr>
    <form action="./api/save_admin.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">

            <tr>
                <td>帳號:</td>
                <td><input class="form-control" type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼:</td>
                <td><input class="form-control" type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>權限:</td>
                <td>
                    <div>
                        <input type="checkbox" name="pr[]" value="1" class="form-check-input">
                        網站標題管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="2" class="form-check-input">
                        訂房管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="3" class="form-check-input">
                        關於我們管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="4" class="form-check-input">
                        房型管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5" class="form-check-input">
                        商品管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="6" class="form-check-input">
                        商品訂單管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="7" class="form-check-input">
                        聯絡我們管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="8" class="form-check-input">
                        住宿需知資料管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="9" class="form-check-input">
                        輪播圖片管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="10" class="form-check-input">
                        選單管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="11" class="form-check-input">
                        頁尾版權資料管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="12" class="form-check-input">
                        管理者帳號管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="13" class="form-check-input">
                        會員帳號管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="14" class="form-check-input">
                        進站總人數管理
                    </div>
                </td>
            </tr>
        </table>
        <div class="mt-5 text-center">
            <input class="btn my-btn-ok" type="submit" value="新增">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>
    <hr style="margin-top:12%">
</div>
<script>

</script>