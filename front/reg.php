<?php
include_once "../api/db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../plugin/css/bootstrap.css">
    <script src="../plugin/js/bootstrap.bundle.js"></script>
    <!-- css -->
    <link href="../css/css.css" rel="stylesheet" type="text/css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- js -->
    <script src="../js/jquery-1.9.1.min.js"></script>
    <script src="../js/js.js"></script>


</head>

<body>
    <div class="container-fluid">

        <div class="row d-flex">
            <div class="col-12 col-sm-6 col-lg-6 login-box pb-5 justify-content-center d-flex flex-column align-items-center">
                <h2 class="login-logo">
                    <h2 class="login-logo"><i class="fa-solid fa-paw"></i>
                        <a class="navbar-brand link-offset-2 link-underline link-underline-opacity-10 ms-2" href="../index.php">貓旅</a>
                    </h2>
                </h2>
                <div class="reg p-5">


                    <h3 class="mb-2">會員註冊</h3>
                    <div class="mb-3">
                        <label for="" class="form-label">姓名</label>
                        <input name="name" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="name" placeholder="name">
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <label for="" class="form-label">帳號</label>
                        <input name="acc" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="acc" placeholder="account">
                        <button class="btn btn-dark m-2" style="float:right" onclick="chkacc()">檢測帳號</button>
                    </div>


                    <!-- Password input -->
                    <div class="mb-3">
                        <label for="" class="form-label">密碼</label>
                        <input name="pw" style="border: none; border-bottom: 1px solid lightgray;" type="password" class="form-control" id="pw" placeholder="password">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">電話</label>
                        <input name="tel" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="tel" placeholder="telphone">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">住址</label>
                        <input name="addr" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="addr" placeholder="address">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">電子信箱</label>
                        <input name="email" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="email" placeholder="email">
                    </div>


                    <!-- Submit button -->
                    <input type="hidden" name="table" value="admin"></input>
                    <button onclick="reg()" class="my-btn-login btn  btn-block mb-4">註冊</button>
                    <!-- <input type="button" value="提交" onclick="login('admin')" class="my-btn-login btn  btn-block mb-4"></input> -->
                    <button onclick='clean()' class="my-login-reset btn  btn-block mb-4">清除</button>


                </div>

            </div>
            <div class="col-12 col-sm-6 col-lg-6 login-box px-0">
                <img class="login-img" src="https://images.unsplash.com/photo-1683000789824-b7529dcb26a0?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            </div>
        </div>
    </div>
    <div class="container-fluid my-footer">
        <div class="row">
            <footer class="col">
                <ul class="mx-auto col-12 col-sm-8 col-lg-6  nav justify-content-center  mb-5 mt-5">
                    <li class="nav-item"><a href="../index.php" class="nav-link px-4 text-white">Home</a></li>
                    <li class="nav-item"><a href="../index.php#item-4-img" class="nav-link px-4 text-white">Features</a></li>
                    <li class="nav-item"><a href="../index.php#item-2-room" class="nav-link px-4 text-white">Pricing</a></li>
                    <li class="nav-item"><a href="../index.php#item-5-news" class="nav-link px-4 text-white">FAQs</a></li>
                    <li class="nav-item"><a href="../index.php#item-3-contact" class="nav-link px-4 text-white">About</a></li>
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
<script>
    function reg() {
        let user = {
            name: $("#name").val(),
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            tel: $("#tel").val(),
            addr: $("#addr").val(),
            email: $("#email").val(),
        }
        if (user.acc != '' && user.pw != '' && user.tel != '' && user.addr != '' && user.email != '' && user.name != '') {
            $.get("../api/chk_acc.php", {
                acc: user.acc
            }, (res) => {
                if (parseInt(res) == 1 || user.acc == 'admin') {
                    alert(`此帳號${user.acc}已被使用`)
                } else {
                    $.post("../api/save_mem.php", user, () => {
                        alert("註冊成功，歡迎加入")
                        location.href = 'login.php'
                    })

                }
            })
        } else {
            alert('請輸入!!!')
        }

    }

    function chkacc() {
        let acc = $("#acc").val()
        if (acc != '') {
            $.get("../api/chk_acc.php", {
                acc
            }, (res) => {
                if (parseInt(res) == 1 || acc == 'admin') {
                    alert(`此帳號${acc}已被使用`)
                } else {

                    alert(`此帳號${acc}可以使用`)

                }
            })
        } else {
            alert('請輸入帳號!!!')
        }

    }

    function clean() {
        $("#name,#acc,#pw,#tel,#addr,#email").val('');
    }
</script>