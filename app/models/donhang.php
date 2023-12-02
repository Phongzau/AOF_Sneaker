<?php
// require_once 'pdo.php';


// function bill_user_insert_id($madh,$iduser,$nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi,$nguoinhan_ten,$nguoinhan_diachi,$nguoinhan_tel,$total,$ship,$voucher,$tongthanhtoan,$pttt){
//   $sql = "INSERT INTO bill(madh,iduser,nguoidat_ten, nguoidat_email, nguoidat_tel, nguoidat_diachi,nguoinhan_ten,nguoinhan_diachi,nguoinhan_tel,total,ship,voucher,tongthanhtoan,pttt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
//  return  pdo_execute_id($sql,$madh,$iduser,$nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi,$nguoinhan_ten,$nguoinhan_diachi,$nguoinhan_tel,$total,$ship,$voucher,$tongthanhtoan,$pttt);
// }

// function donhang_new(){
//   $sql = "SELECT * FROM bill ORDER BY id DESC ";
//   return pdo_query($sql);
// }

function select_dh_cxnh($id_user) {
    $sql = "SELECT * FROM  donhangchitiet WHERE trangthai = 0 AND id_usct=?";
    return pdo_query($sql, $id_user);
}

function select_dh_dcb($id_user) {
    $sql = "SELECT * FROM  donhangchitiet WHERE trangthai = 1 AND id_usct=?";
    return pdo_query($sql, $id_user);
}

function select_dh_dgh($id_user) {
    $sql = "SELECT * FROM  donhangchitiet WHERE trangthai = 2 AND id_usct=?";
    return pdo_query($sql, $id_user);
}

function select_dh_dg($id_user) {
    $sql = "SELECT * FROM  donhangchitiet WHERE trangthai = 3 AND id_usct=?";
    return pdo_query($sql, $id_user);
}


function select_dh_dhct($id_user) {
  $sql = "SELECT * FROM donhang 
          INNER JOIN sanpham ON donhang.id_sanpham = sanpham.id_sp
          INNER JOIN donhangchitiet ON donhang.madh_ct = donhangchitiet.id_ct
          WHERE id_usdh = ?
          ORDER BY donhang.madh_ct";
  return pdo_query($sql, $id_user); 
}

function select_dhct($madh_ct) {
  $sql = "SELECT * FROM donhang 
          INNER JOIN sanpham ON donhang.id_sanpham = sanpham.id_sp
          INNER JOIN donhangchitiet ON donhang.madh_ct = donhangchitiet.id_ct
          WHERE madh_ct = ?
          ORDER BY donhang.madh_ct";
  return pdo_query($sql, $madh_ct); 
}



function dhct_insert_id($madh, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $voucher, $tongthanhtoan, $pttt, $id_user) {
  $sql = "INSERT INTO donhangchitiet(madh, nguoidat_ten, nguoidat_email, nguoidat_tell, nguoidat_diachi, total, voucher, tongthanhtoan, pttt, id_usct) VALUES (?, ?, ?, ?, ?, ? ,?, ?, ?, ?)";
    return pdo_execute_id($sql, $madh, $nguoidat_ten, $nguoidat_email, $nguoidat_tel, $nguoidat_diachi, $total, $voucher, $tongthanhtoan, $pttt, $id_user); 
}

function donhang_insert($id_sp, $id_dhct, $name, $price, $soluong, $ngaydathang, $thanhtien, $size, $id_user) {
  $sql = "INSERT INTO donhang(id_sanpham, madh_ct, tensp, price, soluong, ngaydathang, tonggia, size, id_usdh) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)";
    pdo_execute($sql, $id_sp, $id_dhct, $name, $price, $soluong, $ngaydathang, $thanhtien, $size, $id_user); 
}

function donhang_all_id($id){
  $sql = "SELECT * FROM donhang  WHERE madh_ct=? "   ;
  return pdo_query($sql,$id);
}
function donhangct_all(){
  $sql = "SELECT * FROM donhangchitiet ";
  return pdo_query($sql);
}

