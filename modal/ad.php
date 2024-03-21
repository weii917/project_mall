<!-- 15. 套用Title的功能到Ad功能去-->
<div class="container p-5 ">
    <h3 class='fs-3 fw-bold'>新增動態文字廣告</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table>

            <tr>
                <td>動態文字廣告</td>
                <td><input class="form-control" type="text" name="text" id=""></td>
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