<?php 
$html_blog = showds_baiviet_cl_blog($bv);
$html_blog_sb = showds_baiviet_cl_blog_sb($bvnew) ;
?>

<main class="bg_gray">
		<div class="container margin_30">
			<div class="page_header">
				<h1>Allaia Blog &amp; News</h1>
			</div>
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-9">
					<div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
						<div class="form-group">
							<input type="text" name="search" id="search" class="form-control" placeholder="Search..">
							<button type="submit"><i class="ti-search"></i></button>
						</div>
					</div>
					<!-- /widget -->
					<div class="row">
						<?=$html_blog?>
						<!-- /col -->
					</div>
					<!-- /row -->
					<!-- /pagination -->

				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Bài Viết Mới</h4>
						</div>
						<ul class="comments-list">
            		<?=$html_blog_sb?>
						</ul>
					</div>
					<!-- /widget -->
				
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	