function show_dhct($dhct) {
  $html_showdhcl = '<div class="row mb-2">
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Thông tin đơn hàng</h5>
                            </div>
                            <div class="card-body">';
  foreach ($dhct as $dh) {
      extract($dh);

      switch ($trangthai) {
          case 0:
              $tt = "Chờ Xác Nhận";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                        <a href="index.php?cl=huydonhang&madh_ct='.$madh_ct.'" class="btn btn-danger "><p class="card-text"><strong>Hủy đơn hàng</strong></p></a>';
              break;
          case 1:
              $tt = "Đang Chuẩn Bị Hàng";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                        <a href="#" class="btn btn-danger huy-button disabled" disabled><strong>Hủy đơn hàng</strong></a>';
              break;
          case 2:
              $tt = "Đang Giao Hàng";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                       <a href="index.php?cl=danhandonhang&madh_ct='.$madh_ct.'" class="btn btn-primary "><p class="card-text"><strong>Đã nhận được hàng ?</strong></p></a>';
              break;
          case 3:
              $tt = "Giao Hàng Thành Công";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                      <a href="#" class="btn btn-success "><p class="card-text"><strong>Đã nhận được hàng</strong></p></a>';
              break;
          default:
              $tt = "Đơn Hàng Không Xác Định";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
              break;
      }
        
          // Hiển thị thông tin sản phẩm
          $html_showdhcl .= '<div class="row mb-2">
                          <div class="col-md-4">
                              <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
                          </div>
                          <div class="col-md-8">
                              <h4 class="card-title">' . $name . '</h4>
                              <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
                              <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
                              <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
                              <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
                          </div>
                      </div>';
          $currentOrderId = $madh;
          $nguoidathang = $nguoidat_ten;
          $ttt = $tongthanhtoan;
          $ngaydat = $ngaydathang;
          $diachi = $nguoidat_diachi;
          $trangthaidh = $boxtt;
}

  $html_showdhcl .= '</div>
                      <div class="card-footer">
                      <p class="card-text"><strong>Mã đơn hàng: </strong>' . $currentOrderId . '</p>
                      <p class="card-text"><strong>Người đặt hàng: </strong>' . $nguoidathang . '</p>
                      <p class="card-text"><strong>Địa chỉ giao hàng: </strong>' . $diachi . '</p>
                      <p class="card-text"><strong>Ngày đặt hàng: </strong> ' . $ngaydat . '</p>
                      <p class="card-text"><strong>Tổng thanh toán: </strong> ' .  $ttt  . '</p>
                      '.$trangthaidh.'
                      </div></div></div></div>';

  return $html_showdhcl;
}


