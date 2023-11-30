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
							<form action="index.php?cl=th_doimatkhautt" method="POST">
							<div class="row no-gutters mt-3">
								<h1 class="text-center">Đổi mật khẩu</h1>
								<?php
                                    if (isset($tb_dmktc)) {
                                        echo $tb_dmktc;
                                    } else if (isset($tb_dmktb)) {
                                        echo $tb_dmktb;
                                    }
								?>	
							</div>
                            <label for="" class="mt-3">Tên đăng nhập</label>
							<div class="form-group">
								<input type="text" class="form-control" name="username" value="<?=$username?>" id="" placeholder="Nhập mật khẩu của bạn">
							</div>
                            <label for="" class="mt-3">Mật khẩu cũ</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_old_password']) ? $errors['tb_error_old_password'] : '' ?><?=isset($errors['tb_error_oldpassword']) ? $errors['tb_error_oldpassword'] : '' ?></span>
							<div class="form-group">
								<input type="password" class="form-control" name="old_password" id="" placeholder="Nhập mật khẩu của bạn">
							</div>
							<label for="" class="mt-3">Mật khẩu mới</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_password']) ? $errors['tb_error_password'] : '' ?></span>
							<div class="form-group">
								<input type="password" class="form-control" name="password" id="" placeholder="Nhập mật khẩu của bạn">
							</div>
							<label for="" class="mt-2">Nhập lại mật khẩu</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_repassword']) ? $errors['tb_error_repassword'] : '' ?><?=isset($errors['tb_error_nhaplaipass']) ? $errors['tb_error_nhaplaipass'] : '' ?></span>
							<div class="form-group">
								<input type="password" class="form-control" name="repassword" id="password_in" value="" placeholder="Nhập lại mật khẩu">
							</div>
							<div class="text-center"><input type="submit" value="Đổi mật khẩu" name="th_doimatkhautt" class="btn_1 full-width"></div>
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