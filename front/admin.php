<?php
include_once "../api/db.php";
if (isset($_SESSION['admin'])) {
	to("back.php");
}


if (isset($_GET['error'])) {
	echo "<script>alert('{$_GET['error']}')</script>";
}

?>
<!-- <div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;"> -->
<!-- <?php include "marquee.php"; ?> -->
<!-- <div style="height:32px; display:block;"></div> -->
<!--正中央-->
<!-- <form method="post" action="./api/check.php">
		<p class="t botli">管理員登入區</p>
		<p class="cent">帳號 ： <input name="acc" autofocus="" type="text"></p>
		<p class="cent">密碼 ： <input name="pw" type="password"></p>
		<p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
	</form> -->
<!-- </div> -->
<!-- my -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>管理員登入</title>
	<!-- bootstrap -->
	<link rel="stylesheet" href="../plugin/css/bootstrap.css">
	<script src="../plugin/js/bootstrap.bundle.js"></script>
	<!-- css -->
	<link href="../css/css.css" rel="stylesheet" type="text/css">
	<!-- font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- js -->
	<script src="../js/jquery-3.4.1.min.js"></script>
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
				<div class="login p-5">


					<!-- Email input -->
					<h3 class="mb-2">管理員登入</h3>

					<div class="mb-3">
						<label for="formGroupExampleInput" class="form-label">帳號</label>
						<input name="acc" style="border: none; border-bottom: 1px solid lightgray;" type="text" class="form-control" id="acc" placeholder="account">
					</div>


					<!-- Password input -->
					<div class="mb-3">
						<label for="formGroupExampleInput2" class="form-label">密碼</label>
						<input name="pw" style="border: none; border-bottom: 1px solid lightgray;" type="password" class="form-control" id="pw" placeholder="password">
					</div>

					<!-- 2 column grid layout for inline styling -->
					<div class="row mb-4">
						<div class="col d-flex justify-content-center">
							<!-- Checkbox -->
							<!-- <div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
									<label class="form-check-label" for="form2Example31"> Remember me </label>
								</div> -->
						</div>

						<div class="col">
							<!-- Simple link -->
							<!-- <a href="#!">Forgot password?</a> -->
						</div>
					</div>

					<!-- Submit button -->
					<input type="hidden" name="table" value="admin"></input>
					<button onclick="login('admin')" class="my-btn-login btn  btn-block mb-4">確認</button>
					<!-- <input type="button" value="提交" onclick="login('admin')" class="my-btn-login btn  btn-block mb-4"></input> -->
					<input type="reset" value="清除" class="my-login-reset btn  btn-block mb-4"></p>


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
	function login(table) {

		$.post("../api/chk_pw.php", {
				table,
				acc: $("#acc").val(),
				pw: $("#pw").val()
			},
			(res) => {
				if (parseInt(res) == 0) {
					alert("帳號或密碼錯誤，請重新輸入")
				} else {
					location.href = '../back.php';
				}
			})

	}
</script>