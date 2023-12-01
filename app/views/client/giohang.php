<?php
	$html_cart = viewcart();
?>
<main class="bg_gray">
		<form action="index.php?cl=updatecart" method="POST">
		<div class="container margin_30">
		<div class="page_header">
			<Strong><h1>Giỏ hàng</h1></Strong>
		</div>
		<!-- /page_header -->
		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th class="d-inline">
										STT
									</th>
									<th>
										Sản phẩm
									</th>
									<th>
										Ảnh
									</th>
									<th>
										Giá
									</th>
									<th>
										Số lượng
									</th>
									<!-- <th>
										Quantity
									</th> -->
									<th>
										Tổng Tiền
									</th>
									<th>
										Chức năng
									</th>
								</tr>
							</thead>
							<tbody id="order">
								<?=$html_cart;?>
								<?php
									if (empty($_SESSION['giohang'])) {
										$tbcart = "<h2 class=text-center >Giỏ hàng của bạn đang trống<h2>";
										echo $tbcart;
									}
								?>
							</tbody>
								
						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
						<div class="col-sm-4 text-end">
							<input type="submit" name="updatecart" value="Cập nhật giỏ hàng" class="btn_1 gray"></input>
						</div>
					
							<div class="col-sm-8">
							<div class="apply-coupon">
								<div class="form-group">
								</div>
							</div>
							<a href="index.php?cl=viewcart&del=1">Xóa rỗng đơn hàng</a>
						</div>
					</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				<li>
					<span>Subtotal</span> <?=$tongdonhang?>
				</li>
				<li>
					<span>Total</span> <?=$thanhtoan?>
				</li>
			</ul>
			<a href="index.php?cl=donhang" class="btn_1 full-width cart">Đặt hàng</a>
					</div>
				</div>
			</div>
		</div>
	</form>
		<!-- /box_cart -->
		
	</main>
	<!--/main-->
