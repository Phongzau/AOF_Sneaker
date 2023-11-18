<?php
    function select_baiviet_admin() {
        $sql = "SELECT * FROM baiviet";
        return pdo_query($sql);
    }

    function update_baiviet_admin($noidung, $img, $id_baiviet) {
        $sql = "UPDATE  baiviet SET noidung=?,img=? WHERE id_baiviet=?";
        pdo_execute($sql, $noidung, $img, $id_baiviet);
    }

    function get_old_image_baiviet($id_baiviet) {
        $sql = "SELECT * FROM baiviet WHERE id_baiviet=?";
        $result = pdo_query_one($sql, $id_baiviet);
        return $result['img'];
    }


    function select_baiviet_by_id_admin($id_baiviet) {
        $sql = "SELECT * FROM baiviet WHERE id_baiviet=?";
        return pdo_query_one($sql, $id_baiviet);
    }

    function delete_baiviet_admin($id_baiviet) {
        $sql = "DELETE FROM baiviet  WHERE id_baiviet=?";
        pdo_execute($sql, $id_baiviet);
    }

    function showds_baiviet_admin($dsbaiviet) {
        $html_dsbaiviet = '';
        foreach ($dsbaiviet as $bv) {
            extract($bv);
            $html_dsbaiviet.='<tr>
                                <td>'.$id_baiviet.'</td>
                                <td>'.$noidung.'</td>
                                <td><img src="'.IMG_PATH_ADMIN.$img.'" style="width:30%"></td>
                                <td>
                                <a href="index.php?ad=updatebv&id='.$id_baiviet.'" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i> Sửa</a>
                                <a href="index.php?ad=deletebv&id='.$id_baiviet.'" class="btn btn-danger">
                                <i class="fa-solid "></i> Xóa</a>
                                </td>
                               </tr>';
    
        }
        return $html_dsbaiviet;
    }
    
    function insert_baiviet_admin($noidung, $img) {
        $sql = "INSERT INTO baiviet(noidung,img) VALUES (?,?)"; 
        pdo_execute($sql,$noidung, $img);
    }
?>