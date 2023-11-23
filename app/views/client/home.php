<?php
$html_showbanner = show_banner_client($dsbanner);
$html_showsp = showsp($dssp);
$html_showspfeatured = showsp_featured($dssp);
$html_showsponehot = showsp_one_hot($sphot);
$html_sphot = showsp($sphot4);
$html_baiviet = showds_baiviet_cl_home($bvhome)
?>
<main>
	  <!-- sản phẩm mới -->
	<?=$html_showbanner;?>
		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Sản Phẩm Mới</h2>
				<p>Sản Phẩm Mới Của Chúng Tôi</p>
			</div>
			<div class="row small-gutters">
				<?=$html_showsp?>
				</div>
		<?=$html_showsponehot?>
		</div>

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Sản Phẩm Nhiều Lượt xem</h2>
				<p>Sản Phẩm Hot</p>
			</div>
			<div class="row small-gutters">
				<?=$html_sphot?>
				</div>
				<div class="main_title">
				<h2>Sản Phẩm Có Lượt Xem Nhiều Nhất</h2>
			</div>
				<?=$html_showsponehot?>
		</div>

		<!-- /container -->
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="public/client/img/brands/placeholder_brands.png" data-src="public/client/img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="public/client/img/brands/placeholder_brands.png" data-src="public/client/img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="public/client/img/brands/placeholder_brands.png" data-src="public/client/img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="public/client/img/brands/placeholder_brands.png" data-src="public/client/img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="public/client/img/brands/placeholder_brands.png" data-src="public/client/img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="public/client/img/brands/placeholder_brands.png" data-src="public/client/img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item --> 
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Bài Viết Mới</h2>
				<span>Blog</span>

			</div>
			<div class="row">

			<?=$html_baiviet?>
				
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->