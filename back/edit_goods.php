<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">修改商品</p>
        <?php
        $goods = $Goods->find($_GET['id']);
        ?>
        <form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
            <table class="mx-auto" style="text-align: center;width:60%">
                <tbody>
                    <tr>
                        <th class="tt ct">所屬大分類</th>
                        <td class="pp">
                            <select name="big" id="big" class="form-select"></select>
                        </td>
                    </tr>
                    <tr>
                        <th class="tt ct">所屬中分類</th>
                        <td class="pp">
                            <select name="mid" id="mid" class="form-select"></select>
                        </td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品編號</th>
                        <td class="pp"><?= $goods['no']; ?></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品名稱</th>
                        <td class="pp"><input type="text" name="name" value="<?= $goods['name']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品價格</th>
                        <td class="pp"><input type="text" name="price" value="<?= $goods['price']; ?>" class="form-control"></td>
                    </tr>

                    <tr>
                        <th class="tt ct">庫存量</th>
                        <td class="pp"><input type="text" name="stock" value="<?= $goods['stock']; ?>" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品圖片</th>
                        <td class="pp"><input type="file" name="img" value="" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品介紹</th>
                        <td class="pp"><textarea name="intro" style="width:100%;height:150px;" class="form-control"><?= $goods['intro']; ?></textarea></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-5">
                <input type="hidden" name="id" value="<?= $goods['id']; ?>">
                <input class="btn my-btn-ok" type="submit" value="編輯">
                <input class="btn my-btn-reset" type="reset" value="重置">
                <input class="btn btn-dark" type="button" value="取消" onclick="location.href='?do=th'">
            </div>
        </form>
    </div>
</div>
<script>
    getTypes('big', 0)

    $("#big").on("change", function() {
        getTypes('mid', $("#big").val())
    })

    function getTypes(type, big_id) {
        $.get("./api/get_types.php", {
            big_id
        }, (types) => {
            switch (type) {
                case 'big':
                    $("#big").html(types)
                    $("#big").val(<?= $goods['big']; ?>)
                    getTypes('mid', $("#big").val())

                    break;
                case 'mid':
                    $("#mid").html(types)
                    $("#mid").val(<?= $goods['mid']; ?>)
                    break;
            }
        })
    }
</script>