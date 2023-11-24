<?php
    session_start();
    ob_start();
    include "app/models/pdo.php";
    include "app/models/danhmuc.php";
    include "app/views/client/header.php";
    include "app/models/banner.php";
    include "app/models/global.php";
    include "app/models/sanpham.php";
    include "app/models/bienthe.php";
    include "app/models/baiviet.php";
    include "app/models/user.php";
    
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
            include "app/views/client/lienhe.php";
            break;
        case 'giohang':
            include "app/views/client/giohang.php";
            break;
        default :
            include "app/views/client/home.php";
            break;
        }
    } else {
        include "app/views/client/home.php";
    }
    include "app/views/client/footer.php";
?>