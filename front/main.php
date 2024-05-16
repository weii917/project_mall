<!-- about us start -->
<div class="row">
	<div id="item-1-us"></div>
	<div class="col-12 col-lg-8 mx-auto about-us-box">
		<div id="about-us-left" class="row mt-5 mb-5">
			<div class="col-12 col-sm-7 d-flex mt-5 mx-auto">
				<div class="about-us d-flex justify-content-center flex-column">
					<h1 class="mb-5">關於我們</h1>
					<div id="mwwwtext" loop="true" class="my-line-height">

					</div>
				</div>
			</div>
			<!--輪播圖片start-->
			<div class="col-12 col-sm-5 d-flex mt-5 mx-auto">
				<div class="my-img">
					<i class="fa-solid fa-paw my-cat-hand"></i>
					<div id="mwww" loop="true" style="width:100%; height:100%;">
						<div style="width:99%; height:100%; position:relative;" class="cent">沒有資料</div>
					</div>
				</div>
			</div>
			<!--輪播圖片end-->

		</div>
	</div>
</div>

<!--輪播圖片js start -->
<script>
	// 宣告一個陣列，把資料庫撈出來的img檔名，存進lin裡面，顯示圖片時依據索引顯示
	var lin = new Array();
	var linText = new Array();
	<?php
	$lins = $Mvim->all(['sh' => 1]);
	foreach ($lins as $lin) {
		echo "lin.push('{$lin['img']}');";
		echo "linText.push(`{$lin['text']}`);";
	}
	?>

	var now = 0;
	// 一載入網頁執行顯示照片，在now變1之前先執行1次顯示索引0第一張照片，因3秒後才會顯示輪播照片，並且now=1
	ww();
	// 如果大於1有2張圖片執行每三秒輪播圖片，
	if (lin.length > 1) {
		setInterval("ww()", 3000);
		now = 1;
	}

	function ww() {
		$("#mwww").html("<embed  class='about-us-img' loop=true src='./img/" + lin[now] + "' style='width:99%; height:100%;'></embed>")

		$("#mwwwtext").html("<pre loop=true>" + linText[now] + "</pre>")

		now++;
		if (now >= lin.length)
			now = 0;
	}
</script>
<!--輪播圖片js end  -->
<!-- about us end -->

<img class="fixed-image" src="./img/bg.jpg" alt="fixed-image" />
<!--item room start  -->
<div id="item-2-room"></div>
<div class="room-container room mx-auto row">
	<!-- d-flex讓card一樣高 -->
	<div class="row justify-content-end ">

		<h1 class="col-12 col-sm-12 col-lg-2 text-end border-bottom">房型</h1>
	</div>
	<div class="row">


		<?php
		$rows = $Room->all(['sh' => 1]);
		foreach ($rows as $idx => $row) {
		?>
			<div class="col-12 col-md-4 mt-5 mb-5">
				<div class="card">

					<img src="./img/<?= $row['img'] ?>" class="img-top" alt="...">
					<div class="">
						<h5 data-bs-toggle="modal" data-bs-target="#exampleModalLg<?= $idx; ?>" class="room-1-text text-start"><?= $row['room'] ?><br>
							<button type="button" class="btn btn-outline-secondary mt-2 " data-bs-toggle="modal" data-bs-target="#exampleModalLg<?= $idx; ?>">
								more...
							</button>
						</h5>


						<!-- lg start -->
						<div class="modal fade" id="exampleModalLg<?= $idx; ?>" tabindex="-1" aria-labelledby="exampleModalLabel<?= $idx ?>;" aria-hidden="true">
							<div class="modal-dialog modal-xl">
								<div class="modal-content">
									<div class="modal-header">

										<h1 class="modal-title fs-5" id="exampleModalLabel<?= $idx; ?>"><?= $row['room'] ?></h1>

										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-6 p-5 d-flex flex-column justify-content-center align-items-start">
												<pre class="" style="font-size: 16px;"><?= $row['text'] ?></pre>
												<a href="./book.php" class="btn btn-outline-warning">預約去 &nbsp;<i class="fa-solid fa-arrow-right"></i></a>

											</div>
											<img class="col-6" src="./img/<?= $row['img'] ?>" class="img-top" alt="...">
										</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- lg end -->

					</div>

				</div>
			</div>
		<?php
		}
		?>



	</div>
</div>
<!--item room end  -->
<div id="item-2-goods"></div>
<!-- <?php
		$type = $_GET['type'] ?? 0;
		$nav = '';
		$goods = null;
		if ($type == 0) {
			$nav = "全部商品";
			$goods = $Goods->all(['sh' => 1]);
		} else {
			$t = $Type->find($type);
			if ($t['big_id'] == 0) {
				$nav = $t['name'];
				$goods = $Goods->all(['sh' => 1, 'big' => $t['id']]);
			} else {
				$b = $Type->find($t['big_id']);
				$nav = $b['name'] . " > " . $t['name'];
				$goods = $Goods->all(['sh' => 1, 'mid' => $t['id']]);
			}
		}

		?> -->