function show_dh_client($dsdhct) {
  $html_showdhcl = '';
  $currentOrderId = null; // Biến để theo dõi mã đơn hàng hiện tại

  foreach ($dsdhct as $dh) {
      extract($dh);

      switch ($trangthai) {
          case 0:
              $tt = "Chờ Xác Nhận";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                        <a href="index.php?cl=huydonhang&madh='.$madh_ct.'" class="btn btn-danger "><p class="card-text"><strong>Hủy đơn hàng</strong></p></a>';
              break;
          case 1:
              $tt = "Đang Chuẩn Bị Hàng";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
              break;
          case 2:
              $tt = "Đang Giao Hàng";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                       <a href="index.php?cl=danhandonhang&madh='.$madh_ct.'" class="btn btn-primary "><p class="card-text"><strong>Đã nhận được hàng ?</strong></p></a>';
              break;
          case 3:
              $tt = "Giao Hàng Thành Công";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>
                      <a href="#" class="btn btn-success "><p class="card-text"><strong>Đã nhận được hàng</strong></p></a>';
              break;
          default:
              $tt = "Đơn Hàng Không Xác Định";
              $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
              break;
      }


      if ($madh_ct !== $currentOrderId) { // currentOrderId = NULL
        // Kết thúc đơn hàng trước đó nếu tồn tại
        if ($currentOrderId !== null) {
          $html_showdhcl .= '</div>
                              <div class="card-footer">
                              <p class="card-text"><strong>Mã đơn hàng: </strong>' . $currentOrderId . '</p>
                              <p class="card-text"><strong>Người đặt hàng: </strong>' . $nguoidathang . '</p>
                              <p class="card-text"><strong>Địa chỉ giao hàng: </strong>' . $diachi . '</p>
                              <p class="card-text"><strong>Ngày đặt hàng: </strong> ' . $ngaydat . '</p>
                              <p class="card-text"><strong>Tổng thanh toán: </strong> ' . $ttt . '</p>
                              '.$trangthaidh.'
                            </div></div></div></div>';
      }
          $html_showdhcl .= '<div class="row mb-2">
                              <div class="col-md-8 offset-md-2">
                                  <div class="card">
                                      <div class="card-header">
                                          <h5 class="card-title">Thông tin đơn hàng</h5>
                                      </div>
                                      <div class="card-body">';
          $currentOrderId = $madh_ct;
          $nguoidathang = $nguoidat_ten;
          $ttt = $tongthanhtoan;
          $ngaydat = $ngaydathang;
          $diachi = $nguoidat_diachi;
          $trangthaidh = $boxtt;
        }
          // Hiển thị thông tin sản phẩm
          $html_showdhcl .= '<div class="row mb-2">
                          <div class="col-md-4">
                              <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
                          </div>
                          <div class="col-md-8">
                              <h4 class="card-title">' . $name . '</h4>
                              <p class="card-text">' . $mota . '</p>
                              <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
                              <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
                              <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
                              <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
                          </div>
                      </div>';
}
if ($currentOrderId !== null) {
  $html_showdhcl .= '</div>
                      <div class="card-footer">
                      <p class="card-text"><strong>Mã đơn hàng: </strong>' . $currentOrderId . '</p>
                      <p class="card-text"><strong>Người đặt hàng: </strong>' . $nguoidathang . '</p>
                      <p class="card-text"><strong>Địa chỉ giao hàng: </strong>' . $diachi . '</p>
                      <p class="card-text"><strong>Ngày đặt hàng: </strong> ' . $ngaydat . '</p>
                      <p class="card-text"><strong>Tổng thanh toán: </strong> ' .  $ttt  . '</p>
                      '.$trangthaidh.'
                      </div></div></div></div>';
}
  return $html_showdhcl;
}

function delete_donhang($mdh) {
  $sql = "DELETE FROM donhang WHERE madh_ct=?";
  pdo_execute($sql, $mdh);
}

function delete_donhangct($mdh) {
  $sql = "DELETE FROM donhangchitiet WHERE id_ct=?";
  pdo_execute($sql, $mdh);
}

// function show_dh_client($dsdhct) {
//   $html_showdhcl = '';
//   $currentOrderId = null; // Biến để theo dõi mã đơn hàng hiện tại

//   foreach ($dsdhct as $dh) {
//       extract($dh);

//       // Nếu mã đơn hàng thay đổi, bắt đầu một đơn hàng mới
//       if ($madh !== $currentOrderId) {
//           // Kết thúc đơn hàng trước đó nếu tồn tại
//           if ($currentOrderId !== null) {
//               $html_showdhcl .= '</div>';
//           }

//           // Bắt đầu một đơn hàng mới
//           $html_showdhcl .= '<div class="row">
//                               <div class="col-md-8 offset-md-2">
//                                   <div class="card">
//                                       <div class="card-header">
//                                           <h5 class="card-title">Thông tin đơn hàng</h5>
//                                       </div>
//                                       <div class="card-body">';
//           $currentOrderId = $madh;
//       }

