    <?php 
	$html_sp =  showsp($dssp);
	$html_showsponehot = showsp_one_hot($sphot);
	?>
	<main>
	<?=$html_showsponehot?>
		<div class=""></div>
			<div id="stick_here"></div>		
			<!-- /toolbox -->
			
			<div class="main_title p-5">
				<h2>Sản Phẩm </h2>
				<p><?=$titlepage?></p>
			</div>
			<div class="container margin_30">
			<div class="row small-gutters">
				<?=	$html_sp ?>
				</div>
				<!-- /col -->				
			</div>

	</main>
	<!-- /main -->
