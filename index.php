<?php include_once "./api/db.php"; ?>

<!DOCTYPE html>
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>貓旅館</title>
	<!-- font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@500;600&display=swap" rel="stylesheet">
	<!-- bootstrap -->
	<link rel="stylesheet" href="./plugin/css/bootstrap.css">
	<script src="./plugin/js/bootstrap.bundle.js"></script>
	<script src="./plugin/js/bootstrap.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- 乙級原有 -->
	<link rel="stylesheet" href="./css/css.css">
	<script src="./js/jquery-3.4.1.min.js"></script>
	<script src="./js/js.js"></script>

	<!-- animate -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- <script src="./plugin/js/jquery.js"></script>
	<script src="./plugin/js/bootstrap.js"></script> -->
</head>
<!-- style="background-color: #B9887D; color:aliceblue; -->

<body>
	<nav class="navbar navbar-expand-lg sticky-top " style="background-color: #B9887D; color:aliceblue;opcity:8">
		<div class="container-fluid">
			<i class="fa-solid fa-paw"></i>
			<a class="navbar-brand ms-2" href="index.php">貓旅</a>
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
	<!-- modal顯示區塊 -->
	<div id="cover" style="display:none; ">
		<div id="coverr">
			<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>

			<hr>
			<div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
		</div>
	</div>

	<div class="title container-fluid p-0 mb-3">

		<!-- 14.顯示title圖片 -->
		<?php
		$title = $Title->find(['sh' => 1]);
		?>
		<a title="<?= $title['text']; ?>" href="index.php">
			<div class="title-img col" style="background:url(&#39;./img/<?= $title['img']; ?>&#39;); background-size:cover; background-position: center;"></div><!--標題-->
			<!-- <div class="my-title-text-1">最細心的照料</div> -->
			<div class="col-12 col-lg-2 my-title-text animate__animated animate__bounceIn">
				<pre><?= $title['text'] ?></pre>
			</div>
		</a>

		<!-- 結束title圖片 -->



	</div>


	<div class="container-fluid">

		<!-- main -->

		<!--1. 中間主要顯示區塊 ，中間拆分切板至front資料夾下，以get取值include該區塊檔案front裡-->
		<?php

		$do = $_GET['do'] ?? 'main';
		$file = "./front/{$do}.php";
		if (file_exists($file)) {
			include $file;
		} else {
			include "./front/main.php";
		}


		?>
		<!-- 結束中間主要顯示區塊 -->
		<div id="item-4-img"></div>
		<div class="row">
			<!-- 輪播圖片start -->
			<div id="carouselExampleFade" class="carousel slide carousel-fade mx-auto">
				<div class="carousel-inner">
					<?php
					// 撈出sh=1要顯示的圖片
					$imgs = $Image->all(['sh' => 1]);
					foreach ($imgs as $idx => $img) {
						$activeClass = ($idx === 0) ? 'active' : '';
					?>
						<div class="carousel-item <?= $activeClass; ?>">
							<img src="./img/<?= $img['img']; ?>" class="d-block w-100" alt="environment">
						</div>

					<?php
					}
					?>

				</div>

				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			</div>
			<!-- 輪播圖片end -->

		</div>
	</div>
	<div style="clear:both;"></div>
	<!-- 頁尾顯示區塊 -->

	<div class="container-fluid mt-5 my-footer">
		<div class="row">
			<footer class="container">
				<ul class="mx-auto col-12 col-sm-8 col-lg-6  nav justify-content-center  mb-5 mt-5">
					<li class="nav-item"><a href="#" class="nav-link px-4 text-white">Home</a></li>
					<li class="nav-item"><a href="#item-4-img" class="nav-link px-4 text-white">Features</a></li>
					<li class="nav-item"><a href="#item-2-room" class="nav-link px-4 text-white">Pricing</a></li>
					<li class="nav-item"><a href="#item-5-news" class="nav-link px-4 text-white">FAQs</a></li>
					<li class="nav-item"><a href="#item-3-contact" class="nav-link px-4 text-white">About</a></li>
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
					<div class="col-12  mx-auto d-flex justify-content-between">
						<div class="col-12 text-center text-white">&copy; <?= $Bottom->find(1)['bottom']; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 text-end mx-auto">
						瀏覽人數 :<?= $Total->find(1)['total']; ?>
					</div>
				</div>
			</footer>
		</div>

	</div>
	<!-- 預約成功帶訊息回首頁 -->
	<?php
	if (isset($_SESSION['book'])) {
		echo "<script>alert('" . $_SESSION['book'] . "');</script>";
		unset($_SESSION['book']); // 顯示後清除session中的消息
	}
	// if (isset($_GET['book'])) {
	// 	echo "<script>alert('預約成功，我們會於二十四小時之內與您聯繫');</script>";
	// 	to("index.php");
	// }
	?>

</body>

</html>