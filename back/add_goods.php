<div class="col" style="height: 80%;">
    <div class="row mt-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">新增商品</p>
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
                        <td class="pp">完成分類後自動分配</td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品名稱</th>
                        <td class="pp"><input type="text" name="name" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品價格</th>
                        <td class="pp"><input type="text" name="price" class="form-control"></td>
                    </tr>

                    <tr>
                        <th class="tt ct">庫存量</th>
                        <td class="pp"><input type="text" name="stock" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品圖片</th>
                        <td class="pp"><input type="file" name="img" class="form-control"></td>
                    </tr>
                    <tr>
                        <th class="tt ct">商品介紹</th>
                        <td class="pp"><textarea name="intro" style="width:100%;height:150px;" class="form-control"></textarea></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center mt-5">

                <input class="btn my-btn-ok" type="submit" value="新增">
                <input class="btn my-btn-reset" type="reset" value="重置">
                <input class="btn btn-dark" type="button" value="返回" onclick="location.href='?do=th'">
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
                    getTypes('mid', $("#big").val())
                    break;
                case 'mid':
                    $("#mid").html(types)
                    break;
            }
        })
    }
</script>