//       // Hiển thị thông tin sản phẩm
//       $html_showdhcl .= '<div class="row">
//                           <div class="col-md-4">
//                               <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
//                           </div>
//                           <div class="col-md-8">
//                               <h4 class="card-title">' . $name . '</h4>
//                               <p class="card-text">' . $mota . '</p>
//                               <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
//                               <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
//                               <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
//                               <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
//                           </div>
//                         </div>';

//   }

//   // Kết thúc đơn hàng cuối cùng nếu tồn tại
//   if ($currentOrderId !== null) {
//       $html_showdhcl .= '</div></div></div></div>';
//   }

//   return $html_showdhcl;
// }
// function donhang_id($iduser){
//   $sql = "SELECT * FROM bill WHERE iduser=?  ";
//   return pdo_query($sql, $iduser);
// }

// function showsp_donhang($dssp){
//   $html_dssp ='';
//   $i=1;
//   foreach ($dssp as $sp) {
//    extract($sp);
//    $html_dssp.='<tr>
//    <td>'.$i.'</td>
//    <td>'.$madh.'</td>
//    <td>'.$tongthanhtoan.'</td>
// </tr>';
// $i++;
//   }
//   return $html_dssp;
// }


// function tong_doanhthu($dssp){
//   $tong=0;
//   foreach ($dssp as $sp) {
//    extract($sp);
//  $tong += $tongthanhtoan;
//   }
//   return  $tong;
// }

// function show_dh_new($dssp){
//   $html_dssp ='';
//   foreach ($dssp as $sp) {
//    extract($sp);
//    $html_dssp.='<tr>
//    <td>'.$madh.'</td>
//    <td>'.$trangthai.'</td>
// </tr>';
//   }
//   return $html_dssp;
// }



// function show_donhang($dssp){
//   $html_dssp ='';
//   $i=1;
//   foreach ($dssp as $sp) {
//    extract($sp);
//    $html_dssp.='<td>'.$i.'</td>
//    <td>'.$madh.'</td>
//    <td>'.$nguoidat_ten.'</td>
//    <td>'.$nguoidat_tel.'</td>
//    <td>'.$nguoidat_email.'</td>
//    <td>'.$nguoidat_diachi.'</td>
//    <td>'.$nguoinhan_ten.'</td>
//    <td>'.$nguoinhan_tel.'</td>
//    <td>'.$nguoinhan_diachi.'</td>
//    <td>'.$tongthanhtoan.'</td>
//    <td>
//        <a href="admin.php?pg=deldh&id='.$id.'" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Huỷ</a>
//    </td>
// </tr>';
// $i++;
//   }
//   return $html_dssp;
// }

function show_dh_admin($dssp){
    $html_dssp ='';
    foreach ($dssp as $sp) {
     extract($sp);
     $html_dssp.='<div class="box25 mr15">
     <tr>
     <td>'.$id_dh.'</td>
     <td>'.$id_sanpham.'</td>
     <td>'.$madh_ct.'</td>
     <td>'.$tensp.'</td>
     <td>'.$price.'</td>
     <td>'.$tonggia.'</td>
     <td>'.$soluong.'</td>s
     <td>'.$ngaydathang.'</td>
     <td>'.$size.'</td>
     <td>'.$id_usdh.'</td>
     <td>
     <a href="index.php?ad=deletedh&id='.$id_dh.'" class="btn btn-danger">
     <i class="fa-solid "></i>Xóa</a>
    
   </tr>
   <tr>';
    }
    return $html_dssp;
}

