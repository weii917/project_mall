<!-- 9.建立modal新增圖片的畫面 -->
<div class="container p-3 ">
    <h3 class='fs-3 fw-bold'>新增訂房</h3>
    <hr>
    <form action="./api/add.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">

            <tr>
                <td>電子郵件</td>
                <td><input class="form-control" type="text" name="email"></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;手機號碼</td>
                <td><input class="form-control" type="text" name="phone" id=""></td>

            </tr>

            <tr>
                <td>飼主姓名</td>
                <td><input class="form-control" type="text" name="name" id=""></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;貓咪姓名</td>
                <td><input class="form-control" type="text" name="catname" id=""></td>
            </tr>


            <tr>
                <td>預計入住日期</td>
                <td><input class="form-control" type="date" name="datein" id=""></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;預計退房日期</td>
                <td><input class="form-control" type="date" name="dateout" id=""></td>
            </tr>

            <tr>
                <td>房型</td>
                <td> <select name="room" id="" class="form-control">
                        <option value="經典房">經典房</option>
                        <option value="溫馨房">溫馨房</option>
                        <option value="星空房">星空房</option>
                    </select></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;貓數</td>
                <td> <select name="catnum" id="" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="4隻以上">4隻以上</option>
                    </select></td>
            </tr>

            <tr>
                <td>如何得知</td>
                <td colspan="3"> <select name="know" id="formGroupExampleInput9" class="form-control" style="border: none; border-bottom: 1px solid lightgray;">
                        <option value="是我們的老顧客">是我們的老顧客</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Google搜尋">Google搜尋</option>
                        <option value="朋友介紹">朋友介紹</option>
                    </select></td>
            </tr>
            <!-- <tr>
                <td>其他補充</td>
                <td colspan="3"><textarea class="form-control" type="text" name="other" style="width:100%;height:100px"></textarea></td>
                <td><input class="form-control" type="text" name="other" id=""></td>
            </tr> -->
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