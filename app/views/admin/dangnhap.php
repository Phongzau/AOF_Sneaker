<?php
    session_start(); 
    include "../../models/pdo.php"; 
    include "../../models/user.php";
    
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = select_user_admin($username, $password);
        if(isset($user)&&(is_array($user))&&(count($user)>0)){
             extract($user);
            if($chuc_vu == "Admin"){
                $_SESSION['user']=$user;
                header('location:index.php');
            }else{
                $tb="Tài khoản không đủ thẩm quyền";
            }
        }else{
            $tb = "Tài khoản hoặc mật khẩu sai, kiểm tra lại";
        }
    
    }
?>

<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="../../../public/form-dangnhap/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Đăng nhập" />
    <title>Đăng nhập Admin</title>    
    <!-- //for-mobile-apps -->
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
    <!--header start here-->
    <div class="header">
        <div class="header-main">
            <h1>Đăng Nhập</h1>
            <div class="header-bottom">
                <div class="header-right w3agile">

                    <div class="header-left-bottom agileinfo">

                        <form action="#" method="post">
                            <input type="text"  name="username" placeholder="Nhập tài khoản của bạn vào đây"/>
                            <input type="password" name="password" placeholder="Nhập mật khẩu của bạn vào đây"/>
                            <div class="remember">
                            <h2 style="color: red;">
                            <?php
                                if (isset($tb)) {
                                    echo $tb;
                                } else {
                                    $tb = "";
                                    echo $tb;
                                }
                            ?>
                            </h2>   
                            <!-- <span class="checkbox1">
							   <label class="checkbox"><input type="checkbox" name="" checked=""><i></i>Remember me</label>
						 </span>
                            
						 <div class="forgot">
						 	<h6><a href="#">Forgot Password?</a></h6>
						 </div> -->
                                <div class="clear"></div>
                            </div>

                            <input type="submit" name="login" value="Login">
                        </form>
                        <!-- <div class="header-left-top">
						<div class="sign-up"> <h2>or</h2> </div>
					
					</div>
					<div class="header-social wthree">
							<a href="#" class="face"><h5>Facebook</h5></a>
							<a href="#" class="twitt"><h5>Twitter</h5></a>
						</div> -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--header end here-->
    <div class="copyright">
        <p>© 2023 Login AOF_Sneaker ADMIN. All rights reserved | Design by <a href="http://w3layouts.com/"
                target="_blank"> AOF_Sneaker DEV </a></p>
    </div>
    <!--footer end here-->
</body>

</html>