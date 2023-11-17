<?php
    include "header.php";
    include "sidebar.php";
    include "../../models/pdo.php";
    include "../../models/sanpham.php";
    include "../../models/danhmuc.php";
    include "../../models/global.php";
    if (isset($_GET['ad'])) {
        $ad = $_GET['ad'];
        switch ($ad) {
            case 'quanlynguoidung':
                include "user/quanlynguoidung.php";
                break;
            case 'quanlysanpham':
                $sp =  select_sp_all();
                include "sanpham/quanlysanpham.php";
                break;
                case "deletesp":
                    $id = $_GET['id'];
                    sp_delete($id);
                    $sp = select_sp_all();
                    include "sanpham/quanlysanpham.php";
                break;
            case 'quanlydanhmuc':
                  $dm =danhmuc_all();
                include "danhmuc/quanlydanhmuc.php";
                break;
                case "deletedm":
                      $id = $_GET['id'];
                      danhmuc_delete($id);
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
                include "chucvu/quanlychucvu.php";
                break;
            case 'thongke':
                include "thongke.php";
                break;
            case 'themdanhmuc':
                include "danhmuc/themdanhmuc.php";
                break;
            case 'themsanpham':
                include "sanpham/themsanpham.php";
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
            case 'themdonhang':
                include "donhang/themdonhang.php";
                break;
            case 'thembienthe':
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