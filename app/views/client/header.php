<?php
$html_showdm = showdm_all(danhmuc_all());
    if (isset($_SESSION['s_user']) && is_array($_SESSION['s_user']) && count($_SESSION['s_user']) > 0) {
        extract($_SESSION['s_user']);
        $html_account = '<a href="index.php?cl=thongtinuser" class="access_link"><span>Account</span></a>
                         <div class="dropdown-menu">
                         <div class="text-center mb-2 "><img class="img-header" width=30% src="public/uploads/'.$img.'" alt=""></div>
                         <h5 class=text-center mt-5>'.$user_name.'</h5>
                         <a href="index.php?cl=dangxuat" class="btn_1 mt-3">Đăng xuất</a>';
    } else {
        $html_account = '<a href="index.php?cl=dangnhap" class="access_link"><span>Account</span></a>
                         <div class="dropdown-menu">
                         <a href="index.php?cl=dangnhap" class="btn_1">Đăng nhập</a>
                         <a href="index.php?cl=dangky" class="btn_1 mt-2">Đăng ký</a>';
    }
    $html_cartheader =  viewcart_header();
    $total = get_tongdonhang();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Allaia | Bootstrap eCommerce Template - ThemeForest</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="public/client/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="public/client/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="public/client/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="public/client/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="public/client/img/apple-touch-icon-144x144-precomposed.png">
    <link rel="stylesheet" href="public/client/css/mystyle.css">
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="public/client/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/client/css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/home_1.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="public/client/css/custom.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/listing.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/blog.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/account.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/contact.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/cart.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="public/client/css/product_page.css" rel="stylesheet">

    <link href="public/client/css/checkout.css" rel="stylesheet">
    <style>
.tk {
  color: #090909;
  font-size: 10px;
  border-radius: 1em;
  background: #e8e8e8;
  border: 0.5px solid #e8e8e8;
  transition: all .3s;
  box-shadow: 6px 6px 12px #c5c5c5,
             -6px -6px 12px #ffffff;
}


    </style>
</head>

<body>
    <div id="page">

        <header class="version_1">
            <div class="layer"></div><!-- Mobile menu overlay mask -->
            <div class="main_header">
                <div class="container">
                    <div class="row small-gutters">
                        <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                            <div id="logo">
                                <a href="index.php"><img src="public/client/img/logo.svg" alt="" width="100" height="35"></a>
                            </div>
                        </div>
                        <nav class="col-xl-6 col-lg-7">
                            <a class="open_close" href="javascript:void(0);">
                                <div class="hamburger hamburger--spin">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                            </a>
                            <!-- Mobile menu button -->
                            <div class="main-menu">
                                <div id="header_menu">
                                    <a href="index.html"><img src="public/client/img/logo_black.svg" alt="" width="100" height="35"></a>
                                    <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                                </div>
                                <ul>
                                    <li class="">
                                        <a href="index.php" class="show-submenu">Trang Chủ</a>
                                    </li>
                                    <li class="megamenu submenu">
                                        <a href="javascript:void(0);" class="show-submenu-mega">Danh Mục</a>
                                        <div class="menu-wrapper w-100">
                                            <ul class="clearfix">
                                                <li>
                                                    <div id="menu">
                                                        <ul>
                                                            <?= $html_showdm ?>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- /row -->
                                        </div>
                                        <!-- /menu-wrapper -->
                                    </li>
                                    <li class="">
                                        <a href="index.php?cl=sanpham" class="show-submenu">Sản Phẩm</a>
                                    </li>
                                    <li>
                                        <a href="index.php?cl=baiviet">Bài viết</a>
                                    </li>
                                    <li>
                                        <a href="index.php?cl=lienhe">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                            <!--/main-menu -->
                        </nav>
                        <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                            <a class="phone_top" href="tel://0343147165"><strong><span>Liên Hệ Trực Tiếp</span>0343147165</strong></a>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /main_header -->

            <div class="main_nav Sticky">
                <div class="container">
                    <div class="row small-gutters">
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <nav class="categories">
                                <ul class="clearfix">
                                    <li><span>
                                            <a href="#">
                                                <span class="hamburger hamburger--spin">
                                                    <span class="hamburger-box">
                                                        <span class="hamburger-inner"></span>
                                                    </span>
                                                </span>
                                                Danh Mục
                                            </a>
                                        </span>
                                        <div id="menu">
                                            <ul>
                                                <?= $html_showdm ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- <button type="submit" name="timkiem" ><i class="header-icon_search_custom"></i></button> -->
                        <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                            <div class="custom-search-input">
                                <form action="index.php?cl=sanpham" method="POST"  >
                                <div style="display: flex;">
                                <input type="text" name="kyw" class="kw" required placeholder="Tìm Kiếm sản phẩm">
                                 <input  type="submit" class="tk"  name="timkiem" value="Tìm Kiếm">
                                 </div>
                                 </form>
                            </div>
                        </div>


                        <div class="col-xl-3 col-lg-2 col-md-3">
                            <ul class="top_tools">
                                <li>
                                    <div class="dropdown dropdown-cart">
                                        <a href="index.php?cl=giohang" class="cart_bt"><strong>2</strong></a>
                                        <?=$html_cartheader?>
                                        <div class="total_drop">
                                <div class="clearfix"><strong>Total</strong><span><?=$total?></span></div>
                                <a href="index.php?cl=viewcart" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                </div>
                                </div>
                                    </div>
                                    <!-- /dropdown-cart-->
                                </li>

                                <li>
                                    <div class="dropdown dropdown-access">
                                        <?=$html_account;?>
                                            <ul>
                                                <li>
                                                    <a href="index.php?cl=giohang"><i class="ti-truck"></i>Giỏ hàng</a>
                                                </li>
                                                <li>
                                                    <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                                </li>
                                                <li>
                                                    <a href="index.php?cl=thongtinuser"><i class="ti-user"></i>My Profile</a>
                                                </li>
                                                <li>
                                                    <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /dropdown-access-->
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                                </li>
                                <li>
                                    <a href="#menu" class="btn_cat_mob">
                                        <div class="hamburger hamburger--spin" id="hamburger">
                                            <div class="hamburger-box">
                                                <div class="hamburger-inner"></div>
                                            </div>
                                        </div>
                                        Categories
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <div class="search_mob_wp">
                    <input type="text" class="form-control" placeholder="Tìm Kie">
                    <input type="submit" class="btn_1 full-width" value="Search">
                </div>
                <!-- /search_mobile -->
            </div>
            <!-- /main_nav -->
        </header>
        <!-- /header -->
