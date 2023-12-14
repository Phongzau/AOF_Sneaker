<main class="bg-white mt-1">	
		<div class="container margin_30">
		<!-- /page_header -->
				<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-6 col-md-8">
					<div class="box_account">
						<div class="form_container">
							<div class="row no-gutters mt-3">
								<h1 class="text-center">Đăng Ký</h1>
								<?php
								if (isset($tb_fail)) {
									echo $tb_fail;
								} else if (isset($tb_success)) {
									echo $tb_success;
								} else if (isset($thongbaodk)) {
									echo $thongbaodk;
								}
								?>
							</div>
							<form action="index.php?cl=th_dangky" method="POST">
							<label class="mt-2" for="">Tên người dùng: </label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_user_name']) ? $errors['tb_error_user_name'] : '' ?></span>
							<div class="form-group">
								<input type="text" class="form-control" name="user_name" value="<?=isset($user_name) ? $user_name: ''?>" id="email" placeholder="Nhập Tên người dùng của bạn">
								
							</div>
							<label class="mt-2" for="">Tên đăng nhập: </label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_username']) ? $errors['tb_error_username'] : '' ?><?=isset($errors['tb_tk_tontai']) ? $errors['tb_tk_tontai'] : '' ?></span>
							<div class="form-group">
								<input type="text" class="form-control" value="<?=isset($username) ? $username: ''?>" name="username" id="email" placeholder="Nhập Tên đăng nhập của bạn">
								
							</div>
							<label for="" class="mt-1">Mật khẩu: <span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_password']) ? $errors['tb_error_password'] : ''?> <?=isset($errors['tb_password']) ? $errors['tb_password'] : '' ?><?=isset($errors['tb_tk_mk']) ? $errors['tb_tk_mk'] : '' ?></span></label>
							<div class="form-group">
								<input type="password" class="form-control" value="<?=isset($password) ? $password: ''?>" name="password" id="email" placeholder="Nhập mật khẩu của bạn">
							</div>
							<label for="" class="mt-1">Nhập lại mật khẩu: <span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_repassword']) ? $errors['tb_error_repassword'] : ''?> <?=isset($errors['tb_pass']) ? $errors['tb_pass'] : '' ?></span></label>
							<div class="form-group">
								<input type="password" class="form-control" value="<?=isset($repassword) ? $repassword: ''?>" name="repassword" id="password_in" placeholder="Nhập lại mật khẩu của bạn">
							</div>
							<label for="" class="mt-1">Email: <span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_email']) ? $errors['tb_error_email'] : ''?> <?=isset($errors['tb_email']) ? $errors['tb_email'] : '' ?></span></label>
							<div class="form-group">
								<input type="text" class="form-control" value="<?=isset($email) ? $email: ''?>" name="email" id="password_in" placeholder="Nhập Email của bạn">
							</div>
							<label for="" class="mt-1">SĐT: <span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_dienthoai']) ? $errors['tb_error_dienthoai'] : ''?> <?=isset($errors['tb_dienthoai']) ? $errors['tb_dienthoai'] : ''  ?></span></label>
							<div class="form-group">
								<input type="text" class="form-control" value="<?=isset($dienthoai) ? $dienthoai: ''?>" name="dienthoai" id="password_in" placeholder="Nhập SĐT của bạn">
							</div>
							<div class="clearfix add_bottom_15 mt-3">
								<div class="checkboxes float-start">
								</div>
								<div class="float-end"><a id="forgot" href="index.php?cl=dangnhap">Đã có tài khoản ?</a></div>
							</div>
							<div class="text-center"><input type="submit" value="Đăng ký" name="th_dangky" class="btn_1 full-width"></div>
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
					<div class="row">
	
					</div>

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