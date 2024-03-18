<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">進站總人數管理</p>
        <form method="post" action="./api/edit_info.php">
            <table style="width:50%;margin:auto">
                <tbody>
                    <tr class="yel">
                        <td width="50%">進站總人數</td>
                        <td width="50%">
                            <input class="form-control" type="number" name="total" value="<?= $Total->find(1)['total']; ?>">
                            <!-- 存進Post資料表名稱從$do得到，也就是網址get到已經存進$do -->
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