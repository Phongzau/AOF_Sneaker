<?php
    include "header.php";
    include "sidebar.php";
    include "../../models/pdo.php";
    include "../../models/sanpham.php";
    include "../../models/danhmuc.php";
    include "../../models/global.php";
    include "../../models/user.php";
    include "../../models/chucvu.php";
    include "../../models/bienthe.php";
    include "../../models/khuyenmai.php";
    include "../../models/binhluan.php";
    include "../../models/baiviet.php";
    include "../../models/donhang.php";
    include "../../models/lienhe.php";
    $dsbaiviet = select_baiviet_admin();
    $dsbinhluan = select_all_binhluan_admin();
    $dsvoucher = select_voucher_admin();
    $dsrole = select_all_role();
    $dsbienthe = select_bienthe_admin();
    $dsdm = danhmuc_all();
    $dslienhe = select_lienhe_all();
    if (isset($_GET['ad'])) {
        $ad = $_GET['ad'];
        switch ($ad) {
        // Trang Quản lý người dùng
            // Quản lý người dùng
            case 'quanlynguoidung':
                $user = select_user_all();
                include "user/quanlynguoidung.php";
                break;

            // Sửa người dùng    
            case 'updateuser':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $iduser = get_user($id);
                }
                include "user/suanguoidung.php";
                break;

            // Thực hiện sửa người dùng
            case 'th_suanguoidung':
                if (isset($_POST['th_suanguoidung'])) {
                    $username = $_POST['username'];
                    $id_user = $_POST['id_user']; 
                    $password = $_POST['password'];
                    $user_name = $_POST['user_name'];
                    $img = $_FILES['img']['name'];
                    if ($img != "") {
                        // upload hinh anh
                        $target_file = IMG_PATH_ADMIN.$img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    } else {
                        $img = get_old_image_user($id_user);
                    }
                    $diachi = $_POST['diachi'];
                    $email = $_POST['email'];
                    $dienthoai = $_POST['dienthoai'];
                    $idrole = $_POST['id_role']; 
                }
                update_user_admin($username, $password, $user_name, $img, $diachi, $email, $dienthoai, $idrole, $id_user);
                $user = select_user_all();
                include "user/quanlynguoidung.php";
                break;

            // Xóa người dùng
            case 'deleteuser':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_user_admin($id);
                }
                $user = select_user_all();
                include "user/quanlynguoidung.php";
                break;

//------------------------------------------------------Hết Trang Quản Lý Người Dùng------------------------------------------------------//
        
        // Trang Quản lý chức vụ
            // Quản lý chức vụ
            case 'quanlychucvu':
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;

            // Thêm chức vụ
            case 'themchucvu':
                include "chucvu/themchucvu.php";
                break;

            // Thực hiện thêm chức vụ
            case 'th_themchucvu':
                if (isset($_POST['th_themchucvu'])) {
                    $chuc_vu = $_POST['chuc_vu'];
                    $mota = $_POST['mota'];
                }
                insert_chucvu_admin($chuc_vu, $mota);
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;
            
            // Xóa chức vụ
            case 'deleterole':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_chucvu_admin($id);
                }
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;

            // Sửa chức vụ
            case 'updaterole':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $idrole = select_chucvu_admin_by_id($id);
                }
                include "chucvu/suachucvu.php";
                break;

            // Thực hiện sửa chức vụ
            case 'th_suachucvu':
                if (isset($_POST['th_suachucvu'])) {
                    $chuc_vu = $_POST['chuc_vu'];
                    $mota = $_POST['mota'];
                    $id = $_POST['id_role'];
                }
                update_chucvu_admin($chuc_vu, $mota, $id);
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;

//------------------------------------------------------Hết Trang Quản Lý Chức Vụ------------------------------------------------------//

        // Trang Quản lý sản phẩm
            // Quản lý sản phẩm
            case 'quanlysanpham':
                $sp =  select_sp_all();
                include "sanpham/quanlysanpham.php";
                break;

            // Thêm sản phẩm
            case 'themsanpham':
                include "sanpham/themsanpham.php";
                break;

            // Xóa sản phẩm
            case "deletesp":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                sp_delete($id);
                }
                $sp = select_sp_all();
                include "sanpham/quanlysanpham.php";
                break;
                
            // Sửa sản phẩm
            case "suasp":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                }
                $sp_edit  = get_sanpham_by_id_admin($id);
                $dm =danhmuc_all();
                include "sanpham/suasanpham.php";
                break;

            // Thêm sản phẩm
            case "th_themsanpham":
                if (isset($_POST['th_themsanpham'])) {
                    $price = $_POST['price'];
                    $name = $_POST['name'];
                    $mota = $_POST['mota'];
                    $iddm = $_POST['iddm'];
                    $img = $_FILES['img']['name'];
                    if ($img != "") {
                    $target_file = IMG_PATH_ADMIN . $img;
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    } else {
                    $img = "";
                    }
                }
                insert_sanpham_admin( $name, $price, $mota, $img, $iddm);
                $sp = select_sp_all();
                include "sanpham/quanlysanpham.php";
                break;

            // Thực hiện sửa sản phẩm
            case "th_suasanpham":
                if (isset($_POST['suasanpham'])) {
                $id_sp = $_POST['id_sp'];
                $price = $_POST['price'];
                $name = $_POST['name'];
                $mota = $_POST['mota'];
                $iddm = $_POST['iddm'];
                $img = $_FILES['img']['name'];
                if ($img != "") {
                $target_file = IMG_PATH_ADMIN . $img;
                move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                } else {
                $img = "";
                }
                sanpham_update($id_sp, $name, $price, $mota, $img, $iddm );
                $sp = select_sp_all();
                include "sanpham/quanlysanpham.php";
                }
                break;