function show_dhdg($dsdh) {
  $html_showdh = '';
  $currentOrderId = null;
  foreach ($dsdh as $dh) {
    extract($dh);
    switch ($trangthai) {
      case 0:
          $tt = "Chờ Xác Nhận";
          $thanhtb = '<p class="card-text text-danger"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=huydonhang&madh_ct='.$madh_ct.'" class="btn btn-danger "><p class="card-text"><strong>Hủy đơn hàng</strong></p></a>';
          break;
      case 1:
          $tt = "Đang Chuẩn Bị Hàng";
          $thanhtb = '<p class="card-text text-warning"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-danger huy-button disabled" disabled><strong>Hủy đơn hàng</strong></a>';
          break;
      case 2:
          $tt = "Đang Giao Hàng";
          $thanhtb = '<p class="card-text text-primary"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=danhandonhang&madh_ct='.$madh_ct.'" class="btn btn-primary "><p class="card-text"><strong>Đã nhận được hàng ?</strong></p></a>';
          break;
      case 3:
          $tt = "Giao Hàng Thành Công";
          $thanhtb = '<p class="card-text text-success "><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-success "><p class="card-text"><strong>Đã nhận được hàng</strong></p></a>';
          break;
      default:
          $tt = "Đơn Hàng Không Xác Định";
          $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          break;
  }
  if ($trangthai === 3) {
    if ($currentOrderId !== $madh_ct) {
      // Tính tổng số lượng sản phẩm trong đơn hàng
      $totalQuantity = array_reduce(
          $dsdh,
          function ($carry, $item) use ($madh_ct) {
              return $carry + ($item['madh_ct'] === $madh_ct ? $item['soluong'] : 0);
          },
          0
      );

      $html_showdh .= '
          <div class="container mt-4">
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">Thông tin đơn hàng</h5>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-3">
                                      <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
                                  </div>
                                  <div class="col-md-9">
                                      <h4 class="card-title"> ' . $name . '</h4>
                                      <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
                                      <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
                                      <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
                                      <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
                                  </div>
                              </div>
                              <!-- Thêm dòng gạch ngăn cách -->
                              <hr class="hr-tt">
                              <div class="tttdh mt-4">
                                  <p class="card-text"><strong>Tổng số lượng sản phẩm trong đơn hàng:</strong> ' . $totalQuantity . '</p>
                                  <p class="card-text"><strong>Tổng tiền thanh toán:</strong> ' . $tongthanhtoan . '</p>
                              </div>
                          </div>
                          <div class="card-footer d-flex justify-content-between">
                              <div>
                                  '.$thanhtb.'
                              </div>
                              <div>
                                  <a href="index.php?cl=chitietdonhang&madh_ct='.$madh_ct.'" class="btn btn-primary">Chi tiết đơn hàng</a>
                                  '.$boxtt.'
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';

  }
    
      // Cập nhật mã đơn hàng chi tiết hiện tại
      $currentOrderId = $madh_ct;
      
  }
}
return $html_showdh;
}

