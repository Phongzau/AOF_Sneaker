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