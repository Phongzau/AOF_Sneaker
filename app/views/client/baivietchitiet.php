<?php
 if(is_array($baiviet)){
    extract($baiviet);
 }
 $html_blog_sb = showds_baiviet_cl_blog_sb($bvnew) ;
?>


<main class="bg_gray">
		<div class="container margin_30">
			<!-- /page_header -->
			<div class="row">
				<div class="col-lg-9">
					<div class="singlepost">
						<figure><img alt="" class="img-fluid text-center " src="<?=IMG_PATH_ADMIN.$img?>">
                            </figure>
						<h1><?=$tieude?></h1>
						<!-- /post meta -->
						<div class="post-content">

							<p><?=$noidung?></p>
						</div>
						<!-- /post -->
					</div>
					<!-- /single-post -->
					<hr>
				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Bài Viết Mới</h4>
						</div>
						<ul class="comments-list">
                    <?= $html_blog_sb ?>
						</ul>
					</div>
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->