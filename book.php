<?php include_once "./api/db.php";

if (isset($_GET['error'])) {
    echo "<script>alert('{$_GET['error']}')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
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
    <script src="./js/jquery-1.9.1.min.js"></script>
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
                        <a class="nav-link active" aria-current="page" href="./index.php"><span class="my-size-big">&nbsp;<i class="fa-solid fa-house text-white "></i>&nbsp;&nbsp;
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
                <form class="d-flex" role="search">

                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <!-- <button class="btn btn-outline-light" type="submit">Logout</button> -->
                </form>


                <?php
                if (isset($_SESSION['login'])) {
                ?>
                    <button class="btn btn-outline-light p-2 m-2" onclick="lo('./api/logout.php')" type="button">登出</button>
                    <button class="my-btn btn btn-outline-light p-2" onclick="lo('./back.php')">返回管理</button>
                <?php
                } else {
                ?>
                    <button class="my-btn btn btn-outline-light" onclick="lo('./front/login.php')">管理登入</button>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="container-fluid">

        <div class="row">

            <div class="col-12 col-sm-6 col-lg-6 book-box pb-5 justify-content-center d-flex flex-column align-items-centers">


                <div class="row mt-5 mb-5  book p-5">
                    <form class="" method="post" action="./api/check.php">
                        <!-- Email input -->
                        <h3 class="text-center mt-5 pb-3">線上預約</h3>
                        <div class="row ">
                            <div class="col mb-3">
                                <label for="formGroupExampleInput" class="form-label">電子郵件</label>
                                <input required name="email" style="border: none; border-bottom: 1px solid lightgray;" type="email" class="form-control" id="formGroupExampleInput" placeholder="XXX@email.com">
                            </div>
                            <div class="col mb-3">
                                <label for="formGroupExampleInput2" class="form-label">手機號碼</label>
                                <input required name="phone" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="formGroupExampleInput2" placeholder="0900-000-000">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="formGroupExampleInput3" class="form-label">飼主姓名</label>
                                <input required name="name" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="formGroupExampleInput3" placeholder="master">
                            </div>
                            <div class="col mb-3">
                                <label for="formGroupExampleInput4" class="form-label">貓咪姓名</label>
                                <input required name="catname" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="formGroupExampleInput4" placeholder="cat">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="formGroupExampleInput5" class="form-label">預計入住日期</label>
                                <input required name="datein" style="border: none; border-bottom: 1px solid lightgray;" type="date" class="form-control" id="formGroupExampleInput5" placeholder="Another input placeholder">
                            </div>
                            <div class="col mb-3">
                                <label for="formGroupExampleInput6" class="form-label">預計退房日期</label>
                                <input required name="dateout" style="border: none; border-bottom: 1px solid lightgray;" type="date" class="form-control" id="formGroupExampleInput6" placeholder="Another input placeholder">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="formGroupExampleInput7" class="form-label">住宿房型</label>
                                <select name="room" id="formGroupExampleInput7" class="form-control" style="border: none; border-bottom: 1px solid lightgray;">
                                    <option value="經典房">經典房</option>
                                    <option value="溫馨房">溫馨房</option>
                                    <option value="星空房">星空房</option>
                                </select>

                            </div>
                            <div class="col mb-3">
                                <label for="formGroupExampleInput8" class="form-label">入住貓數</label>
                                <select name="catnum" id="formGroupExampleInput8" class="form-control" style="border: none; border-bottom: 1px solid lightgray;">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="4隻以上">4隻以上</option>
                                </select>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col mb-3">
                                <label for="formGroupExampleInput9" class="form-label">如何得知我們</label>
                                <select name="know" id="formGroupExampleInput9" class="form-control" style="border: none; border-bottom: 1px solid lightgray;">
                                    <option value="是我們的老顧客">是我們的老顧客</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Google搜尋">Google搜尋</option>
                                    <option value="朋友介紹">朋友介紹</option>
                                </select>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="formGroupExampleInput10" class="form-label">其他補充事項</label><br>
                                <textarea name="other" id="formGroupExampleInput10" cols="60" rows="5" class="form-control"></textarea>

                            </div>
                        </div>


                        <!-- Submit button -->
                        <input type="hidden" name="table" value="book"></input>
                        <input type="submit" value="提交" class="my-btn-login btn  btn-block mb-4"></input>
                        <input type="reset" value="清除" class="my-login-reset btn  btn-block mb-4"></p>

                    </form>
                </div>

            </div>
            <div class="col-12 col-sm-6 book-box px-0">
                <img class="book-img" src="https://images.unsplash.com/photo-1683000789824-b7529dcb26a0?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
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

</html>