//------------------------------------------------------Hết Trang Quản Lý Sản Phẩm------------------------------------------------------//

        // Trang Quản lý biến thể
            // Quản lý biến thể            
            case 'quanlybienthe':
                include "bienthe/quanlybienthe.php";
                break;
            
            // Thêm biến thể
            case 'xembienthe':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                }
                $bt =  select_bthe_id($id);
                include "sanpham/xembienthesanpham.php";
                break;
            
            // Sửa biến thể
            case "suabt":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $idsp =$_GET['idsp'];
                    }
                    $bt_edit  = get_bienthe_id($id);
                    
                    include "sanpham/suabienthe.php";
            break;

            // Thực hiện thêm biến thể
            case "th_thembienthe":
                if (isset($_POST['s_thembienthe'])) {
                    $id_sp = $_POST['id_sp'];
                    $mau = $_POST['mau'];
                    $dungluong = $_POST['dungluong'];
                    $soluong = $_POST['soluong'];
                    bienthe_insert($id_sp, $mau, $dungluong, $soluong);
                }
                include "bienthe/quanlybienthe.php";
                break;

            // Thực hiện sửa biến thể
            case "th_suabienthe":
                if (isset($_POST['s_suabienthe'])) {
                    $id_bt = $_POST['id_bt'];
                    $id_sp = $_POST['id_sp'];
                    $mau = $_POST['mau'];
                    $dungluong = $_POST['dungluong'];
                    $soluong = $_POST['soluong'];
                    bienthe_update($id_bt,$id_sp, $mau, $dungluong, $soluong);
                }
                $sp = select_sp_all();
                include "sanpham/quanlysanpham.php";
            break;

            // Thực hiện xóa biến thể
            case "deletebt":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                bt_delete($id);
                }
                $sp = select_sp_all();
                include "bienthe/quanlybienthe.php";
            break;

            // Thêm biến thể
            case 'thembienthe':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                   $id = $_GET['id'];
                }
                $product = get_sanpham_by_id_admin($id);
                include "sanpham/thembienthe.php";
                break;

//------------------------------------------------------Hết Trang Quản Lý Biến Thể------------------------------------------------------//
            
        // Trang Quản Lý Danh Mục
            // Quản lý danh mục
            case 'quanlydanhmuc':
                $dm =danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;

            // Xóa danh mục    
            case "deletedm":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    danhmuc_delete($id);
                }
                    $dm =danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;
            
            // Thêm danh mục
            case 'themdanhmuc':
                include "danhmuc/themdanhmuc.php";
                break;

            // Sửa danh mục
            case 'updatedm':
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $id = $_GET['id'];
                }
                $iddanhmuc = select_dm_by_id_admin($id);
                include "danhmuc/suadanhmuc.php";
                break;

            // Thực hiện sửa danh mục
            case 'th_suadanhmuc':
                if (isset($_POST['th_suadanhmuc'])) {
                    $tendm = $_POST['tendm'];
                    $mota = $_POST['mota'];
                    $id_dm = $_POST['id_dm'];
                }
                update_danhmuc_admin($tendm, $mota, $id_dm);
                $dm =danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;

            // Thực hiện thêm danh mục
            case 'th_themdanhmuc':
                if (isset($_POST['th_themdanhmuc'])) {
                    $tendm = $_POST['tendm'];
                    $mota = $_POST['mota'];
                }
                insert_danhmuc_admin($tendm, $mota);
                $dm =danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;
        
