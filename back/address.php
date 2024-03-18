<div class="col" style="height: 80%;">
    <div class="row mt-5 mb-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">聯絡我們管理</p>
        <form method="post" action="./api/edit_info.php">
            <table style="width:100%;margin:auto">
                <tbody>
                    <tr>
                        <td width="30%">地圖</td>
                        <td width="70%">
                            <textarea class="form-control" type="text" name="iframe" style="width:100%;height:200px"><?= $Address->find(1)['iframe']; ?></textarea>

                            <!-- 存進Post資料表名稱從$do得到，也就是網址get到已經存進$do -->
                            <input type="hidden" name="table" value="<?= $do; ?>">
                            <input type="hidden" name="id" value="<?= $Address->find(1)['id']; ?>">

                        </td>
                    </tr>
                    <tr>
                        <td width="30%">地址</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="address" value="<?= $Address->find(1)['address']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">電話</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="tel" value="<?= $Address->find(1)['tel']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">營業時間</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="timing" value="<?= $Address->find(1)['timing']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">開放時間</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="open" value="<?= $Address->find(1)['open']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Fb</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="fb" value="<?= $Address->find(1)['fb']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Line</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="line" value="<?= $Address->find(1)['line']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">email</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="email" value="<?= $Address->find(1)['email']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">Ig</td>
                        <td width="70%">
                            <input class="form-control" type="text" name="ig" value="<?= $Address->find(1)['ig']; ?>">
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