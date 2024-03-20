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
                        <input type="checkbox" name="pr[]" value="1">
                        網站標題管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="2">
                        訂房管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="3">
                        關於我們管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="4">
                        房型管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        商品管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        商品訂單管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        聯絡我們管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        住宿需知資料管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        輪播圖片管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        選單管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        頁尾版權資料管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        管理者帳號管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        會員帳號管理
                    </div>
                    <div>
                        <input type="checkbox" name="pr[]" value="5">
                        進站總人數管理
                    </div>
                </td>
            </tr>
        </table>
        <div class="mt-5 text-center">
            <input class="btn my-btn-ok" type="submit" value="更新">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>
    <hr style="margin-top:12%">
</div>