function show_dhxnh($dsdh) {
  $html_showdh = '';
  $currentOrderId = null;
  foreach ($dsdh as $dh) {
    extract($dh);
    switch ($trangthai) {
      case 0:
          $tt = "Chờ Xác Nhận";
          $thanhtb = '<p class="card-text text-danger"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=huydonhang&madh_ct='.$madh_ct.'" class="btn btn-danger "><p class="card-text"><strong>Hủy đơn hàng</strong></p></a>';
          break;
      case 1:
          $tt = "Đang Chuẩn Bị Hàng";
          $thanhtb = '<p class="card-text text-warning"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-danger huy-button disabled" disabled><strong>Hủy đơn hàng</strong></a>';
          break;
      case 2:
          $tt = "Đang Giao Hàng";
          $thanhtb = '<p class="card-text text-primary"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=danhandonhang&madh_ct='.$madh_ct.'" class="btn btn-primary "><p class="card-text"><strong>Đã nhận được hàng ?</strong></p></a>';
          break;
      case 3:
          $tt = "Giao Hàng Thành Công";
          $thanhtb = '<p class="card-text text-success "><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-success "><p class="card-text"><strong>Đã nhận được hàng</strong></p></a>';
          break;
      default:
          $tt = "Đơn Hàng Không Xác Định";
          $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          break;
  }
  if ($trangthai === 0) {
    if ($currentOrderId !== $madh_ct) {
      // Tính tổng số lượng sản phẩm trong đơn hàng
      $totalQuantity = array_reduce(
          $dsdh,
          function ($carry, $item) use ($madh_ct) {
              return $carry + ($item['madh_ct'] === $madh_ct ? $item['soluong'] : 0);
          },
          0
      );

      $html_showdh .= '
          <div class="container mt-4">
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">Thông tin đơn hàng</h5>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-3">
                                      <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
                                  </div>
                                  <div class="col-md-9">
                                      <h4 class="card-title"> ' . $name . '</h4>
                                      <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
                                      <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
                                      <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
                                      <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
                                  </div>
                              </div>
                              <!-- Thêm dòng gạch ngăn cách -->
                              <hr class="hr-tt">
                              <div class="tttdh mt-4">
                                  <p class="card-text"><strong>Tổng số lượng sản phẩm trong đơn hàng:</strong> ' . $totalQuantity . '</p>
                                  <p class="card-text"><strong>Tổng tiền thanh toán:</strong> ' . $tongthanhtoan . '</p>
                              </div>
                          </div>
                          <div class="card-footer d-flex justify-content-between">
                              <div>
                                  '.$thanhtb.'
                              </div>
                              <div>
                                  <a href="index.php?cl=chitietdonhang&madh_ct='.$madh_ct.'" class="btn btn-primary">Chi tiết đơn hàng</a>
                                  '.$boxtt.'
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';
  }
    

      // Cập nhật mã đơn hàng chi tiết hiện tại
      $currentOrderId = $madh_ct;
  }
}
return $html_showdh;
}

function show_dhcbh($dsdh) {
  $html_showdh = '';
  $currentOrderId = null;
  foreach ($dsdh as $dh) {
    extract($dh);
    switch ($trangthai) {
      case 0:
          $tt = "Chờ Xác Nhận";
          $thanhtb = '<p class="card-text text-danger"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=huydonhang&madh_ct='.$madh_ct.'" class="btn btn-danger "><p class="card-text"><strong>Hủy đơn hàng</strong></p></a>';
          break;
      case 1:
          $tt = "Đang Chuẩn Bị Hàng";
          $thanhtb = '<p class="card-text text-warning"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-danger huy-button disabled" disabled><strong>Hủy đơn hàng</strong></a>';
          break;
      case 2:
          $tt = "Đang Giao Hàng";
          $thanhtb = '<p class="card-text text-primary"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=danhandonhang&madh_ct='.$madh_ct.'" class="btn btn-primary "><p class="card-text"><strong>Đã nhận được hàng ?</strong></p></a>';
          break;
      case 3:
          $tt = "Giao Hàng Thành Công";
          $thanhtb = '<p class="card-text text-success "><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-success "><p class="card-text"><strong>Đã nhận được hàng</strong></p></a>';
          break;
      default:
          $tt = "Đơn Hàng Không Xác Định";
          $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          break;
  }
  if ($trangthai === 1) {
    if ($currentOrderId !== $madh_ct) {
      // Tính tổng số lượng sản phẩm trong đơn hàng
      $totalQuantity = array_reduce(
          $dsdh,
          function ($carry, $item) use ($madh_ct) {
              return $carry + ($item['madh_ct'] === $madh_ct ? $item['soluong'] : 0);
          },
          0
      );

      $html_showdh .= '
          <div class="container mt-4">
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">Thông tin đơn hàng</h5>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-3">
                                      <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
                                  </div>
                                  <div class="col-md-9">
                                      <h4 class="card-title"> ' . $name . '</h4>
                                      <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
                                      <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
                                      <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
                                      <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
                                  </div>
                              </div>
                              <!-- Thêm dòng gạch ngăn cách -->
                              <hr class="hr-tt">
                              <div class="tttdh mt-4">
                                  <p class="card-text"><strong>Tổng số lượng sản phẩm trong đơn hàng:</strong> ' . $totalQuantity . '</p>
                                  <p class="card-text"><strong>Tổng tiền thanh toán:</strong> ' . $tongthanhtoan . '</p>
                              </div>
                          </div>
                          <div class="card-footer d-flex justify-content-between">
                              <div>
                                  '.$thanhtb.'
                              </div>
                              <div>
                                  <a href="index.php?cl=chitietdonhang&madh_ct='.$madh_ct.'" class="btn btn-primary">Chi tiết đơn hàng</a>
                                  '.$boxtt.'
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';
  }
    

      // Cập nhật mã đơn hàng chi tiết hiện tại
      $currentOrderId = $madh_ct;
  }
}
return $html_showdh;
}


