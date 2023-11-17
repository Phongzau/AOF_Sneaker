<?php
// require_once 'pdo.php';

// function user_insert($username, $password, $email){
//      $sql = "INSERT INTO user(username, password, email) VALUES (?, ?, ?)"; 
//     pdo_execute($sql, $username, $password, $email);
// }


// function user_insert_id($username,$password,$ten, $diachi, $email, $dienthoai){
//   $sql = "INSERT INTO user(ten,username,password,diachi,email,dienthoai) VALUES (?,?,?,?,?,?)"; 
//  return  pdo_execute_id($sql,$username,$password,$ten, $diachi, $email, $dienthoai);
// }

function select_user_all() {
  $sql = "SELECT * from `user` INNER JOIN `role` ON user.idrole = role.id_role ORDER BY id_user ASC";
  return pdo_query($sql);
}

function user_new() {
  $sql = "SELECT * from user order by id DESC";
  return pdo_query($sql);
}

// function user_all() {
//   $sql = "SELECT * from user order by id asc";
//   return pdo_query($sql);
// }
// function user_new() {
//   $sql = "SELECT * from user order by id DESC";
//   return pdo_query($sql);
// }



// function  checkuser($username,$password){
// $sql = "SELECT * from user WHERE username=? and password=?";
//   return pdo_query_one($sql,$username,$password);
  
// //   if(is_array($kq)&&(count($kq))){
// //   return $kq['id']; 
// //   }else{
// //     return 0;
// //   }
// }
// function checkusername($username){
//   $sql = "SELECT * from user WHERE username=?";
//   return pdo_query_one($sql,$username);
// }
// function checkuseremail($email){
//   $sql = "SELECT * from user WHERE email=?";
//   return pdo_query_one($sql,$email);
// }
// function  user_update($username,$password,$email,$diachi,$dienthoai,$role,$id){
//     $sql = "UPDATE  user SET username=?,password=?,email=?,diachi=?,dienthoai=?,role=? WHERE id=?";
//     pdo_execute($sql, $username,$password,$email,$diachi,$dienthoai,$role,$id);
// }


// function  get_user($id){
//     $sql = "SELECT * from user WHERE id=?";
//       return pdo_query_one($sql,$id);
//     }


//     // admin 

//     function showdm_admin_user($dsdm){
//       $html_dm='';
//       $i = 1 ;
//       foreach ($dsdm as $dm) {
//           extract($dm);
//        if($role==0){
//         $quyen="Khách Hàng";
//        }else if($role== 1){
//         $quyen= "Admin";
//        }
//           $html_dm.='<tr>
//           <td>'.$i.'</td>
//           <td>'.$username.'</td>
//           <td>'.$ten.'h</td>
//           <td>'.$diachi.'</td>
//           <td>'.$email.'</td>
//           <th>'.$dienthoai.'</th>
//           <td>'.$quyen.'</td>
//           <td>
//           <a href="admin.php?pg=adminadduser&id='.$id.'" class="btn btn-warning"><i
//           class="fa-solid fa-pen-to-square"></i> Sửa</a>
//       </td>
//       </tr>
//         ';
//         $i++;
//       }
//       return $html_dm;
//   }


function checkusername($username){
  $sql = "SELECT * from user WHERE username=?";
  return pdo_query_one($sql,$username);
}
function checkuseremail($email){
  $sql = "SELECT * from user WHERE email=?";
  return pdo_query_one($sql,$email);
}
function  update_user_admin($username, $password, $user_name, $img, $diachi, $email, $dienthoai, $idrole, $id_user){
    $sql = "UPDATE  user SET username=?,password=?,user_name=?,img=?,diachi=?,email=?, dienthoai=?, idrole=? WHERE id_user=?";
    pdo_execute($sql, $username, $password, $user_name, $img, $diachi, $email, $dienthoai, $idrole, $id_user);
}

function  get_user($id){
    $sql = "SELECT * from `user` INNER JOIN `role` ON user.idrole = role.id_role  WHERE id_user=?";
      return pdo_query_one($sql,$id);
    }
    // admin 
function show_user_admin($us){
      $html_show_user='';
      foreach ($us as $users) {
          extract($users);
          if ($img != "") {
            $print = '<img src="'.IMG_PATH_ADMIN.$img.'" style="width:30%" alt="Ảnh người dùng">';
          } else {
            $img = 'anh_dai_dien_khong_nhap.jpg';
            $print = '<img src="'.IMG_PATH_ADMIN.$img.'" style="width:30%" alt="Ảnh người dùng">';
          }
          $html_show_user.='<tr>
                              <td>'.$id_user.'</td>
                              <td>'.$username.'</td>
                              <td>'.$password.'</td>
                              <td>'.$user_name.'</td>
                              <td>'.$print.'</td>
                              <td>'.$diachi.'</td>
                              <td>'.$email.'</td>
                              <td>'.$dienthoai.'</td>
                              <td>'.$chuc_vu.'</td>
                              <td>
                              <a href="index.php?ad=updateuser&id='.$id_user.'" class="btn btn-warning">
                              <i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                              <a href="index.php?ad=deleteuser&id='.$id_user.'" class="btn btn-danger">
                              <i class="fa-solid "></i> Xóa</a>
                              </td>
                            </tr>
                            ';
      }
      return $html_show_user;
}

function get_old_image_user($id_user) {
        $sql = "SELECT * FROM user WHERE id_user=?";
        $result = pdo_query_one($sql, $id_user);
        return $result['img'];
}



// function user_update_admin($id,$role){
//   $sql = "UPDATE  user SET role=? WHERE id=?";
//   pdo_execute($sql,$role,$id);
// }

// function showdm_user_new($dsdm){
//   $html_dm='';
//   $i=1;
//   foreach ($dsdm as $dm) {
//       extract($dm);
//       $html_dm.='<tr>
//       <td>'.$i.'</td>
//       <td>'.$username.'</td>
//   </tr>
//     ';
//     $i++;
//   }
//   return $html_dm;
// }

function delete_user_admin($id_user){
    $sql = "DELETE FROM user  WHERE id_user=?";
        pdo_execute($sql, $id_user);
}

// function user_select_all(){
//     $sql = "SELECT * FROM  user";
//     return pdo_query($sql);
// }

// function user_select_by_id($id){
//     $sql = "SELECT * FROM  user WHERE id=?";
//     return pdo_query_one($sql, $id);
// }

// function user_exist($ma_kh){
//     $sql = "SELECT count(*) FROM  user WHERE $ma_kh=?";
//     return pdo_query_value($sql, $ma_kh) > 0;
// }

// function user_select_by_role($vai_tro){
//     $sql = "SELECT * FROM  user WHERE vai_tro=?";
//     return pdo_query($sql, $vai_tro);
// }

// function user_change_password($ma_kh, $mat_khau_moi){
//     $sql = "UPDATE  user SET mat_khau=? WHERE ma_kh=?";
//     pdo_execute($sql, $mat_khau_moi, $ma_kh);
// }
?>