<main class="bg_white mt-1">
		<div class="container margin_30">
			<div class="page_header">
			
		</div>
		<!-- /page_header -->
				<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-6 col-md-8">
					<div class="box_account">
						<h3 class="client">Already Client</h3>
						<div class="form_container">
							<form action="index.php?cl=th_dangnhap" method="POST">
							<div class="row no-gutters mt-3">
								<h1 class="text-center">Đăng nhập</h1>
								<?php
								if (isset($_SESSION['tb_dangnhap'])&&($_SESSION['tb_dangnhap'] != "")) {
									echo $_SESSION['tb_dangnhap'];
									unset($_SESSION['tb_dangnhap']);
								} 
								else if (isset($tb_success)) {
									echo $tb_success;
								}
								?>	
							</div>
							<label for="" class="mt-3">Tên đăng nhập</label>
							<div class="form-group">
								<input type="text" class="form-control" name="username" id="" placeholder="Nhập tài khoản của bạn">
							</div>
							<label for="" class="mt-2">Mật khẩu</label>
							<div class="form-group">
								<input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Nhập mật khẩu của bạn">
							</div>
							<div class="clearfix add_bottom_15 mt-3">
								<div class="checkboxes float-start">
								<input type="checkbox" name="remenber">	
								<label>Remenber</label>
								</div>
								<div class="float-end"><a id="forgot" href="index.php?cl=quenmatkhau">Quên mật khẩu ?</a> | <a id="forgot" href="index.php?cl=dangky">Chưa có tài khoản ?</a></div>
							</div>
							<div class="text-center"><input type="submit" value="Log In" name="th_dangnhap" class="btn_1 full-width"></div>
							<div id="forgot_pw">
								<div class="form-group">
									<input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
								</div>
								<p>A new password will be sent shortly.</p>
								<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
							</div>
							</form>
							
						</div>
						<!-- /form_container -->
					</div>
					<!-- /box_account -->
		
					<!-- /row -->
				</div>
			</div>
			<!-- /row -->
			</div>
			<!-- /container -->
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
		<!--/main-->