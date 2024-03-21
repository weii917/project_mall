<div class="container p-5 ">
    <h3 class='fs-3 fw-bold'>新增關於我們</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">
            <tr>
                <td>圖片: &nbsp;</td>
                <td><input class="form-control" type="file" name="img" id=""></td>
            </tr>
            <tr>
                <td>文字: &nbsp;</td>
                <td><textarea class="form-control" type="text" name="text" style="width:100%;height:250px"></textarea></td>
            </tr>
        </table>
        <div class="mt-5 text-center">
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input class="btn my-btn-ok" type="submit" value="新增">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>
    <hr style="margin-top:12%">
</div>