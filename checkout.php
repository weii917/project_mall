<?php include_once "./api/db.php";

?>

<!-- table.all>tr*6>td.tt.ct+td.pp>input:text -->
<?php
if (empty($_SESSION['mem'])) {
    to("./front/login.php");
}
$row = $Mem->find(['acc' => $_SESSION['mem']]);

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
        <form action="./api/order.php" method="post">
            <div class="row">
                <div class="checkout p-5">


                    <h3 class="mb-2">填寫資料</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">姓名</label>
                        <input name="name" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="name" value="<?= $row['name']; ?>">
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="" class="form-label">帳號</label>
                        <input name="acc" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="acc" value="<?= $row['acc']; ?>" disabled>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">電話</label>
                        <input name="tel" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="tel" value="<?= $row['tel']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">住址</label>
                        <input name="addr" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="addr" value="<?= $row['addr']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">電子信箱</label>
                        <input name="email" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="email" value="<?= $row['email']; ?>">
                    </div>

                </div>

                <div class="buycart-box col-12 pb-5 justify-content-center d-flex flex-column align-items-centers mx-auto">


                    <div class="row p-5">
                        <?php

                        if (isset($_GET['id'])) {
                            $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
                        }





                        if (empty($_SESSION['cart'])) {
                        ?>
                            <div style="width:100%;height:50vh;background-color:white" class="text-center my-buycart-bg">
                                <h3 class="text-center" style="color: white;">購物車內無任何商品</h3>
                                <button class="my-buycart-back btn" type='button' onclick="location.href='index.php#item-2-goods'">繼續購物</button>
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
                                                <?= $qt; ?>
                                            </td>

                                            <td class="px-3 py-5"><?= $goods['price']; ?></td>
                                            <td class="px-3 py-5"><?= $goods['price'] * $qt; ?></td>

                                            <td class="px-3 py-5"> <span onclick="delCart(<?= $id; ?>)"><i class="fa-solid fa-trash"></i></span></td>
                                        </tr>
                                    <?php
                                        $total += $goods['price'] * $qt;
                                    }
                                    ?>
                                    <tr>
                                        <td class="px-3 py-5 text-center" colspan="7">總計: $NT <span style="font-size: 32px;"><?= $total; ?></span></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="col-12 mx-auto d-flex justify-content-between">
                                <button class="my-buycart-back btn" type="button" onclick="location.href='buycart.php'">返回購物車</button>
                                <input class="my-btn-buycart btn" type="submit" value="結帳">
                                <input type="hidden" name="total" value="<?= $total; ?>">
                            </div>

                            <script>
                                function delCart(id) {
                                    $.post("./api/del_cart.php", {
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
        </form>
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

</html>