<!-- 13. 做更新圖片功能到modal/upload.php再到api/update.php更新-->
<div class="container p-5 ">
    <?php
    switch ($_GET['table']) {
        case "title";
            echo "<h3 class='text-center fs-3 fw-bold'>更新網站標題圖片</h3>";
            break;
        case "mvim";
            echo "<h3 class='text-center fs-3 fw-bold'>更新圖片</h3>";
            break;
        case "image";
            echo "<h3 class='text-center fs-3 fw-bold'>更新輪播圖片</h3>";
            break;
        case "room";
            echo "<h3 class='text-center fs-3 fw-bold'>更新房型圖片</h3>";
            break;
    }

    ?>


    <hr>
    <form action="./api/update.php" method="post" enctype="multipart/form-data">
        <table style="width: 100%;">
            <tr>
                <?php
                switch ($_GET['table']) {
                    case "title";
                        echo "<td>標題區圖片</td>";
                        break;
                    case "mvim";
                        echo "<td>圖片</td>";
                        break;
                    case "image";
                        echo "<td>輪播圖片</td>";
                        break;
                    case "room";
                        echo "<td>房型圖片</td>";
                        break;
                }

                ?>

                <td><input class="form-control" type="file" name="img" id=""></td>
            </tr>

        </table>
        <div class="mt-5 text-center">
            <!-- 只是停留更新的介面，要帶table及id值到執行頁面update.php -->
            <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
            <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
            <input class="btn my-btn-ok" type="submit" value="更新">
            <input class="btn my-btn-reset" type="reset" value="重置">
        </div>

    </form>

    <hr style="margin-top:20%">
</div>