//------------------------------------------------------Hết Trang Quản Lý Danh Mục------------------------------------------------------//
        
        // Trang Quản Lý Bài Viết
            // Quản lý bài viết
                case 'quanlybaiviet':
                    include "baiviet/quanlybaiviet.php";
                    break;
        
            // Thêm bài viết
                case 'thembaiviet':
                    include "baiviet/thembaiviet.php";
                    break;

            // Thực hiện thêm bài viết
                case 'th_thembaiviet':
                if (isset($_POST['th_thembaiviet'])) {
                    $noidung = $_POST['noidung'];
                    $img = $_FILES['img']['name'];
                    // upload hinh anh
                    $target_file = IMG_PATH_ADMIN.$img;
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                }
                insert_baiviet_admin($noidung, $img);
                $dsbaiviet = select_baiviet_admin();
                include "baiviet/quanlybaiviet.php";
                break;

            // Sửa bài viết
            case 'updatebv':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                }
                $idbv = select_baiviet_by_id_admin($id);
                include "baiviet/suabaiviet.php";
                break;

            // Thực hiện sửa bài viết
            case 'th_suabaiviet':
                if (isset($_POST['th_suabaiviet'])) {
                    $id_baiviet = $_POST['id_baiviet'];
                    $noidung = $_POST['noidung']; 
                    $img = $_FILES['img']['name'];
                    if ($img != "") {
                        // upload hinh anh
                        $target_file = IMG_PATH_ADMIN.$img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    } else {
                        $img = get_old_image_baiviet($id_baiviet);
                    }
                }
                update_baiviet_admin($noidung, $img, $id_baiviet);
                $dsbaiviet = select_baiviet_admin();
                include "baiviet/quanlybaiviet.php";
                break;

            // Xóa bài viết
            case 'deletebv':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_baiviet_admin($id);
                }
                $dsbaiviet = select_baiviet_admin();
                include "baiviet/quanlybaiviet.php";
                break;
        
//------------------------------------------------------Hết Trang Quản Lý Bài Viết------------------------------------------------------//

        // Trang Quản lý Voucher     
            // Quản lý khuyến mãi
            case 'quanlykhuyenmai':
                include "khuyenmai/quanlykhuyenmai.php";
                break;

            // Xóa Khuyến mãi
            case 'deletevoucher':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_voucher_admin($id);
                }
                $dsvoucher = select_voucher_admin();
                include "khuyenmai/quanlykhuyenmai.php";
                break;

            // Sửa khuyến mãi
            case 'updatevoucher':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                }
                $voucher = select_voucher_by_id_admin($id);
                include "khuyenmai/suakhuyenmai.php";
                break;

            // Thực hiện sửa khuyến mãi
            case 'th_suakhuyenmai':
                if (isset($_POST['th_suakhuyenmai'])) {
                    $id_voucher = $_POST['id_voucher'];
                    $voucher = $_POST['voucher'];
                    $mota = $_POST['mota'];
                    $giatri = $_POST['giatri'];
                    update_voucher_admin($voucher, $mota, $giatri, $id_voucher);
                }
                $dsvoucher = select_voucher_admin();
                include "khuyenmai/quanlykhuyenmai.php";
                break;

            // Trang Thêm khuyến mãi
            case 'themkhuyenmai':
                include "khuyenmai/themkhuyenmai.php";
                break;

            // Thực hiện thêm khuyến mãi
            case 'th_themkhuyenmai':
                if (isset($_POST['th_themkhuyenmai'])) {
                    $voucher = $_POST['voucher'];
                    $mota = $_POST['mota'];
                    $giatri = $_POST['giatri'];
                }
                insert_khuyenmai_admin($voucher, $mota, $giatri);
                $dsvoucher = select_voucher_admin();
                include "khuyenmai/quanlykhuyenmai.php";
                break;

//------------------------------------------------------Hết Trang Quản Lý Khuyến Mãi------------------------------------------------------//
        
        // Trang Quản Lý Bình luận
            // Quản lý bình luận
            case 'quanlybinhluan':
                include "binhluan/quanlybinhluan.php";
                break;

            // Xóa bình luận
            case 'deletebl':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_binhluan_admin($id);
                }
                $dsbinhluan = select_all_binhluan_admin();
                include "binhluan/quanlybinhluan.php";
                break;
            
//------------------------------------------------------Hết Trang Quản Lý Bình Luận------------------------------------------------------//

        // Trang Quản lý Đơn hàng
            // Quản lý đơn hàng
            case 'quanlydonhang':
                $dh = donhang_all();
                include "donhang/quanlydonhang.php";
                break;
        
            // Xóa đơn hàng    
            case 'deletedh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    donhang_delete($id);
                }
                $user = select_user_all();
                include "user/quanlynguoidung.php";
                break;
            
            // Trang thêm đơn hàng
            case 'themdonhang':
                include "donhang/themdonhang.php";
                break;
            
//------------------------------------------------------Hết Trang Quản Lý Đơn hàng------------------------------------------------------//
        // Trang Quản lý liên hệ
            // Quản lý liên hệ
            case 'quanlylienhe':
                $dslienhe = select_lienhe_all();
                include "lienhe/quanlylienhe.php";
                break;

            // Xóa liên hệ
            case 'deletelh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_lienhe_admin($id);
                }
                $dslienhe = select_lienhe_all();
                include "lienhe/quanlylienhe.php";
                break;

//------------------------------------------------------Hết Trang Quản Lý Liên Hệ------------------------------------------------------//

            case 'thongke':
                include "thongke.php";
                break;
            

           
default :
                include "thongke.php";  
                break;                          
        }
    } else {
        include "thongke.php";
    }
    include "footer.php";
?>