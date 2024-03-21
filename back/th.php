<div class="container-fluid">
    <h2 class="ct">商品分類</h2>
    <div class="d-flex justify-content-center">
        <div class="w-40 mx-5">
            新增大分類 <input type="text" name="big" id="big" class="form-control my-2">
            <button onclick="addType('big')" class="btn btn-dark my-2 w-100">新增</button>
        </div>
        <div class="w-40">
            新增中分類
            <select name="big" id="bigs" class="form-control my-2"></select>
            <input type="text" name="mid" id="mid" class="form-control my-2">
            <button onclick="addType('mid')" class="btn btn-dark my-2 w-100">新增</button>
        </div>
    </div>


    <table width="100%" style="text-align: center;" class="table table-dark">
        <?php
        $bigs = $Type->all(['big_id' => 0]);
        foreach ($bigs as $big) {
        ?>
            <tr class="table-secondary">
                <td class="fs-5 fw-bold"><?= $big['name']; ?></td>
                <td class="ct">
                    <button class="btn my-btn-ok" onclick="edit(this,<?= $big['id']; ?>)">修改</button>
                    <button class="btn my-btn-reset" onclick="del('type',<?= $big['id']; ?>)">刪除</button>
                </td>
            </tr>
            <?php
            $mids = $Type->all(['big_id' => $big['id']]);
            foreach ($mids as $mid) {
            ?>
                <tr class="table-light">
                    <td><?= $mid['name']; ?></td>
                    <td>
                        <button class="btn my-btn-ok" onclick="edit(this,<?= $mid['id']; ?>)">修改</button>
                        <button class="btn my-btn-reset" onclick="del('type',<?= $mid['id']; ?>)">刪除</button>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

    <div class="row mt-3  mb-5 my-box-shadow">
        <p class="text-center fs-3 fw-bold">商品管理</p>
        <button onclick="location.href='?do=add_goods'" class="btn btn-dark">新增商品</button>
        <form method="post" action="./api/edit.php">

            <table width="100%" style="text-align: center;" class="table">
                <tbody>
                    <tr class="table-secondary">
                        <td width="10%">編號</td>
                        <td width="40%">商品名稱</td>
                        <td width="10%">庫存量</td>
                        <td width="10%">狀態</td>
                        <td width="30%">操作</td>
                    </tr>

                    <!-- 取資料料表資料放入後台顯示表格中 -->
                    <?php
                    $goods = $Goods->all();
                    foreach ($goods as $good) {
                    ?>
                        <tr class="p-2">
                            <td><?= $good['no']; ?></td>
                            <td><?= $good['name']; ?></td>
                            <td><?= $good['stock']; ?></td>
                            <td><?= ($good['sh'] == 1) ? "販售中" : "已下架"; ?></td>
                            <td style="width:120px">
                                <button class="btn my-btn-ok" type="button" onclick="location.href='?do=edit_goods&id=<?= $good['id']; ?>'">修改</button>
                                <button class="btn my-btn-reset" onclick="del('goods',<?= $good['id']; ?>)">刪除</button>
                                <button class="btn btn-secondary" onclick="sh(1,<?= $good['id']; ?>)">上架</button>
                                <button class="btn btn-outline-dark" onclick="sh(0,<?= $good['id']; ?>)">下架</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <!-- <table class="mt-5" style="margin-top:40px; width:100%;">
                <tbody>
                    <tr>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <td width="200px"><input class="btn btn-dark" type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增網站標題圖片"></td>
                        <td class="cent">
                            <input class="btn my-btn-ok" type="submit" value="修改確定">
                            <input class="btn my-btn-reset" type="reset" value="重置">
                        </td>
                    </tr>
                </tbody>
            </table> -->

        </form>
    </div>
</div>

<script>
    getTypes(0)

    function edit(dom, id) {
        let name = prompt("請輸入你要修改的分類名稱:", `${$(dom).parent().prev().text()}`)
        if (name != null) {
            $.post("./api/save_type.php", {
                name,
                id
            }, () => {
                $(dom).parent().prev().text(name)
                //location.reload();
            })
        }
    }

    function getTypes(big_id) {
        $.get("./api/get_types.php", {
            big_id
        }, (types) => {
            $("#bigs").html(types)
        })
    }

    function addType(type) {
        let name
        let big_id;

        switch (type) {
            case 'big':
                name = $("#big").val();
                big_id = 0;
                break;
            case 'mid':
                name = $("#mid").val();
                big_id = $("#bigs").val();
                break;
        }

        $.post("./api/save_type.php", {
            name,
            big_id
        }, () => {
            location.reload();
        })
    }

    function sh(sh, id) {
        $.post("./api/sh.php", {
            id,
            sh
        }, () => {
            location.reload();
        })
    }
</script>