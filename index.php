<?php
    session_start();
    ob_start();
    if (!isset($_SESSION['giohang'])) {
        $_SESSION['giohang'] = [];
    }
    include "app/models/pdo.php";
    include "app/models/danhmuc.php";
    include "app/models/global.php";
    include "app/models/giohang.php";
    include "app/views/client/header.php";
    include "app/models/user.php";
    include "app/models/banner.php";
    include "app/models/sanpham.php";
    include "app/models/bienthe.php";
    include "app/models/baiviet.php";
    include "app/models/khuyenmai.php";
    include "app/models/donhang.php";
    include "app/models/lienhe.php";
    include "app/models/binhluan.php";
    $dsbanner = select_all_banner();
    $dssp = select_sp_client();
    $sphot = select_sp_one_hot();
    $sphot4 =select_sp_hot();
    $bvhome = select_baiviet_cl_home();
    if (isset($_GET['cl'])) {
        $cl = $_GET['cl'];
        switch ($cl) {
        case 'dangnhap':
            include "app/views/client/dangnhap.php";
            break;
        case 'sanphamchitiet':
            if (isset($_GET['idpro']) && ($_GET['idpro'] > 0)) {
                $id = $_GET['idpro'];
            }
            sanpham_update_view($id);
            $spchitiet = select_sanpham_by_id_client($id);
            $btcolor = select_bienthe_by_id($id);
            $btsize = select_bienthe_by_id($id);
            $iddm = $spchitiet['iddm'];
            $splienquan = get_dssp_lienquan($iddm,$id);
            $hasp = select_hasp_client($id);
    
            include "app/views/client/sanphamchitiet.php";
            break;
        case 'sanpham':
            if (!isset($_GET['id'])) {
                $id = 0;
                $titlepage = "";
            } else {
                $id = $_GET['id'];
                $titlepage = get_name_dm($id);
            }
            //kiem tra form search
            if (isset($_POST["timkiem"]) && ($_POST["timkiem"])) {
                $kyw = $_POST['kyw'];
                $titlepage = " Kết quả tìm kiếm với từ khoá : $kyw  ";
            } else {
                $kyw = "";
            }
            $dssp = get_dssp($kyw, $id);
             include "app/views/client/sanpham.php";

            break;
            case 'baivietct':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                 $baiviet =   select_baiviet_by_id_cl($id);
                 $bvnew =select_baiviet_cl_blog_sb();
                 include "app/views/client/baivietchitiet.php";
                }
                break;
                case 'locsp':
                    if(isset($_POST['loc'])){
                        $min_price = $_POST['min_price'];
                        $max_price = $_POST['max_price'];
                    $dssp = locsp_min_max( $min_price,$max_price);
                    include "app/views/client/sanpham.php";
                }
              
                    break;
        case 'dangky':
            include "app/views/client/dangky.php";
            break;
        case 'th_dangky':
            if (isset($_POST['th_dangky'])) {
                $errors = array();
        // Validate
            // Kiểm tra dữ liệu   
                // Tên đăng nhập
                if (empty($_POST['username'])) {
                    $errors['tb_error_username'] = "Tên đăng nhập không được trống";
                } else {
                    $username = $_POST['username'];
                }
                // Mật khẩu
                if (empty($_POST['password'])) {
                    $errors['tb_error_password'] = "Mật khẩu không được trống";
                } else {
                    $password = $_POST['password'];
                }
                // Mật khẩu nhập lại
                if (empty($_POST['repassword'])) {
                    $errors['tb_error_repassword'] = "Mật khẩu nhập lại không được trống";
                } else {
                    $repassword = $_POST['repassword'];
                }
                // Tên người dùng
                if (empty($_POST['user_name'])) {
                    $errors['tb_error_user_name'] = "Tên người dùng không được để trống";
                } else {
                    $user_name = $_POST['user_name'];
                }
                // Điện thoại
                if (empty($_POST['dienthoai'])) {
                    $errors['tb_error_dienthoai'] = "Điện không được để trống";
                } else {
                    $dienthoai = $_POST['dienthoai'];
                }
                // Email
                if (empty($_POST['email'])) {
                    $errors['tb_error_email'] = "Email không được để trống";
                } else {
                    $email = $_POST['email'];
                }
            // Kiểm tra
                // Email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['tb_email'] = "Địa chỉ email không hợp lệ";
                }

                // Mật khẩu
                if (strlen($password) < 6) {
                    $errors['tb_password'] = "Mật khẩu ít nhất 6 kí tự";
                } 

                if ($password != $repassword) {
                    $errors['tb_pass'] = "Mật khẩu không trùng khớp";
                }
                // Tên đăng nhập
                $checkusername = check_tk_by_username($username);
                if (is_array($checkusername) && count($checkusername) > 0) {
                    $errors['tb_tk_tontai'] = "Tên đăng nhập đã tồn tại";
                }

                if ($username == $password) {
                    $errors['tb_tk_mk'] = "Tạo mật khẩu khác mật khẩu không nên trùng với tên đăng nhập";
                }

                // Điện thoại
                // Loại bỏ các ký tự không phải số từ số điện thoại
                $cleaned_phone = preg_replace('/[^0-9]/', '', $dienthoai);
                // Kiểm tra xem số điện thoại có chứa chữ hoặc không đủ 10 ký tự hay không
                if (!ctype_digit($cleaned_phone) || strlen($cleaned_phone) !== 10) {
                    // Số điện thoại không hợp lệ, có chứa chữ hoặc không đủ 10 ký tự
                    $errors['tb_dienthoai'] = "Số điện thoại có chữ hoặc chưa đủ 10 số";
                }
                
                $img = "anh_dai_dien_khong_nhap.jpg";
                if (empty($errors)) {
                    // Thực hiện chức năng
                    insert_user_client($username, $password, $user_name, $email, $dienthoai, $img);
                    $tb_success = "<h3 class=text-center style=color:green>Tài khoản bạn đã tạo thành công</h3>";
                    include "app/views/client/dangnhap.php";
                    break;
                } else {
                    $tb_fail = "<h3 class=text-center style=color:red>Tài khoản bạn đã tạo thất bại</h3>";
                }
            }
            include "app/views/client/dangky.php";
            break;
        case 'th_dangnhap':
            if (isset($_POST['th_dangnhap'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
            }
            $user = check_tk_user($username, $password);
            if (is_array($user)&&count($user)) {
                $_SESSION['s_user'] = $user;
                header('Location: index.php');
                exit();
            } else {
                $tb_login = "<h3 class=text-center style=color:red>Tài khoản không tồn tại hoặc mật khẩu sai</h3>";
                $_SESSION['tb_dangnhap'] = $tb_login;
                header('location: index.php?cl=dangnhap');
            }
            break;
        case 'th_capnhatthongtin':
            if (isset($_POST['th_capnhatthongtin'])) {
                // Tên người dùng
                if (empty($_POST['user_name'])) {
                    $errors['tb_error_user_name'] = "Tên người dùng không được để trống";
                } else {
                    $user_name = $_POST['user_name'];
                }
                // Email
                if (empty($_POST['email'])) {
                    $errors['tb_error_email'] = "Email không được để trống";
                } else {
                    $email = $_POST['email'];
                }
                // Điện thoại
                if (empty($_POST['dienthoai'])) {
                    $errors['tb_error_dienthoai'] = "Điện không được để trống";
                } else {
                    $dienthoai = $_POST['dienthoai'];
                }
                // Địa chỉ
                if (empty($_POST['diachi'])) {
                    $errors['tb_error_diachi'] = "Địa chỉ không được để trống";
                } else {
                    $diachi = $_POST['diachi'];
                }
                $id_user = $_POST['id_user'];
                $img = $_FILES['img']['name'];
                    if ($img != "") {
                        // upload hinh anh
                        $target_file = IMG_PATH_USER . $img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    } else {
                        $img = get_old_image_user($id_user);
                    }
            // Kiểm tra
                // Email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['tb_email'] = "Địa chỉ email không hợp lệ";
                }
                $cleaned_phone = preg_replace('/[^0-9]/', '', $dienthoai);
                // Kiểm tra xem số điện thoại có chứa chữ hoặc không đủ 10 ký tự hay không
                if (!ctype_digit($cleaned_phone) || strlen($cleaned_phone) !== 10) {
                    // Số điện thoại không hợp lệ, có chứa chữ hoặc không đủ 10 ký tự
                    $errors['tb_dienthoai'] = "Số điện thoại có chữ hoặc chưa đủ 10 số";
                }
                if (empty($errors)) {
                    // Thực hiện chức năng
                    update_tt_user_client($user_name, $email, $diachi, $cleaned_phone, $img, $id_user);
                    $tb_success_tt = "<h3 class=text-center style=color:green>Tài khoản của bạn đã cập nhật thành công</h3>";
                    $user = check_tk_user($username, $password);
                    $_SESSION['s_user'] = $user;
                    include "app/views/client/thongtinuser.php";
                    break;
                } else {
                    $tb_fail_tt = "<h3 class=text-center style=color:red>Tài khoản của bạn đã cập nhật thất bại</h3>";
                    include "app/views/client/thongtinuser.php";
                    break;
                }
                
            }
            break;
        case 'dangxuat':
            if (isset($_SESSION['s_user']) && count($_SESSION['s_user'])) {
                unset($_SESSION['s_user']);
            }
            header('location: index.php');
            break;
        case 'thongtinuser':
            include "app/views/client/thongtinuser.php";
            break;
        case 'baiviet':
            $bvnew =select_baiviet_cl_blog_sb();
            $bv = select_baiviet_cl_blog();
            include "app/views/client/baiviet.php";
            break;
        case 'lienhe':
            if(isset($_POST['btn_submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $noidung = $_POST['noidung'];
                insert_lienhe_cl($noidung,$name,$email);
                $thongbao = "Gửi Thông Tin Thành Công";

            }
            include "app/views/client/lienhe.php";
            break;
        case 'giohang':
            header('location: index.php?cl=viewcart');
            break;
        case 'addcart':
            if (isset($_POST['addcart'])) {
                if (!isset($_SESSION['s_user'])) {
                    $thongbaodk = "<h3 class=text-center style=color:red>Bạn chưa có tài khoản hãy đăng kí</h3>";
                    include "app/views/client/dangky.php";
                    break;
                }
                $id_sp = $_POST['id_sp'];
                $index = array_search($id_sp, array_column($_SESSION['giohang'], 'id_sp'));
                 // array_column() trích xuất một cột từ mảng giỏ hàng và trả về một mảng chứa giá trị của cột id
                if ($index !== false) {
                $_SESSION['giohang'][$index]['soluong']++;
                } else {
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $size = $_POST['dungluong'];
                $thanhtien = (int)$soluong * (int)$price;
                $sp = array("id_sp"=>$id_sp,
                            "name"=>$name,
                            "img"=>$img,
                            "price"=>$price,
                            "soluong"=>$soluong,
                            "size"=>$size,
                            "thanhtien"=>$thanhtien);            
                array_push($_SESSION['giohang'],$sp);
                }
                header('location: index.php?cl=viewcart');
                }
            break;
        case 'viewcart':
            if (isset($_GET['del']) && ($_GET['del'] == 1)) {
                unset($_SESSION['giohang']);
                header('location: index.php');
            } else {
                $tongdonhang = 0;
                $giatrivoucher = 0;
                $thanhtoan = 0;
                if (isset($_SESSION['giohang'])) {  
                    $tongdonhang = get_tongdonhang();
                    if (isset($removed_price) && ($removed_price) > 0) {
                        $tongdonhang = (int)$tongdonhang - (int)$removed_price;
                    }
                }
                if (isset($_GET['voucher']) && $_GET['voucher'] == 1) {
                    $tongdonhang = $_POST['tongdonhang'];
                    $voucher = $_POST['voucher'];
                    $giatri = select_voucher_client($voucher);
                    $giatrivoucher = $giatri;
                }
                $thanhtoan = $tongdonhang - $giatrivoucher;
                include "app/views/client/giohang.php";
            }
            break;
        case 'delspgiohang':
            if (isset($_GET['id']) && ($_GET['id'])>0) {
                $id = $_GET['id'];
                delete_giohang($id);
            }
            header('location: index.php?cl=viewcart');
            break;
        case 'donhang':
            $giatrivoucher = 0;
            if (isset($_SESSION['giohang'])) {  
                $tongdonhang = get_tongdonhang();
            }
            if (isset($_GET['voucher']) && $_GET['voucher'] == 1) {
                $tongdonhang = $_POST['tongdonhang'];
                $voucher = $_POST['voucher'];
                $giatri = select_voucher_client($voucher);
                $giatrivoucher = $giatri;
            }
            $thanhtoan = $tongdonhang - $giatrivoucher;
            include "app/views/client/donhang.php";
            break;
        case 'submit_donhang':
            if (isset($_POST['submit_donhang'])) {
                $nguoidat_ten = $_POST['nguoidat_ten'];
                $nguoidat_email = $_POST['nguoidat_email'];
                $nguoidat_diachi = $_POST['nguoidat_diachi'];
                $nguoidat_tel = $_POST['nguoidat_tel'];
                $pttt = $_POST['pttt'];
                $total = $_POST['total'];
                $tongthanhtoan = $_POST['tongthanhtoan'];
                if (isset($_POST['giatrivoucher'])) {
                    $voucher = $_POST['giatrivoucher'];
                } else {
                    $voucher = 0;
                }
                $id_user = $_SESSION['s_user']['id_user'];
                $madh = "AOF".$id_user."-".date("His-dmY");
                $id_dhct = dhct_insert_id($madh, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $voucher, $tongthanhtoan, $pttt, $id_user);
                foreach ($_SESSION['giohang'] as $sp) {
                    extract($sp);
                    date_default_timezone_set('Asia/Bangkok');
                    $ngaydathang = date('H:i:s d/m/Y');
                    donhang_insert($id_sp, $id_dhct, $name, $price, $soluong, $ngaydathang, $thanhtien, $size, $id_user);
                }
                unset($_SESSION['giohang']);
                include "app/views/client/confirmdh.php";
            } else {
                include "view/donhang.php";
            } 
            break;
        case 'confirmdh':
            include "app/views/client/confirmdh.php";
            break;
        case 'myOrder':
            $id_user = $_SESSION['s_user']['id_user'];
            $dsdhct = select_dh_dhct($id_user);
            include "app/views/client/myOrder.php";
            break;
        case 'huydonhang':
            if (isset($_GET['madh']) && $_GET['madh'] > 0) {
                $mdh = $_GET['madh'];
                delete_donhang($mdh);
                delete_donhangct($mdh);
            }
            $id_user = $_SESSION['s_user']['id_user'];
            $dsdhct = select_dh_dhct($id_user);
            header("location: index.php?cl=myOrder");
            break;
        case 'danhandonhang':
            if (isset($_GET['madh']) && $_GET['madh'] > 0) {
                $mdh = $_GET['madh'];
            }
            xacnhandh($mdh);
            $id_user = $_SESSION['s_user']['id_user'];
            $dsdhct = select_dh_dhct($id_user);
            header("location: index.php?cl=myOrder");
            break;
        case 'updatecart':
            if (isset($_POST['updatecart'])) {
                $soluong = $_POST['soluong'];
                $id_sp = $_POST['id_sp'];
            }
            $index = array_search($id_sp, array_column($_SESSION['giohang'], 'id_sp'));

         // Nếu sản phẩm tồn tại thì cập nhật lại số lượng
            if ($index !== false) {
            $_SESSION['giohang'][$index]['soluong'] = $soluong;
            }
            header("Location: index.php?cl=viewcart");
        default :
            include "app/views/client/home.php";
            break;
        }

    } else {
        include "app/views/client/home.php";
    }
    include "app/views/client/footer.php";
?>