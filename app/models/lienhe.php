<?php
    function select_lienhe_all(){
        $sql = "SELECT * FROM lienhe";
        return pdo_query($sql);
    }

    function delete_lienhe_admin($id_lh){
        $sql = "DELETE FROM lienhe WHERE id_lh=?";
            pdo_execute($sql, $id_lh);
        
    }
    function update_lienhe_admin($id_lh){
        $sql = "UPDATE `lienhe` SET `trangthai` = '1' WHERE `lienhe`.`id_lh` = ?";
            pdo_execute($sql, $id_lh);
        
    }
    function insert_lienhe_cl($noidung,$name,$email){
        $sql = "INSERT INTO lienhe ( `noidung`, `name`, `email`) VALUES (?,?,?)";
            pdo_execute($sql, $noidung,$name,$email);
        
    }

    function showds_lienhe_admin($dslienhe) {
        $html_dslienhe = '';
        $xacnhan = "";
        foreach ($dslienhe as $lienhe) {
            extract($lienhe);


            switch ($trangthai) {
                case 0:
                    $tt = "";
                    $xacnhan .='
                    <a href="index.php?ad=capnhatlh&id='.$id_lh.'" class="btn btn-danger">
                    <i class="fa-solid "></i>Xác Nhận Hoàn Thành</a>
                    ';
                    break;
                case 1:
                    $tt = "Đã Hoàn Thành ";
                    $boxtt = '';
                    break;
                default:
                    $tt = "Không Xác Định";
                    $boxtt = '';
                    break;
            }
      
            $html_dslienhe.='<tr>
                             <td>'.$id_lh.'</td>
                             <td>'.$noidung.'</td>
                             <td>'.$email.'</td>
                             <td>'.$name.'</td>
                             <td>'.$tt.'</td>
                             <td> '.$xacnhan.' </td>
                             </tr>';
                             $xacnhan ="";
        }
        return $html_dslienhe;
    }

?>