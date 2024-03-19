<?php
include_once "./api/db.php";
$goods = $Goods->find($_GET['id']);

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

            <div class="buycart-box col-12 col-lg-6 pb-5 justify-content-center d-flex flex-column align-items-centers mx-auto">

                <h2 class="ct"><?= $goods['name']; ?></h2>

                <div class='item'>
                    <div class="img">
                        <a href="?id=<?= $goods['id']; ?>">
                            <img src="./img/<?= $goods['img']; ?>" style="width:30vw;height:50vh">
                        </a>
                    </div>
                    <div class="info">
                        <div>分類：<?= $Type->find($goods['big'])['name']; ?></div>
                        <div>編號：<?= $goods['no']; ?></div>
                        <div>價錢：<?= $goods['price']; ?></div>
                        <div>詳細說明：<?= $goods['intro']; ?>...</div>

                    </div>
                </div>
                <div class="text-center pt-5 d-flex mx-auto">
                    購買數量: &nbsp;&nbsp;
                    <button class="btn   btn-light" onclick="decrement()"><i class="fa-solid fa-minus"></i></button>
                    <input type="number" id="qt" value="1" style="width:100px;" class="form-control">
                    <button class="btn   btn-light" onclick="increment()"><i class="fa-solid fa-plus"></i></button>
                    &nbsp;&nbsp;
                    <button class="btn btn-warning text-end" onclick="buy()">我要購買</button>

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
    function buy() {
        let id = <?= $_GET['id']; ?>;
        let qt = $("#qt").val()
        $.post("./api/buycart.php", {
            id,
            qt
        }, (amount) => {
            $("#amount").text(amount)
            alert("加入購物車成功")
        })
        location.href = `./buycart.php?&id=${id}&qt=${qt}`
    }

    function increment() {
        let value = parseInt($("#qt").val());
        $("#qt").val(value + 1);
        // let inputElement = document.getElementById('qt');
        // let value = parseInt(inputElement.value);
        // inputElement.value = value + 1;
    }

    function decrement() {
        let value = parseInt($("#qt").val());
        if (value > 1) {
            $("#qt").val(value - 1);
        }
        // let inputElement = document.getElementById('qt');
        // let value = parseInt(inputElement.value);
        // if (value > 1) {
        //     inputElement.value = value - 1;
        // }
    }
</script>

</html>