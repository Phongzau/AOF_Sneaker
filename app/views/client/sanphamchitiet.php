<?php
	if (is_array($spchitiet) && count($spchitiet) > 0) {
		extract($spchitiet);
	}
	$html_optionsizebienthesp = option_size_bienthe_sanpham($btsize);
	$html_showsplq = showsp_lienquan($splienquan);
    $html_showhasp = showha_sp($hasp);
    $html_showhaspitembox = showha_sp_itembox($hasp);
    $idbl= $_GET['idpro']; 
    $formattedPrice = number_format($price, 0, '.', '.');
?>

<main>
<div class="container margin_30">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="all">
                                        <div class="slider">
                                            <div class="owl-carousel owl-theme main">
                                                <div style="background-image: url('<?=IMG_PATH_USER.$img?>');" class="item-box"></div>
                                                <?=$html_showhaspitembox;?>
                                            </div>
                                            <div class="left nonl"><i class="ti-angle-left"></i></div>
                                            <div class="right"><i class="ti-angle-right"></i></div>
                                        </div>
                                        <div class="slider-two">
                                            <div class="owl-carousel owl-theme thumbs">
                                                <div style="background-image: url('<?=IMG_PATH_USER.$img?>');" class="item active"></div>
                                                <?=$html_showhasp;?> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- /page_header -->
                                    <div class="prod_info">
                                        <form action="index.php?cl=addcart" method="POST">
                                        <h1><?=$name?></h1>
                                        <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                                        <p><small>SKU: AOF-<?=$id_sp?></small><br><?=$mota?></p>
                                        <div class="prod_options">
                                            <div class="row">
                                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
													<div class="custom-select">
													<select data-id="<?=$id_sp?>" id="sizeSelect" onchange="getSLSizeShoes()" name="dungluong">
													<?=$html_optionsizebienthesp;?>
                               						</select>
													</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong><span id="soLuongSize">Số Lượng: (<?=$tongsl?>)</span></strong></label>
                                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                                    <div class="numbers-row">
                                                        <input type="number" value="1" min="1" id="soluongInput" class="qty2" name="soluong">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Lượt xem(<?=$view?>)</strong></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="price_main"><span class="new_price"><?=$formattedPrice?> VND</span></div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <input type="hidden" name="id_sp" value="<?=$id_sp?>">
                                                <input type="hidden" name="name" value="<?=$name?>">
                                                <input type="hidden" name="img" value="<?=$img?>">
                                                <input type="hidden" name="price" value="<?=$price?>">
                                                <input type="hidden" name="size" value="<?=$dungluong?>">
                                                
                                                <div class="btn_add_to_cart"><button type="submit" class="btn_1" name="addcart">Đặt hàng</button></div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /prod_info -->
                                    <div class="product_actions">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /product_actions -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                        
                        <div class="tabs_product">
                            <div class="container">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Mô tả</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Đánh giá</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /tabs_product -->
                        <div class="tab_content_wrapper">
                            <div class="container">
                                <div class="tab-content" role="tablist">
                                    <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                                        <div class="card-header" role="tab" id="heading-A">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                                    Mô tả
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                                            <div class="card-body">
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-6">
                                                        <h3>Chi tiết</h3>
                                                        <p><?=$mota?></p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <h3>Đặc tả</h3>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Color</strong></td>
                                                                        <td>Blue, Purple</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Size</strong></td>
                                                                        <td>41</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Weight</strong></td>
                                                                        <td>0.6kg</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Manifacturer</strong></td>
                                                                        <td>Manifacturer</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /table-responsive -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /TAB A -->
                                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                                        <div class="card-header" role="tab" id="heading-B">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                                    Reviews
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                            <div class="card-body">
                                             <iframe src="app/views/client/binhluan.php?id=<?=$idbl?>" width="100%" height="500px" frameborder="0"></iframe>
                                            </div>
                                            <!-- /card-body -->
                                        </div>
                                    </div>
                                    <!-- /tab B -->
                                </div>
                                <!-- /tab-content -->
                            </div>
                            <!-- /container -->
                        </div>
                        <!-- /tab_content_wrapper -->
	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Đặc sắc</h2>
	            <span>Các sản phẩm liên quan</span>
	            <p>Sản phẩm liên quan</p>
	        </div>
			<div class="owl-carousel owl-theme products_carousel">
	        <?=$html_showsplq;?>
			</div>
	    </div>
	    <!-- /container -->

	    <div class="feat">
			<div class="container">
            <ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Miễn phí vận chuyển</h3>
								<p>Cho tất cả các Sản Phẩm trên 500.000</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Thanh toán an toàn</h3>
								<p>Thanh toán an toàn 100%</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>Hỗ trợ 24/7</h3>
								<p>Hỗ trợ trực tuyến hàng đầu</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->

	</main>
	<!-- /main -->