<!-- <h2><?= $nav; ?></h2> -->
<!-- goods start -->
<div class="goods-container room mx-auto row">
	<div class="col-8 mx-auto">
		<div class="row justify-content-end ">

			<h1 class="col-12 col-sm-12 col-lg-2 text-end border-bottom">商品</h1>
		</div>
		<div class="row">


			<?php
			foreach ($goods as $idx => $good) {
			?>
				<div class="col-12 col-lg-3 col-md-6 mt-5 mb-5">
					<div class="card">
						<div class="goods-img">
							<a href="detail.php?id=<?= $good['id']; ?>">
								<img src="./img/<?= $good['img'] ?>">
							</a>
						</div>

						<div class="">
							<h3 class="goods-text text-center">
								<div style="text-align:center;" onclick="buy(<?= $good['id']; ?>,1)">
									<span class="px-3"><i class="fa-regular fa-heart"></i></span>
									<span class="px-3"><i class="fa-solid fa-cart-shopping" title='放入購物車'></i></span>
								</div>
								<!-- <img src="./icon/0402.jpg" style="float:right" onclick="buy(<?= $good['id']; ?>,1)"> -->
							</h3>
							<div>
								<h3><?= $good['name'] ?></h3>
								<pre style="color:red;font-size:24px">$<?= $good['price']; ?></pre>

							</div>


							<!-- lg start -->


						</div>

					</div>
				</div>
			<?php
			}
			?>


		</div>
	</div>
	<!-- d-flex讓card一樣高 -->

</div>
<!-- goods end -->
<!-- contact start -->
<div id="item-3-contact"></div>
<div class="row">
	<div class="mx-auto col-12 col-sm-10 my-contact-container">
		<div class="row justify-content-start ">

			<h1 class="col-12  col-lg-4  border-bottom">聯絡我們</h1>
		</div>
		<div class="row p-5 my-iframe-box ">

			<div class="row">
				<div class="d-flex justify-content-center align-items-center col-12 col-sm-6 my-iframe p-2">
					<?= $Address->find(1)['iframe']; ?>
					<!-- <iframe class="" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7036493264513!2d121.41951560000001!3d25.044129299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7bec9ad74b1%3A0xa639904a89f26435!2z5Yue5YuV6YOo5Yue5YuV5Yqb55m85bGV572y5YyX5Z-65a6c6Iqx6YeR6aas5YiG572y5rOw5bGx6IG35qWt6KiT57e05aC0!5e0!3m2!1szh-TW!2stw!4v1704804706249!5m2!1szh-TW!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
				</div>
				<div class="d-flex flex-column justify-content-center my-iframe-text col-12 col-sm-6 ">
					地址:<?= $Address->find(1)['address']; ?><br>
					電話:<?= $Address->find(1)['tel']; ?><br>


					<hr>
					營業時間:
					<?= $Address->find(1)['timing']; ?><br>
					<br>

					開放時間（參觀、入退房）:
					<?= $Address->find(1)['open']; ?><br>
					<hr>
					FB:
					<?= $Address->find(1)['fb']; ?><br>

					Line:
					<?= $Address->find(1)['line']; ?><br>

					Email:
					<?= $Address->find(1)['email']; ?><br>

					v:
					<?= $Address->find(1)['ig']; ?><br>

				</div>

			</div>
		</div>
	</div>
</div>
<!-- contact end -->

<!-- news start -->
<div id="item-5-news"></div>
<div class="row">
	<div class="col-12 col-lg-7 mx-auto my-news-container">
		<div class="d-flex justify-content-end ">

			<h1 class="d-flex col-12 col-lg-2 text-end border-bottom">住宿須知</h1>
		</div>
		<div class="mx-auto my-news">
			<i class="fa-solid fa-paperclip my-news-icon"></i>
			<!-- <div class="text-center mt-4 h3">住宿須知

			</div> -->
			<!--class='all'框框的訊息先隱藏，當hover會觸發function動作顯示出來  -->
			<ul class="p-5" style="list-style-type:decimal;">
				<?php
				$news = $News->all(['sh' => 1, 'news_id' => 0], ' limit 20');
				foreach ($news as $n) {
					echo "<li>";
					echo mb_substr($n['text'], 0, 100);
					echo "<div style='display:none'>";
					echo $n['text'];
					echo "</div>";
					echo "</li>";
					echo "<hr>";
					$subnews = $News->all(['sh' => 1, 'news_id' => $n['id']], ' limit 20');
					foreach ($subnews as $sn) {
						echo "<ul>";
						echo mb_substr($sn['text'], 0, 100);
						echo "<div class='all' style='display:none'>";
						echo $sn['text'];
						echo "</div>";
						echo "</ul>";
						echo "<hr>";
					}
				}

				?>
			</ul>


		</div>
	</div>
</div>
<!-- news end -->


<script>
	function buy(id, qt) {
		$.post("./api/buycart.php", {
			id,
			qt
		}, (amount) => {
			$("#amount").text(amount)
			alert("加入購物車成功")
		})
	}

	function buymore(idmore) {
		let qtmore = $("#qtmore").val()
		console.log(qtmore);
		// location.href = `buycart.php?id=${idmore}&qt=${qtmore}`
	}
</script>