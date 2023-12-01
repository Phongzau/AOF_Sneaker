<?php
	if (is_array($dsdhct) && count($dsdhct)) {
		$html_showdh = show_dhdg($dsdhct);
	}
?>
<main class="bg_white mt-1">
       <div class="container mt-4">
		<?php
			if (empty($html_showdh)) {
				$tb_dh = "<h3 class=text-center >Bạn chưa có đơn hàng nào</h3>";
				echo $tb_dh;
			} else {
				echo $html_showdh;
			}
		?>
        </div>

            <div class="feat">
			<div class="container">
				<ul>
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Free Shipping</h3>
								<p>For all oders over $99</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-wallet"></i>
							<div class="justify-content-center">
								<h3>Secure Payment</h3>
								<p>100% secure payment</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>24/7 Support</h3>
								<p>Online top support</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
</main>