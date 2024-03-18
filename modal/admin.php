<div class="container p-5 ">
    <h3 class='text-center fs-3 fw-bold'>新增管理者帳號</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">

            <tr>
                <td>帳號:</td>
                <td><input class="form-control" type="text" name="acc" id=""></td>
            </tr>
            <tr>
                <td>密碼:</td>
                <td><input class="form-control" type="password" name="pw" id=""></td>
            </tr>
            <tr>
                <td>確認密碼:</td>
                <td><input class="form-control" type="password" name="pw2" id=""></td>
            </tr>
        </table>
        <div class="mt-5 text-center">
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input class="btn my-btn-ok" type="submit" value="更新">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>
    <hr style="margin-top:12%">
</div>