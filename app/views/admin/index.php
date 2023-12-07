<?php
session_start();
ob_start();
if (isset($_SESSION['user']) && ($_SESSION['user']['chuc_vu'] == "Admin")) {
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
    include "../../models/banner.php";
    $dsbaiviet = select_baiviet_admin();
    $dsbinhluan = select_all_binhluan_admin();
    $dsvoucher = select_voucher_admin();
    $dsrole = select_all_role();
    $dsbienthe = select_bienthe_admin();
    $dsdm = danhmuc_all();
    $dslienhe = select_lienhe_all();
    $dsbanner = select_banner_admin();
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
                        $target_file = IMG_PATH_ADMIN . $img;
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
                    delete_binhluan_admin_sp($id);
                    sp_delete_hinhanh($id);
                    sp_delete_bienthe($id);
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
                $dm = danhmuc_all();
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
                insert_sanpham_admin($name, $price, $mota, $img, $iddm);
                $sp = select_sp_all();
                header('location:index.php?ad=quanlysanpham');
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
                        $img = $_POST['imgcu'];
                    }
                    sanpham_update($id_sp, $name, $price, $mota, $img, $iddm);
                    $sp = select_sp_all();
                    include "sanpham/quanlysanpham.php";
                }
                break;

                case 'xemhinhanhsp':
                    if (isset($_GET['id']) && ($_GET['id']) > 0) {
                        $id = $_GET['id']; 
                    }
                    $dsha = select_hasp_admin($id);
                    include "sanpham/xemhinhanhsp.php";
                    break;
                
                case 'deletehasp':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                        $idsp = $_GET['idsp'];
                        hasp_delete($id);
                    }
                    $dsha = select_hasp_admin($idsp);
                    include "sanpham/xemhinhanhsp.php";
                    break;
                
                case "suahasp":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                        $ha = select_hacs_by_id_admin($id);
                    }
                    include "sanpham/suahasp.php";
                    break;

                case "th_suahasp":
                    if (isset($_POST['th_suahasp'])) {
                        $id_ha = $_POST['id_ha'];
                        $img = $_FILES['img']['name'];
                        if ($img != "") {
                            $target_file = IMG_PATH_ADMIN . $img;
                            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                        } else {
                            $img = get_old_image_hasp($id_ha);
                        }
                        hinhanh_update($img, $id_ha);
                        $idsp = $_POST['id_sanpham'];
                        $dsha = select_hasp_admin($idsp);
                        include "sanpham/xemhinhanhsp.php";
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
                    $idsp = $_GET['idsp'];
                }
                $bt_edit  = get_bienthe_id($id);

                include "sanpham/suabienthe.php";
                break;

                // Thực hiện thêm biến thể
            case "th_thembienthe":
                if (isset($_POST['s_thembienthe'])) {
                    $id_sp = $_POST['id_sp'];
                  
                    $dungluong = $_POST['dungluong'];
                    $soluong = $_POST['soluong'];
                    bienthe_insert($id_sp, $dungluong, $soluong);
                }
                include "bienthe/quanlybienthe.php";
                header('location:index.php?ad=quanlysanpham');
                break;

                // Thực hiện sửa biến thể
            case "th_suabienthe":
                if (isset($_POST['s_suabienthe'])) {
                    $id_bt = $_POST['id_bt'];
                    $id_sp = $_POST['id_sp'];
                    $dungluong = $_POST['dungluong'];
                    $soluong = $_POST['soluong'];
                    bienthe_update($id_bt, $id_sp, $dungluong, $soluong);
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

            case 'themhinhanhsp':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                }
                $product = get_sanpham_by_id($id);
                include "sanpham/themhinhanhsanpham.php";
                break;

            case 'th_themanhsp':
                if (isset($_POST['th_themanhsp'])) {
                    $id_sanpham = $_POST['id_sanpham'];
                    $img = $_FILES['img']['name'];
                    if ($img != "") {
                        $target_file = IMG_PATH_ADMIN . $img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    } else {
                        $img = "";
                    }
                    insert_hinhanh_admin($img, $id_sanpham);
                    $sp = select_sp_all();
                    header('location:index.php?ad=quanlysanpham');
                    break;
                }

                //------------------------------------------------------Hết Trang Quản Lý Biến Thể------------------------------------------------------//

                // Trang Quản Lý Danh Mục
                // Quản lý danh mục
            case 'quanlydanhmuc':
                $dm = danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;

                // Xóa danh mục    
            case "deletedm":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    danhmuc_delete($id);
                }
                $dm = danhmuc_all();
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
                $dm = danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;

                // Thực hiện thêm danh mục
            case 'th_themdanhmuc':
                if (isset($_POST['th_themdanhmuc'])) {
                    $tendm = $_POST['tendm'];
                    $mota = $_POST['mota'];
                }
                insert_danhmuc_admin($tendm, $mota);
                $dm = danhmuc_all();
                header('location:index.php?ad=quanlydanhmuc');
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
                    $tieude = $_POST['tieude'];
                    $noidung = $_POST['noidung'];
                    $img = $_FILES['img']['name'];
                    // upload hinh anh
                    $target_file = IMG_PATH_ADMIN . $img;
                    move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                }
                insert_baiviet_admin( $tieude,$noidung, $img);
                $dsbaiviet = select_baiviet_admin();
                header('location:index.php?ad=quanlybaiviet');
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
                    $tieude = $_POST['tieude'];
                    $img = $_FILES['img']['name'];
                    if ($img != "") {
                        // upload hinh anh
                        $target_file = IMG_PATH_ADMIN . $img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                    } else {
                        $img = get_old_image_baiviet($id_baiviet);
                    }
                }
                update_baiviet_admin($tieude,$noidung, $img, $id_baiviet);
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
                header('location:index.php?ad=quanlykhuyenmai');
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
                $dh = donhangct_all();
                include "donhang/donhangchitiet.php";
                break;

                // Xóa đơn hàng    
            case 'deletedh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    donhang_delete($id);
                }
                $dh = donhangct_all();
                include "donhang/donhangchitiet.php";
                break;
            case 'deletedhct':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    if (isset($_GET['tt']) && ($_GET['tt'] > 0)) {
                        $id = $_GET['id'];
                        $tt = $_GET['tt'];
                        donhang_delete($id);
                        $tb = donhangct_delete($id, $tt);
                    }
                }
                $dh = donhangct_all();
                include "donhang/donhangchitiet.php";
                break;
            case "xacnhandhct":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $tt = $_GET['tt'];
                    $id = $_GET['id'];
                    donhangct_xacnhan($tt,$id);
                    $dh = donhangct_all();
                    header("Location: index.php?ad=quanlydonhang");
                }
                break;
            case "xemchitetdh":
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $dh = donhang_all_id($id);
                    $dhchitet = select_dhct($id);
                }
                include "donhang/quanlydonhang.php";
                break;
                //------------------------------------------------------Hết Trang Quản Lý Đơn hàng------------------------------------------------------//
                // Trang Quản lý liên hệ
                // Quản lý liên hệ
            case 'quanlylienhe':
                $dslienhe = select_lienhe_all();
                include "lienhe/quanlylienhe.php";
                break;

                // Xóa liên hệ
            case 'capnhatlh':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    update_lienhe_admin($id);
                }
                $dslienhe = select_lienhe_all();
                include "lienhe/quanlylienhe.php";
                break;

                //------------------------------------------------------Hết Trang Quản Lý Liên Hệ------------------------------------------------------//

                // Trang quản lý banner
