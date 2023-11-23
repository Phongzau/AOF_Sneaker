    <?php 
	$html_sp =  showsp($sp_all)
	?>
	<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li><a href="#">Category</a></li>
							<li>Page active</li>
						</ul>
					</div>
					<h1>Shoes - Grid listing</h1>
				</div>
			</div>
			<img src="public/client/img/bg_cat_shoes.jpg" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->
		<div class=""></div>
			<div id="stick_here"></div>		

			<!-- /toolbox -->

			<div class="container margin_30">
			<div class="row small-gutters">
				<?=	$html_sp ?>
				</div>
				<!-- /col -->				
			</div>

	</main>
	<!-- /main -->
