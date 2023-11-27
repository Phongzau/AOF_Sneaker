
<?php 
session_start();
     include "../../models/pdo.php";
     include "../../models/binhluan.php";

     if(isset($_SESSION['s_user'])){
      $iduser = $_SESSION['s_user']['id_user'];
      $hoten = $_SESSION['s_user']['username'];
      }
      
     if(isset($_GET['id'])){
      $id = $_GET['id'];
  }
  if (isset($_POST['guibinhluan'])) {
      $id = $_POST['id'];
      $noidung = $_POST['noidung'];
      date_default_timezone_set('Asia/Bangkok');
      $ngaybl = date('H:i:s d/m/Y');
      binhluan_insert($iduser, $id, $noidung, $ngaybl,$hoten);



  }








$bl = select_id_binhluan($id);
 $html_bl = showds_binhluan_cl($bl);



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
    <style>
       .ten{
        font-size: 18px;
       }
       .ngay{
        color: dimgray;
       }
       .tong{
        margin: 50px;
       }


       .button {
  width: 90px;
  height: 40px;
  position: relative;
  font-family: var(--font);
  color: #3b82f6;
  font-weight: 600;
  background-color: #fff;
  border: none;
  overflow: hidden;
  border-radius: 5px;
  box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
  transition: all ease 100ms;
}

button:hover {
  background-color: #cbdcf8;
}

button:focus {
  background-color: #cbdcf8;
}

button::before {
  content: 'done✅';
  position: absolute;
  color: #3b82f6;
  left: 0;
  top: -14px;
  right: 0;
  transition: all ease 300ms;
  opacity: 0%;
}

button:focus::before {
  opacity: 100%;
  transform: translatey(26px);
}

.submit {
  transition: all ease 100ms;
  opacity: 100%;
}

button:focus > .submit {
  opacity: 0%;
}

    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
                               
<?=$html_bl?>
<div>
<?php
if (isset( $_SESSION['s_user']) && (count( $_SESSION['s_user']) > 0)) { 
?>
<form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        <textarea name="noidung" id="" cols="100" rows="5" required ></textarea> <br>
        <button type="submit" name="guibinhluan">Gửi bình luận</button>
        
    </form>
<?php
} else {
    echo "<a href='../../../index.php?cl=dangnhap' target='_parent' ><button>Bạn phải đăng nhập để sử dụng chức năng này</button></a>";
    
}
?>

    

</div>
                               
    
</body>