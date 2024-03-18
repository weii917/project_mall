<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">頁尾版權資料管理</p>
        <form method="post" action="./api/edit_info.php">
            <table style="width:50%;margin:auto">
                <tbody>
                    <tr>
                        <td width="50%">頁尾版權資料</td>
                        <td width="50%">
                            <input class="form-control" type="text" name="bottom[]" value="<?= $Bottom->find(1)['bottom']; ?>">


                        </td>
                    </tr>
                    <tr>
                        <td width="50%">地址</td>
                        <td width="50%">
                            <input class="form-control" type="text" name="bottom[]" value="<?= $Bottom->find(2)['bottom']; ?>">


                        </td>
                    </tr>
                    <tr>
                        <td width="50%">電話</td>
                        <td width="50%">
                            <input class="form-control" type="text" name="bottom[]" value="<?= $Bottom->find(3)['bottom']; ?>">
                            <input type="hidden" name="table" value="<?= $do; ?>">

                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
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