<main class="bg_gray">
		
	<div class="container margin_30">
		<div class="page_header">
		<h1>My Profile</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-4 col-lg-4 col-md-8">
				<div class="box_account">
					<div class="form_container">
                    <div class="text-center mb-2 ">
                        <img class="img-header" width=50% src="public/uploads/<?=$img?>" alt="">
                        <h5 class="text-center mt-3"><?=$user_name?></h5>
                    </div>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
				<!-- /row -->
			</div>
			<div class="col-xl-8 col-lg-8 col-md-8">
				<div class="box_account">
					<div class="form_container">
                        <?php
                            if (isset($tb_fail_tt)) {
                                echo $tb_fail_tt;
                            } else if (isset($tb_success_tt)) {
                                echo $tb_success_tt;
                            }
                        ?>
                    <form action="index.php?cl=th_capnhatthongtin" enctype="multipart/form-data" method="POST">
							<label class="mt-2" for="">Tên người dùng: </label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_user_name']) ? $errors['tb_error_user_name'] : '' ?></span>
							<div class="form-group">
								<input type="text" class="form-control" name="user_name" value="<?=isset($user_name) ? $user_name: ''?>" id="email" placeholder="Nhập Tên người dùng của bạn">
							</div>
                            <label for="" class="mt-1">Ảnh:</label>
                            <div class="form-group">
								<input type="file" class="form-control" name="img" id="password_in">
							</div>
							<label for="" class="mt-1">Email:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_email']) ? $errors['tb_error_email'] : ''?> <?=isset($errors['tb_email']) ? $errors['tb_email'] : '' ?></span>
							<div class="form-group">
								<input type="text" class="form-control" value="<?=isset($email) ? $email: ''?>" name="email" id="password_in" placeholder="Nhập Email của bạn">
							</div>
							<label for="" class="mt-1">SĐT:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_dienthoai']) ? $errors['tb_error_dienthoai'] : ''?> <?=isset($errors['tb_dienthoai']) ? $errors['tb_dienthoai'] : ''  ?></span>
							<div class="form-group">
								<input type="text" class="form-control" value="<?=isset($dienthoai) ? $dienthoai: ''?>" name="dienthoai" id="password_in" placeholder="Nhập SĐT của bạn">
							</div>
                            <label for="" class="mt-1">Địa chỉ:</label><span style="color: red; margin-left: 10px"><?=isset($errors['tb_error_diachi']) ? $errors['tb_error_diachi'] : '' ?></span>
                            <div class="form-group">
								<input type="text" class="form-control" value="<?=isset($diachi) ? $diachi: ''?>" name="diachi" id="password_in" placeholder="Nhập SĐT của bạn">
							</div>
                            <label for="" class="mt-1">Chức vụ:</label>
                            <div class="form-group">
								<input type="text" class="form-control" value="<?=isset($chuc_vu) ? $chuc_vu: ''?>" id="password_in" placeholder="Nhập SĐT của bạn">
							</div>
                            <input type="text" hidden class="form-control" name="id_user" value="<?=$id_user?>" id="email" placeholder="Nhập Tên người dùng của bạn">
							<div class="text-center"><input type="submit" value="Lưu Thông Tin" name="th_capnhatthongtin" class="btn_1 full-width"></div>
							
							</form>
					</div>
					<!-- /form_container -->
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->