function show_dhct_client($dsdh) {
  $html_showdh = '';
  $currentOrderId = null;
  foreach ($dsdh as $dh) {
    extract($dh);
    switch ($trangthai) {
      case 0:
          $tt = "Chờ Xác Nhận";
          $thanhtb = '<p class="card-text text-danger"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=huydonhang&madh_ct='.$madh_ct.'" class="btn btn-danger "><p class="card-text"><strong>Hủy đơn hàng</strong></p></a>';
          break;
      case 1:
          $tt = "Đang Chuẩn Bị Hàng";
          $thanhtb = '<p class="card-text text-warning"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-danger huy-button disabled" disabled><strong>Hủy đơn hàng</strong></a>';
          break;
      case 2:
          $tt = "Đang Giao Hàng";
          $thanhtb = '<p class="card-text text-primary"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="index.php?cl=danhandonhang&madh_ct='.$madh_ct.'" class="btn btn-primary "><p class="card-text"><strong>Đã nhận được hàng ?</strong></p></a>';
          break;
      case 3:
          $tt = "Giao Hàng Thành Công";
          $thanhtb = '<p class="card-text text-success "><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          $boxtt = '<a href="#" class="btn btn-success "><p class="card-text"><strong>Đã nhận được hàng</strong></p></a>';
          break;
      default:
          $tt = "Đơn Hàng Không Xác Định";
          $boxtt = '<p class="card-text"><strong>Trạng thái đơn hàng:</strong> ' . $tt . '</p>';
          break;
  }
  if ($trangthai === 2) {
    if ($currentOrderId !== $madh_ct) {
      // Tính tổng số lượng sản phẩm trong đơn hàng
      $totalQuantity = array_reduce(
          $dsdh,
          function ($carry, $item) use ($madh_ct) {
              return $carry + ($item['madh_ct'] === $madh_ct ? $item['soluong'] : 0);
          },
          0
      );

      $html_showdh .= '
          <div class="container mt-4">
              <div class="row">
                  <div class="col-md-8 offset-md-2">
                      <div class="card">
                          <div class="card-header">
                              <h5 class="card-title">Thông tin đơn hàng</h5>
                          </div>
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-3">
                                      <img src="' . IMG_PATH_USER . $img . '" alt="Product Image" class="img-fluid">
                                  </div>
                                  <div class="col-md-9">
                                      <h4 class="card-title"> ' . $name . '</h4>
                                      <p class="card-text"><strong>Size:</strong> ' . $size . '</p>
                                      <p class="card-text"><strong>Giá:</strong> ' . $price . '</p>
                                      <p class="card-text"><strong>Số lượng:</strong> ' . $soluong . '</p>
                                      <p class="card-text"><strong>Tổng cộng:</strong> ' . $tonggia . '</p>
                                  </div>
                              </div>
                              <!-- Thêm dòng gạch ngăn cách -->
                              <hr class="hr-tt">
                              <div class="tttdh mt-4">
                                  <p class="card-text"><strong>Tổng số lượng sản phẩm trong đơn hàng:</strong> ' . $totalQuantity . '</p>
                                  <p class="card-text"><strong>Tổng tiền thanh toán:</strong> ' . $tongthanhtoan . '</p>
                              </div>
                          </div>
                          <div class="card-footer d-flex justify-content-between">
                              <div>
                                  '.$thanhtb.'
                              </div>
                              <div>
                                  <a href="index.php?cl=chitietdonhang&madh_ct='.$madh_ct.'" class="btn btn-primary">Chi tiết đơn hàng</a>
                                  '.$boxtt.'
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>';
  }
    

      // Cập nhật mã đơn hàng chi tiết hiện tại
      $currentOrderId = $madh_ct;
  }
}
return $html_showdh;
}

