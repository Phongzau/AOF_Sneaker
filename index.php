<?php
    include "app/views/client/header.php";
    
    if (isset($_GET['cl'])) {
        $cl = $_GET['cl'];
        switch ($cl) {
        case 'dangnhapdangky':
            include "app/views/client/dangnhapdangky.php";
            break;
        case 'sanpham':
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