<?php include_once "./api/db.php";
if (!isset($_SESSION['mem'])) {
    to("./front/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buycart</title>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500;600&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./plugin/css/bootstrap.css">
    <script src="./plugin/js/bootstrap.bundle.js"></script>
    <script src="./plugin/js/bootstrap.js"></script>


    <!-- css -->
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- 乙級原有 -->
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top " style="background-color: #B9887D; color:aliceblue;">
        <div class="container-fluid">
            <i class="fa-solid fa-paw"></i>
            <a class="navbar-brand ms-2" href="./index.php">貓旅</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><span class="my-size-big">&nbsp;<i class="fa-solid fa-house text-white "></i>&nbsp;&nbsp;
                            </span></a>
                    </li>
                    <!-- 主選單start -->
                    <?php
                    $mainmu = $Menu->all(['sh' => 1]);
                    foreach ($mainmu as $main) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="<?= $main['href']; ?>">&nbsp;<?= $main['text']; ?>
                            </a>

                        </li>
                    <?php
                    }
                    ?>
                    <!-- 主選單end -->


                </ul>
                <!-- <form class="d-flex" role="search">

					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-light" type="submit">Logout</button>
				</form> -->
                <?php
                if (isset($_SESSION['mem'])) {
                ?>
                    <button class="my-btn btn btn-outline-light p-2 " onclick="lo('buycart.php')">
                        <i class="fa-solid fa-cart-shopping"></i>(
                        <span id='amount'>
                            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }
                            ?>
                        </span> )</button> &nbsp; &nbsp; |&nbsp; &nbsp;
                    <button class="btn btn-outline-light p-2 m-2" onclick="lo('./api/logout.php')" type="button">登出</button> &nbsp; &nbsp; |&nbsp; &nbsp;
                <?php
                } else {
                ?>
                    <button class="my-btn btn btn-outline-light p-2" onclick="lo('buycart.php')">
                        <i class="fa-solid fa-cart-shopping"></i>(
                        <span id='amount'>
                            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }
                            ?>
                        </span> )</button>&nbsp; &nbsp; |&nbsp; &nbsp;
                    <button class="my-btn btn btn-outline-light p-2" onclick="lo('./front/login.php')">會員登入</button>&nbsp; &nbsp;|&nbsp; &nbsp;

                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['admin'])) {
                ?>

                    <button class="my-btn btn btn-outline-light p-2" onclick="lo('back.php')">返回管理</button>&nbsp; &nbsp; |&nbsp; &nbsp;
                <?php
                } else {
                ?>
                    <button class="my-btn btn btn-outline-light" onclick="lo('./front/admin.php')">管理登入</button>&nbsp; &nbsp; |&nbsp; &nbsp;
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="row">

            <div class="buycart-box col-12 pb-5 justify-content-center d-flex flex-column align-items-centers mx-auto">


                <div class="row p-5">
                    <?php

                    if (isset($_GET['id'])) {
                        $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
                    }



                    echo "<h2 class='ct'>{$_SESSION['mem']}的購物車</h2>";

                    if (empty($_SESSION['cart'])) {
                    ?>
                        <div style="width:100%;height:50vh;background-color:white" class="text-center my-buycart-bg">
                            <h3 class="text-center pt-3" style="color: white;">購物車內無任何商品</h3>
                            <button class="my-buycart-empty btn" onclick="location.href='index.php#item-2-goods'">繼續購物</button>
                        </div>
                    <?php

                    } else {

                    ?>
                        <div class="table-responsive mt-5 mb-5 p-3" style="width:100vw">
                            <table class="table" style="width:100%">
                                <tr class="">
                                    <td class="px-3 py-5">編號</td>
                                    <td class="px-3 py-5">商品名稱</td>
                                    <td class="px-3 py-5">商品圖片</td>
                                    <td class="px-3 py-5">數量</td>

                                    <td class="px-3 py-5">單價</td>
                                    <td class="px-3 py-5">小計</td>
                                    <td class="px-3 py-5">刪除</td>
                                </tr>
                                <?php
                                $total = 0;
                                foreach ($_SESSION['cart'] as $id => $qt) {
                                    $goods = $Goods->find($id);
                                ?>
                                    <tr>
                                        <td class="px-3 py-5"><?= $goods['no']; ?></td>
                                        <td class="px-3 py-5"><?= $goods['name']; ?></td>
                                        <td class="px-3 py-5"><img src="./img/<?= $goods['img']; ?>" style="width:100px;height:100px"></td>
                                        <td class="px-3 py-5">

                                            <input type="number" class="qt" value="<?= $qt; ?>" data-id="<?= $id; ?>" data-price="<?= $goods['price']; ?>" style="width:60px;" class="form-control">
                                        </td>
                                        <td class="px-3 py-5"><?= $goods['price']; ?></td>
                                        <td class="px-3 py-5"> <input type="text" name="" class="smallTotal" id="smallTotal<?= $id; ?>" value="<?= $goods['price'] * $qt; ?>" class="form-control" style="width:100px;" readonly></td>
                                        <td class="px-3 py-5"> <span onclick="delCart(<?= $id; ?>)"><i class="fa-solid fa-trash"></i></span></td>
                                    </tr>
                                <?php
                                    $total += $goods['price'] * $qt;
                                }
                                ?>
                                <tr>
                                    <td class="px-3 py-5 text-center" colspan="7">總計: $NT <span style="font-size: 32px;" id="addTotal"><?= $total; ?></span></td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-12 mx-auto d-flex justify-content-between">
                            <button class="my-buycart-back btn" onclick="location.href='index.php#item-2-goods'">繼續購物</button>
                            <button class="my-btn-buycart btn" onclick="location.href='checkout.php'">下一步</button>
                        </div>

                        <script>
                            function delCart(id) {
                                $.post("../api/del_cart.php", {
                                    id
                                }, () => {
                                    location.href = "?";
                                })
                            }
                        </script>
                    <?php
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>
    <div class="container-fluid my-footer">
        <div class="row">
            <footer class="col">
                <ul class="mx-auto col-12 col-sm-8 col-lg-6  nav justify-content-center  mb-5 mt-5">
                    <li class="nav-item"><a href="./index.php" class="nav-link px-4 text-white">Home</a></li>
                    <li class="nav-item"><a href="./index.php#item-4-img" class="nav-link px-4 text-white">Features</a></li>
                    <li class="nav-item"><a href="./index.php#item-2-room" class="nav-link px-4 text-white">Pricing</a></li>
                    <li class="nav-item"><a href="./index.php#item-5-news" class="nav-link px-4 text-white">FAQs</a></li>
                    <li class="nav-item"><a href="./index.php#item-3-contact" class="nav-link px-4 text-white">About</a></li>
                </ul>
                <hr>
                <div class="col-12 col-sm-4  mx-auto">
                    <p class=" text-white"><?= $Bottom->find(2)['bottom']; ?><br><?= $Bottom->find(3)['bottom']; ?></p>

                </div>

                <div class="mx-auto col-12 col-sm-4 d-flex flex-column flex-sm-row w-10 gap-2">
                    <label for="newsletter1" class="visually-hidden">Email address</label>
                    <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                    <button class="btn btn-outline-secondary" type="button">Subscribe</button>
                </div>
                <ul class="mx-auto col-12 col-sm-4 nav justify-content-center  pb-3 mt-4">
                    <li><a style="color:white" href="#"><i style="font-size:36px;  width:50px; height:24px;" class="fa-brands fa-line"></i></a></li>
                    <li><a style="color:white" href="#"><i style="font-size:36px;  width:50px; height:24px;" class="fa-brands fa-square-instagram"></i></a></li>
                    <li><a style="color:white" href="#"><i style="font-size:36px;  width:50px; height:24px;" class="fa-brands fa-facebook"></i></a></li>
                </ul>

            </footer>
            <footer class="container bg-dark.bg-gradient p-3">
                <div class="row">
                    <div class="col-12 mx-auto d-flex justify-content-between">
                        <div class="col-12 text-center text-white">&copy; <?= $Bottom->find(1)['bottom']; ?>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-end mx-auto">
                        進站總人數 :<?= $Total->find(1)['total']; ?>
                    </div>
                </div>
            </footer>
        </div>
        <!-- <span class="t col" style="line-height:123px;"><?= $Bottom->find(1)['bottom']; ?></span>
		<span class="t col">進站總人數 :<?= $Total->find(1)['total']; ?> </span> -->
    </div>

</body>
<script>
    // 當數量改變再存到購物車重新存取數量到session，及重新計算總價
    $(".qt").on("change", function() {
        let qt = $(this).val();
        let id = $(this).data('id');
        let price = $(this).data('price');
        let total = 0;
        // console.log('id', id);
        // console.log('qt', qt);
        // console.log('price', price);
        if (qt <= 0) {

            $.post("../api/del_cart.php", {
                id
            }, () => {
                location.href = "?";
            })
        } else {
            $.post("./api/buycart.php", {
                qt,
                id
            }, (amount) => {
                $("#amount").text(amount)
                $(".qt").text(qt)
                let smallTotal = qt * price;
                // console.log('smallTotal', smallTotal);
                $(`#smallTotal${id}`).val(smallTotal);

                $(".smallTotal").each(function() {
                    total += parseInt($(this).val());
                })
                // console.log('Total', total);
                $("#addTotal").text(total);

            });
        }


    })
</script>

</html>