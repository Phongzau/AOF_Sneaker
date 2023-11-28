<?php
    function select_lienhe_all(){
        $sql = "SELECT * FROM lienhe";
        return pdo_query($sql);
    }

    function delete_lienhe_admin($id_lh){
        $sql = "DELETE FROM lienhe WHERE id_lh=?";
            pdo_execute($sql, $id_lh);
        
    }
    function insert_lienhe_cl($noidung,$name,$email){
        $sql = "INSERT INTO lienhe ( `noidung`, `name`, `email`) VALUES (?,?,?)";
            pdo_execute($sql, $noidung,$name,$email);
        
    }

    function showds_lienhe_admin($dslienhe) {
        $html_dslienhe = '';
        foreach ($dslienhe as $lienhe) {
            extract($lienhe);
            $html_dslienhe.='<tr>
                             <td>'.$id_lh.'</td>
                             <td>'.$noidung.'</td>
                             <td>'.$email.'</td>
                             <td>'.$name.'</td>
                             <td>
                             <a href="index.php?ad=deletelh&id='.$id_lh.'" class="btn btn-danger">
                             <i class="fa-solid "></i>Xóa</a>
                             </td>
                             </tr>';
        }
        return $html_dslienhe;
    }

?>