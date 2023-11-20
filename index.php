<?php
    include "app/views/client/header.php";
    
    if (isset($_GET['cl'])) {
        $cl = $_GET['cl'];
        switch ($cl) {
        case 'dangnhapdangky':
            include "app/views/client/dangnhapdangky.php";
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