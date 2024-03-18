<div class="container p-5 ">
    <h3 class='text-center fs-3 fw-bold'>新增輪播圖片</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;" class="mx-auto">
            <tr>
                <td>輪播圖片:</td>
                <td><input class="form-control" type="file" name="img" id=""></td>
            </tr>

        </table>
        <div class="mt-5 text-center">
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input class="btn my-btn-ok" type="submit" value="新增">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>
    <hr style="margin-top:15%">
</div>