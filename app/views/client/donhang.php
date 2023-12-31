<?php
    $html_cartdonhang = viewcart_donhang();
    $total = get_tongdonhang();
    $formattedtotal= number_format($total, 0, '.', '.');
    $formattedgiatrivoucher= number_format($giatrivoucher, 0, '.', '.');
    $formattedthanhtoan= number_format($thanhtoan, 0, '.', '.');
?>
<main class="bg_gray">
		
        <div class="container margin_30">
            <div class="text-center mt-4 mb-5">
                <img  src="public/uploads/credit.png" alt="">
                <h1 class="mt-2 text-muted">Thanh toán</h1>
                <p style="font-size: 20px;" class="text-muted">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
            </div>       
            
        <!-- /page_header -->
                <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8 col-md-8">
                    <div class="box_account">
                        <h3 class="client">Thông tin khách hàng</h3>
                        <form id="thanhToanForm" action="index.php?cl=submit_donhang" onsubmit="return validateForm()" method="POST">
                        <div class="form_container">
                            <label for="">Họ tên:</label><span style="color: red; margin-left: 10px"><?=isset($errors['ten_nguoidat']) ? $errors['ten_nguoidat'] : '' ?></span>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= (isset($user_name) && $user_name !== "") ? $user_name : "" ?>" name="nguoidat_ten" required id="hoTen" placeholder="Họ và tên">
                            </div>   
                            <label class="mt-1" for="">Email:</label><span style="color: red; margin-left: 10px"><?=isset($errors['email_nguoidat']) ? $errors['email_nguoidat'] : '' ?></span>               
                            <div class="form-group">
                                <input type="email" class="form-control" value="<?= (isset($email) && $email !== "") ? $email : "" ?>" name="nguoidat_email" required id="email" placeholder="Email">
                            </div>
                            <label class="mt-1" for="">Điện thoại</label><span style="color: red; margin-left: 10px"><?=isset($errors['sdt_nguoidat']) ? $errors['sdt_nguoidat'] : '' ?></span>               
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= (isset($dienthoai) && $dienthoai !== "") ? $dienthoai : "" ?>" name="nguoidat_tel" id="sdt" value="" required placeholder="Số điện thoại">
                            </div>
                            <label class="mt-1" for="">Địa chỉ</label><span style="color: red; margin-left: 10px"><?=isset($errors['diachi_nguoidat']) ? $errors['diachi_nguoidat'] : '' ?></span>               
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= (isset($diachi) && $diachi !== "") ? $diachi : "" ?>" name="nguoidat_diachi" id="diaChi" value="" required placeholder="Địa chỉ nhà">
                            </div>
                            <input type="hidden" name="total" value="<?=$total?>">
                            <input type="hidden" name="giatrivoucher" value="<?=$giatrivoucher?>">
                            <input type="hidden" name="tongthanhtoan" value="<?=$thanhtoan?>">
                            <label for="">Hình thức thanh toán</label> <br>
                            <div class="form-group">
                                <input class="mb-3" type="radio" name="pttt" value="0" checked> Thanh toán khi nhận hàng <br>
                                <input type="radio" name="pttt" value="1"> Thanh toán MOMO <img width="30px" src="public/uploads/momo_icon_square_pinkbg_RGB.png" alt="">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit"  name="submit_donhang" class="btn_1 ">Đặt hàng</button>
                            </div>
                            
                        </div>
                        </form>
                        <!-- /form_container -->
                    </div>
                    <!-- /box_account -->
                </div>
                <div class="col-xl-4 col-lg-4 col-md-8">
                    <div class="box_account">
                        <img src="public/uploads/bag (1).png" alt=""><label style="font-size: 20px;" for="">Giỏ hàng</label>
                        <div class="mt-1 form_container-2">
                        <div class="giohangdonhang">               
                            <?=$html_cartdonhang?>
									<div class="siu row">
										<input type="hidden" name="tongdonhang" id="tongThanhToan"  value="<?=$total?>">
                                        <div class="tach">
                                           <input type="text" name="voucher" id="voucherCode" placeholder="Mã Voucher" class="form-control">
                                            <button type="button" onclick="applyVoucher()" class="btn_1">Áp dụng mã</button> 
                                        </div>
									</div>
									
                            <div class="total_drop mt-4">
                                <div class="text-center clearfix "><strong>Tổng:</strong><span style="margin-left: 50px;"><strong><?=$formattedtotal?>VND</strong></span></div>
                                <div class="text-center clearfix "><strong>Giảm giá:</strong><span id="discountAmount" style="margin-left: 50px;"><strong><?=$formattedgiatrivoucher?>VND</strong></span></div>
                                <div class="text-center clearfix "><strong>Tổng thanh toán:</strong><span id="totalAmount" style="margin-left: 50px;"><strong><?=$formattedthanhtoan?>VND</strong></span></div>
                                <div class="mt-3 text-center"><a href="cart.html" class="btn_1 outline">View Cart</a></div>
                            </div>
                        </div>                 
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