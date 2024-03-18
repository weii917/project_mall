<?php include_once "../api/db.php"; ?>
<div class="container p-5 ">
    <h3 class='text-center fs-3 fw-bold'>編輯次項目</h3>
    <hr>
    <form action="./api/subnews.php" method="post" enctype="multipart/form-data">
        <table class='cent' id='sub'>
            <tr>
                <td class="text-center fs-5 fw-bold">次項目名稱</td>
                <td>刪除</td>
            </tr>
            <?php
            $subs = $News->all(['news_id' => $_GET['id']]);
            foreach ($subs as $sub) {
            ?>
                <tr>
                    <td><input class="form-control" style="width:500px" type="text" name="text[]" value="<?= $sub['text']; ?>"></td>
                    <td><input class="form-check-input" type="checkbox" name="del[]" value="<?= $sub['id']; ?>"></td>

                    <input class="form-control" type="hidden" name="id[]" value="<?= $sub['id']; ?>">
                </tr>
            <?php
            }
            ?>
        </table>
        <div class=" text-center" style="margin-top:40px; width:100%;">
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input type="hidden" name="news_id" value="<?= $_GET['id']; ?>">
            <input class="btn my-btn-ok" type="submit" value="修改確定">
            <input class="btn my-btn-reset" type="reset" value="重置">
            <input class="btn btn-secondary" type="button" value="更多次項目" onclick="more()">
        </div>

    </form>
    <script>
        function more() {
            let item = `<tr>
                <td><input style="width:500px" type="text" name="add_text[]" id=""></td>               
              </tr>`

            $("#sub").append(item);

        }
    </script>
</div>