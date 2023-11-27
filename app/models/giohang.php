<?php 

//insert vao table cart
// function cart_insert($idpro,$price, $name, $img,$soluong,$thanhtien,$idbill){
//     $sql = "INSERT INTO cart(idpro,price, name, img,soluong,thanhtien,idbill) VALUES (?, ?, ?,?, ?, ?,?)"; 
//    pdo_execute($sql, $idpro,$price, $name, $img,$soluong,$thanhtien,$idbill);
// }

function viewcart(){
    $html_cart ='';
    $i = 1;
    foreach ($_SESSION['giohang'] as $sp) {
    extract($sp);
    $tt = $price*$soluong;
    $html_cart.='   <tr>
                        <td>'.$i.'</td>
                        <td><span class="item_cart">'.$name.'</span></td>
                        <td>
                            <div class="thumb_cart">
                                <img width="30%" src="'.IMG_PATH_USER.$img.'" data-src="'.IMG_PATH_USER.$img.'" class="lazy" alt="Image">
                            </div>
                        </td>
                        <td><strong>$'.$price.'</strong></td>
                        <td><strong>'.$soluong.'</strong></td>
                        <td><strong>'.$tt.'</strong></td>
                        <td class="options">
                            <a href="#"><i class="ti-trash"></i></a>
                        </td>
                    </tr>';
    $i++;
}
return  $html_cart ;
}

function viewcart_header() {
    $html_cartheader ='<div class="dropdown-menu">';
    foreach ($_SESSION['giohang'] as $sp) {
    extract($sp);
    $tt = $price*$soluong;
    $link = "index.php?cl=sanphamchitiet&idpro=".$id_sp;
    $html_cartheader.='   <ul>
                                <li>
                                    <a href="'.$link.'">
                                        <figure><img src="'.IMG_PATH_USER.$img.'" data-src="'.IMG_PATH_USER.$img.'" alt="" width="50" height="50" class="lazy"></figure>
                                        <strong><span>'.$soluong.'x'.$name.'</span>$'.$tt.'</strong>
                                    </a>
                                    <a href="#0" class="action"><i class="ti-trash"></i></a>
                                </li>
                            </ul>
                            ';
}
return $html_cartheader;
}

function viewcart_donhang() {
    $html_cartdonhang ='';
    foreach ($_SESSION['giohang'] as $sp) {
    extract($sp);
    $tt = $price*$soluong;
    $html_cartdonhang.='   <div class="son-li">
                            <img width="20%" src="'.IMG_PATH_USER.$img.'" alt=""><p><strong>'.$name.' x '.$soluong.'</strong></p> <span><strong>$'.$tt.'</strong></span>
                          </div>
                            ';  
}
return $html_cartdonhang;
}

function get_tongdonhang() {
    $tong = 0;
    foreach($_SESSION['giohang'] as $sp) {
        extract($sp);
        $tt = (INT)$price * (INT)$soluong;
        $tong+=$tt;
    }
    return $tong;
}
// function get_tongdonhang(){
//     $tong =0;

// foreach ($_SESSION['giohang'] as $sp) {
//     extract($sp);
//     $tt = $price*$soluong;
//     $tong += $tt;
// }
// return  $tong ;
// }
// ?>