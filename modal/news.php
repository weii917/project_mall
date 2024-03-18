<div class="container p-5 ">
    <h3 class='text-center fs-3 fw-bold'>新增住宿需知</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">

            <tr>
                <td>最新住宿需知</td>
                <td><textarea class="form-control" type="text" name="text" style="margin-left:100px;width:300px;height:150px"></textarea></td>
            </tr>
        </table>
        <div class="mt-5 text-center">
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input type="hidden" name="news_id" value="0">
            <input class="btn my-btn-ok" type="submit" value="更新">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>
    <hr style="margin-top:5%">
</div>