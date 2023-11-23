<?php 
 
$html_showdm = showdm_all(danhmuc_all());
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
</head>

<body>
<?=$html_showdm?>
<div id="page">
		
        <header class="version_1">
            <div class="layer"></div><!-- Mobile menu overlay mask -->
            <div class="main_header">
                <div class="container">
                    <div class="row small-gutters">
                        <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                            <div id="logo">
                                <a href="index.html"><img src="public/client/img/logo.svg" alt="" width="100" height="35"></a>
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
                                        <div class="menu-wrapper">
                                            <div class="row small-gutters">
                                                <div class="col-lg-3">
                                                    <h3>Listing grid</h3>
                                                    <ul>
                                                        <li><a href="listing-grid-1-full.html">Grid Full Width</a></li>
                                                        <li><a href="listing-grid-2-full.html">Grid Full Width 2</a></li>
                                                        <li><a href="listing-grid-3.html">Grid Boxed</a></li>
                                                        <li><a href="listing-grid-4-sidebar-left.html">Grid Sidebar Left</a></li>
                                                        <li><a href="listing-grid-5-sidebar-right.html">Grid Sidebar Right</a></li>
                                                        <li><a href="listing-grid-6-sidebar-left.html">Grid Sidebar Left 2</a></li>
                                                        <li><a href="listing-grid-7-sidebar-right.html">Grid Sidebar Right 2</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <h3>Listing row &amp; Product</h3>
                                                    <ul>
                                                        <li><a href="listing-row-1-sidebar-left.html">Row Sidebar Left</a></li>
                                                        <li><a href="listing-row-2-sidebar-right.html">Row Sidebar Right</a></li>
                                                        <li><a href="listing-row-3-sidebar-left.html">Row Sidebar Left 2</a></li>
                                                        <li><a href="listing-row-4-sidebar-extended.html">Row Sidebar Extended</a></li>
                                                        <li><a href="product-detail-1.html">Product Large Image</a></li>
                                                        <li><a href="product-detail-2.html">Product Carousel</a></li>
                                                        <li><a href="product-detail-3.html">Product Sticky Info</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3">
                                                    <h3>Other pages</h3>
                                                    <ul>
                                                        <li><a href="cart.html">Cart Page</a></li>
                                                        <li><a href="checkout.html">Check Out Page</a></li>
                                                        <li><a href="confirm.html">Confirm Purchase Page</a></li>
                                                        <li><a href="account.html">Create Account Page</a></li>
                                                        <li><a href="track-order.html">Track Order</a></li>
                                                        <li><a href="help.html">Help Page</a></li>
                                                        <li><a href="help-2.html">Help Page 2</a></li>
                                                        <li><a href="leave-review.html">Leave a Review</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
                                                    <div class="banner_menu">
                                                        <a href="#0">
                                                            <img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="public/client/img/banner_menu.jpg" width="400" height="550" alt="" class="img-fluid lazy">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
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
                            <a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>+94 423-23-221</strong></a>
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
                                            <?=$html_showdm ?>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                            <div class="custom-search-input">
                                <input type="text" placeholder="Search over 10.000 products">
                                <button type="submit"><i class="header-icon_search_custom"></i></button>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-3">
                            <ul class="top_tools">
                                <li>
                                    <div class="dropdown dropdown-cart">
                                        <a href="index.php?cl=giohang" class="cart_bt"><strong>2</strong></a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                <li>
                                                    <a href="product-detail-1.html">
                                                        <figure><img src="public/client/img/products/product_placeholder_square_small.jpg" data-src="public/client/img/products/shoes/thumb/1.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                                    </a>
                                                    <a href="#0" class="action"><i class="ti-trash"></i></a>
                                                </li>
                                                <li>
                                                    <a href="product-detail-1.html">
                                                        <figure><img src="public/client/img/products/product_placeholder_square_small.jpg" data-src="public/client/img/products/shoes/thumb/2.jpg" alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                                    </a>
                                                    <a href="0" class="action"><i class="ti-trash"></i></a>
                                                </li>
                                            </ul>
                                            <div class="total_drop">
                                                <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                                <a href="cart.html" class="btn_1 outline">View Cart</a><a href="checkout.html" class="btn_1">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /dropdown-cart-->
                                </li>
                            
                                <li>
                                    <div class="dropdown dropdown-access">
                                        <a href="index.php?cl=dangnhapdangky" class="access_link"><span>Account</span></a>
                                        <div class=" dropdown-menu">
                                            <a href="index.php?cl=dangnhap" class="btn_1">Đăng nhập</a>
                                            <a href="index.php?cl=dangky" class="btn_1 mt-2">Đăng ký</a>
                                            <ul>
                                                <li>
                                                    <a href="index.php?cl=giohang"><i class="ti-truck"></i>Giỏ hàng</a>
                                                </li>
                                                <li>
                                                    <a href="account.html"><i class="ti-package"></i>My Orders</a>
                                                </li>
                                                <li>
                                                    <a href="account.html"><i class="ti-user"></i>My Profile</a>
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
                    <input type="text" class="form-control" placeholder="Search over 10.000 products">
                    <input type="submit" class="btn_1 full-width" value="Search">
                </div>
                <!-- /search_mobile -->
            </div>
            <!-- /main_nav -->
        </header>
        <!-- /header -->
            