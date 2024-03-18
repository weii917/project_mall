<!-- 9.建立modal新增圖片的畫面 -->
<div class="container p-5 ">
    <h3 class='fs-3 fw-bold'>新增網站標題圖片</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">
            <tr>
                <td>標題區圖片</td>
                <td><input class="form-control" type="file" name="img" id=""></td>
            </tr>
            <tr>
                <td>標題區替代文字&nbsp;&nbsp;</td>
                <td><textarea class="form-control" type="text" name="text" style="width:100%;height:200px"></textarea></td>
                <!-- <td><input class="form-control" type="text" name="text" id=""></td> -->
            </tr>
        </table>
        <div class="mt-5 text-center">
            <!-- back/title.php附加網址帶進來的table，要隱藏送到api/add.php -->
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input class="btn my-btn-ok" type="submit" value="新增">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>

    <hr style="margin-top:12%">
</div>