case 'quanlybanner':
    $dsbanner = select_banner_admin();
    include "banner/quanlybanner.php";
    break;

// Thêm banner
case 'thembanner':
    include "banner/thembanner.php";
    break;

// Thực hiện thêm banner
case 'th_thembanner':
    if (isset($_POST['s_thembanner'])) {
        $name = $_POST['name'];
        $link = $_POST['link'];
        $img = $_FILES['img']['name'];

        // Upload hình ảnh
        $target_file = IMG_PATH_ADMIN . $img;
        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            insert_banner_admin($name, $link, $img);
    }

    $dsbanner = select_banner_admin();
    include "banner/quanlybanner.php";
    break;

// Xóa banner
case 'deletebanner':
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $id = $_GET['id'];
        delete_banner_admin($id);
    }
    $dsbanner = select_banner_admin();
    include "banner/quanlybanner.php";
    break;

// Thực hiện sửa banner
case 'th_suabanner':
    if (isset($_POST['s_suabanner'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $link = $_POST['link'];
        $img = $_FILES['img']['name'];

        // Nếu có hình mới, upload hình ảnh mới
        if ($img != "") {
            $target_file = IMG_PATH_ADMIN . $img;
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
        } else {
            $img = $img;
        }
    }
   update_banner_admin($name, $link, $img ,$id);
    $dsbanner = select_banner_admin();
    include "banner/quanlybanner.php";
    break;
    
    case 'updatebanner':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
           $id = $_GET['id'];
        $bl =   select_banner_by_id_admin($id);
        include "banner/suabanner.php";
        }
    break;
    

//------------------------------------------------------Hết Trang Quản Lý Banner------------------------------------------------------//
            case 'dangxuat':
                if (isset($_SESSION['user']) && count($_SESSION['user']) > 0) {
                    unset($_SESSION['user']);
                    header("location: dangnhap.php");
                    break;
                }
                break;
            case 'thongke':
                include "thongke.php";
                break;



            default:
                include "thongke.php";
                break;
        }
    } else {
        include "thongke.php";
    }
    include "footer.php";
} else {
    header('Location: dangnhap.php');
}

 //------------------------------------------------------Hết Trang đăng xuất------------------------------------------------------//