<?php

    include "app/models/pdo.php";
    include "app/models/danhmuc.php";
    include "app/views/client/header.php";
    include "app/models/banner.php";
    include "app/models/global.php";
    include "app/models/sanpham.php";
    include "app/models/bienthe.php";

    $dsbanner = select_all_banner();
    $dssp = select_sp_client();
    $sphot = select_sp_one_hot();

   
    if (isset($_GET['cl'])) {
        $cl = $_GET['cl'];
        switch ($cl) {
        case 'dangnhapdangky':
            include "app/views/client/dangnhapdangky.php";
            break;
        case 'sanphamchitiet':
            if (isset($_GET['idpro']) && ($_GET['idpro'] > 0)) {
                $id = $_GET['idpro'];
            }
            $spchitiet = select_sanpham_by_id_client($id);
            $btcolor = select_bienthe_by_id($id);
            $btsize = select_bienthe_by_id($id);
            $iddm = $spchitiet['iddm'];
            $splienquan = get_dssp_lienquan($iddm,$id);
            include "app/views/client/sanphamchitiet.php";
            break;
        case 'sanpham':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                $sp_all  =  select_sp_iddm($id);

            }else{
                $sp_all = select_sp_all_cl();
            }
            include "app/views/client/sanpham.php";
            break;
        case 'baiviet':
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