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
    $dsrole = select_all_role();
    if (isset($_GET['ad'])) {
        $ad = $_GET['ad'];
        switch ($ad) {
            case 'quanlynguoidung':
                $user = select_user_all();
                include "user/quanlynguoidung.php";
                break;
            case 'updateuser':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $iduser = get_user($id);
                }
                include "user/suanguoidung.php";
                break;
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
            case 'deleteuser':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_user_admin($id);
                }
                $user = select_user_all();
                include "user/quanlynguoidung.php";
                break;
            case 'quanlysanpham':
                $sp =  select_sp_all();
                include "sanpham/quanlysanpham.php";
                break;
                case "deletesp":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    sp_delete($id);
                    }
                    $sp = select_sp_all();
                    include "sanpham/quanlysanpham.php";
                break;
                case 'xembienthe':
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                    }
                    $bt =  select_bthe_id($id);
                    include "sanpham/xembienthesanpham.php";
                    break;
                    case "suabt":
                        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                        $idsp =$_GET['idsp'];
                        }
                        $bt_edit  = get_bienthe_id($id);
                       
                        include "sanpham/suabienthe.php";
                    break;
                case "suasp":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    }
                    $sp_edit  = get_sanpham_id($id);
                    $dm =danhmuc_all();
                    include "sanpham/suasanpham.php";
                break;
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
                case"themsanpham":
                    $dm =danhmuc_all();
                    include "sanpham/themsanpham.php";
                   break;
                case "tb_themsanpham":
                    
                    if (isset($_POST['s_themsanpham'])) {
                        $price = $_POST['price'];
                        $name = $_POST['name'];
                        $mota = $_POST['mota'];
                        $iddm = $_POST['iddm'];
                        $img = $_FILES['img']['name'];                      
                         $target_file = IMG_PATH_ADMIN . $img;
                        move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
                        sanpham_upload( $name, $price, $mota, $img, $iddm );
                    }
                        $sp = select_sp_all();
                        include "sanpham/quanlysanpham.php";   
                 
                    break;
                case"th_thembienthe":
                    if (isset($_POST['s_thembienthe'])) {
                        $id_sp = $_POST['id_sp'];
                        $mau = $_POST['mau'];
                        $dungluong = $_POST['dungluong'];
                        $soluong = $_POST['soluong'];
                        bienthe_insert($id_sp, $mau, $dungluong, $soluong);
                    }

                    case"th_suabienthe":
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
                    case "deletebt":
                        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                        $id = $_GET['id'];
                        bt_delete($id);
                        }
                        $sp = select_sp_all();
                        include "sanpham/quanlysanpham.php";
                    break;
                
            case 'quanlydanhmuc':
                  $dm =danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;
                case "deletedm":
                    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                      $id = $_GET['id'];
                      danhmuc_delete($id);
                    }
                      $dm =danhmuc_all();
                      
                      include "danhmuc/quanlydanhmuc.php";
                    break;
            case 'quanlybaiviet':
                include "baiviet/quanlybaiviet.php";
                break;
            case 'quanlykhuyenmai':
                include "khuyenmai/quanlykhuyenmai.php";
                break;
            case 'quanlydonhang':
                include "donhang/quanlydonhang.php";
                break;
            case 'quanlybienthe':
                include "bienthe/quanlybienthe.php";
                break;
            case 'quanlybinhluan':
                include "binhluan/quanlybinhluan.php";
                break;
            case 'quanlychucvu':
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;
            case 'thongke':
                include "thongke.php";
                break;
            case 'themdanhmuc':
                include "danhmuc/themdanhmuc.php";
                break;
          
                
              
            case 'quanlybaiviet':
                include "baiviet/quanlybaiviet.php";
                break;
            case 'thembaiviet':
                include "baiviet/thembaiviet.php";
                break;
            case 'themkhuyenmai':
                include "khuyenmai/themkhuyenmai.php";
                break;
            case 'themchucvu':
                include "chucvu/themchucvu.php";
                break;
            case 'th_themchucvu':
                if (isset($_POST['th_themchucvu'])) {
                    $chuc_vu = $_POST['chuc_vu'];
                    $mota = $_POST['mota'];
                }
                insert_chucvu_admin($chuc_vu, $mota);
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;
            case 'deleterole':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    delete_chucvu_admin($id);
                }
                $dsrole = select_all_role();
                include "chucvu/quanlychucvu.php";
                break;
            case 'updaterole':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    $idrole = select_chucvu_admin_by_id($id);
                }
                include "chucvu/suachucvu.php";
                break;
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
            case 'themdonhang':
                include "donhang/themdonhang.php";
                break;
            case 'thembienthe':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                   $id = $_GET['id'];
                }
                include "sanpham/thembienthe.php";
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