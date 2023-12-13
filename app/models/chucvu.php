<?php
    function select_all_role() {
        $sql = "SELECT * FROM `role`";
        return pdo_query($sql);
    }

    function showds_role_admin($role) {
        $html_dsrole = '';
        foreach($role as $dsrole) {
            extract($dsrole);
            $html_dsrole.='<option value="'.$id_role.'" >'.$chuc_vu.'</option>';
        }
        return $html_dsrole;
    }

    function update_chucvu_admin($chuc_vu, $mota, $id_role){
        $sql = "UPDATE `role` SET chuc_vu=?, mota=? WHERE id_role=?";
        pdo_execute($sql, $chuc_vu, $mota, $id_role);
    }

    function select_chucvu_admin_by_id($id_role){
        $sql = "SELECT * FROM `role` WHERE id_role=?";
        return pdo_query_one($sql, $id_role);
    }

    function insert_chucvu_admin($chuc_vu, $mota){
        $sql = "INSERT INTO `role`(chuc_vu, mota) VALUES(?,?)";
        pdo_execute($sql, $chuc_vu, $mota);
    }

    function delete_chucvu_admin($id_role){
        $sql = "DELETE FROM `role` WHERE id_role = ?";
        pdo_execute($sql, $id_role);
    }

    function show_role_admin($dsrole){
        $html_show_role='';
        $xd = "'Bạn có muốn xóa sản phẩm này không?'";  
        foreach ($dsrole as $role) {
            extract($role);
            $html_show_role.='<tr>
                                <td>'.$id_role.'</td>
                                <td>'.$chuc_vu.'</td>
                                <td>'.$mota.'</td>
                                <td>
                                <a href="index.php?ad=updaterole&id='.$id_role.'" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a onclick="return confirm('.$xd.')" href="index.php?ad=deleterole&id='.$id_role.'" class="btn btn-danger">
                                <i class="fa-solid "></i> Xóa</a>
                                </td>   
                              </tr>
                              ';
        }
        return $html_show_role;
  }
?>