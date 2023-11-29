<?php
    function select_baiviet_admin() {
        $sql = "SELECT * FROM baiviet";
        return pdo_query($sql);
    }
    function select_baiviet_cl_home() {
        $sql = "SELECT * FROM baiviet ORDER BY id_baiviet DESC limit 4";
        return pdo_query($sql);
    }

    function update_baiviet_admin( $tieude,$noidung, $img, $id_baiviet) {
        $sql = "UPDATE  baiviet SET tieude = ? , noidung= ?,img= ? WHERE id_baiviet= ?";
        pdo_execute($sql, $tieude, $noidung, $img, $id_baiviet);
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

    function select_baiviet_by_id_cl($id) {
        $sql = "SELECT * FROM baiviet WHERE id_baiviet=?";
        return pdo_query_one($sql, $id);
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
                                <td>'.$tieude.'</td>
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

    function showds_baiviet_cl_home($dsbaiviet) {
        $html_dsbaiviet = '';
        foreach ($dsbaiviet as $bv) {
            extract($bv);
            $html_dsbaiviet.='<div class="col-lg-6">
            <a class="box_news" href="index.php">
                <figure>
                    <img src="'.IMG_PATH_USER.$img.'"  alt="" width="400" height="266" class="lazy">
                </figure>
                <h4>'.$tieude.'</h4>
                <p>'.$noidung.'</p>
            </a>
        </div>';
    
        }
        return $html_dsbaiviet;
    }
    function select_baiviet_cl_blog() {
        $sql = "SELECT * FROM baiviet  ORDER BY id_baiviet DESC limit 8";
        return pdo_query($sql);
    }
    function select_baiviet_cl_blog_sb() {
        $sql = "SELECT * FROM baiviet  ORDER BY id_baiviet DESC limit 3";
        return pdo_query($sql);
    }
    function showds_baiviet_cl_blog($dsbaiviet) {
        $html_dsbaiviet = '';
        foreach ($dsbaiviet as $bv) {
            extract($bv);
            $html_dsbaiviet.='
            <div class="col-md-6">
            <article class="blog">
                <figure>
                    <a href="index.php?cl=baivietct&id='.$id_baiviet.'"><img src="'.IMG_PATH_USER.$img.'" alt="">
                    </a>
                </figure>
                <div class="post_info">
                    <h2><a href="index.php?cl=baivietct&id='.$id_baiviet.'">'.$tieude.'</a></h2>
                    <p>'.$noidung.'</p>
                    <ul>
                        <li>
                    </ul>
                </div>
            </article>
            <!-- /article -->
            </div> ';
    
        }
        return $html_dsbaiviet;
    }

    function showds_baiviet_cl_blog_sb($dsbaiviet) {
        $html_dsbaiviet = '';
        foreach ($dsbaiviet as $bv) {
            extract($bv);
            $html_dsbaiviet.='
            <li>
            <div class="alignleft">
                <a href="index.php?cl=baivietct&id='.$id_baiviet.'"><img src="'.IMG_PATH_USER.$img.'" alt=""></a>
            </div>
            <h3><a href="index.php?cl=baivietct&id='.$id_baiviet.'" title="">'.$tieude.'</a></h3>
        </li>';
    
        }
        return $html_dsbaiviet;
    }
    
    
    function insert_baiviet_admin($tieude,$noidung, $img) {
        $sql = "INSERT INTO baiviet(tieude,noidung,img) VALUES (?,?,?)"; 
        pdo_execute($sql,$tieude,$noidung, $img);
    }
?>