function show_dhct_admin($dssp){
  $html_dssp ='';
  $ttxn ='';
  $xoa ='';
  $i= 1;
  foreach ($dssp as $sp) {
   extract($sp);
   if($pttt==0){
    $pt = "Nhận Hàng Trả Tiền";
   }else if($pttt==1){
    $pt = "Thanh Toán Online";
   }
   switch($trangthai){
   case 0:
    $tr = 1;
       $tt = "Chờ Xác Nhận";
       $ttxn.= '<a href="index.php?ad=xacnhandhct&id='.$id_ct.'&tt='.$tr.'" class="btn btn-info ">
       <i class="fa-solid "></i>Xác Nhận Đợn Hàng</a> ';
       $xoa.= '<a href="index.php?ad=deletedhct&id='.$id_ct.'" class="btn btn-danger">
       <i class="fa-solid "></i>Xóa</a>';
    break;
    case 1:
      $tt = "Đang Chuẩn Bị Hàng";
      $tr = 2;
      $ttxn.= '<a href="index.php?ad=xacnhandhct&id='.$id_ct.'&tt='.$tr.'" class="btn btn-info ">
      <i class="fa-solid "></i>Giao Hàng Cho ship</a> ';
      $xoa.= '<a href="index.php?ad=deletedhct&id='.$id_ct.'" class="btn btn-danger">
      <i class="fa-solid "></i>Xóa</a>';
      break;
      case 2:
        $tt = "Đang Giao Hàng";
        $ttxn.= '';
        break;
        case 3:
          $tt = "Giao Hàng Thanh Công";
          break;

    default:
       $tt = "Đơn Hàng Không Xác Định";
    break;
   }

   $html_dssp.='<div class="box25 mr15">
   <tr>
   <td>'.$i++.'</td>
   <td>'.$madh.'</td>
   <td>'.$nguoidat_ten.'</td>
   <td>'.$nguoidat_tell.'</td>
   <td>'.$nguoidat_diachi	.'</td>
   <td>'.$total.'</td>
   <td>'.$voucher.'</td>
   <td>'.$tongthanhtoan.'</td>
   <td>'.$pt.'</td>
   <td>'.$tt.'</td>
   <td>
    '.$xoa.'
   <a href="index.php?ad=xemchitetdh&id='.$id_ct.'" class="btn btn-success">
   <i class="fa-solid "></i>Xem Chi Tiết</a>
 </td>
 <td>
 '.$ttxn.'
 </td>
 </tr>';
 $ttxn = '';
 $xoa ='';
  }
  return $html_dssp;
}

function donhang_delete($id){
  $sql = "DELETE FROM donhang WHERE id_dh=?";
      pdo_execute($sql, $id);
  
}

function donhangct_delete($id){
    $sql = "DELETE FROM donhangchitiet WHERE id_ct=?";
    pdo_execute($sql,$id);

}

function xacnhandh($mdh){
  $sql = " UPDATE donhangchitiet SET trangthai = 3 WHERE  id_ct=?";
      pdo_execute($sql,$mdh);
  
}

function donhangct_xacnhan($tt,$id){
  $sql = " UPDATE donhangchitiet SET trangthai =? WHERE  id_ct=?";
      pdo_execute($sql,$tt,$id);
}
?>