<?php
function select_banner_admin(){
    $sql = "SELECT * FROM banner";
    return pdo_query($sql);
}

function delete_banner_admin($id_baner) {
    $sql = "DELETE FROM `banner` WHERE id_baner = ?";
    pdo_execute($sql, $id_baner);
}

function update_banner_admin( $name, $link, $img,$id ){
    $sql = "UPDATE banner SET name=?, link=?, img=? WHERE id_baner=?";
    pdo_execute($sql, $name, $link, $img,$id );
}

function select_banner_by_id_admin($id){
    $sql = "SELECT * FROM banner WHERE id_baner=?";
    return pdo_query_one($sql, $id);
}

function     insert_banner_admin($name, $link, $img) {
    $sql = "INSERT INTO banner(name, link, img) VALUES(?,?,?)";
    pdo_execute($sql, $name, $link, $img);
}

function showds_banner_admin($dsbanner){
    $html_dsbanner ='';
    foreach ($dsbanner as $banner) {
        extract($banner);
        $html_dsbanner .= '<tr>
                            <td>'.$id_baner.'</td>
                            <td>'.$name.'</td>
                            <td>'.$img.'</td>
                            <td>'.$link.'</td>
                            <td>
                                <a href="index.php?ad=updatebanner&id='.$id_baner.'" class="btn btn-warning">
                                    <i class="fa-solid fa-pen-to-square"></i> Sửa
                                </a>
                                <a href="index.php?ad=deletebanner&id='.$id_baner.'" class="btn btn-danger">
                                    <i class="fa-solid "></i> Xóa
                                </a>
                            </td>
                        </tr>';
    }
    return $html_dsbanner;
}
?>