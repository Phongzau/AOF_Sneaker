<?php
require_once 'pdo.php';

// function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $so_luot_xem, $ngay_nhap, $mo_ta){
//     $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, so_luot_xem, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?,?)";
//     pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet==1, $so_luot_xem, $ngay_nhap, $mo_ta);
// }



// function hang_hoa_delete($ma_hh){
//     $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
//     if(is_array($ma_hh)){
//         foreach ($ma_hh as $ma) {
//             pdo_execute($sql, $ma);
//         }
//     }
//     else{
//         pdo_execute($sql, $ma_hh);
//     }
// }

// function get_dssp_new($limi){
//     $sql = "SELECT * FROM sanpham ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }


// function get_dssp_lienquan($iddm,$id,$limi){
//     $sql = "SELECT * FROM sanpham  WHERE iddm=? AND id<>? ORDER BY view DESC limit ".$limi;
//     return pdo_query($sql,$iddm,$id);
// }

// function get_dssp_best($limi){
//     $sql = "SELECT * FROM sanpham WHERE bestseller=1 ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
// function get_dssp_view($limi){
//     $sql = "SELECT * FROM sanpham ORDER BY view DESC limit ".$limi;
//     return pdo_query($sql);
// }

// function get_dssp($kyw,$iddm,$limi){
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($iddm>0){
//         $sql .=" AND iddm=".$iddm;
//     }
//     if($kyw!=""){
//         $sql .=" AND name like '%".$kyw."%'";
    
//     }
//     $sql .= " ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }


// function get_sp__by_id($id){
//     $sql = "SELECT * FROM sanpham WHERE id=?";
//     return pdo_query_one($sql, $id);
// }

function  locsp_min_max($min,$max){
    $sql = "SELECT * FROM sanpham WHERE price BETWEEN ? AND ?";
    return pdo_query($sql,$min,$max);
}

function select_sp_all(){
    $sql = "SELECT * from sanpham  INNER JOIN danhmuc 
    on sanpham.iddm = danhmuc.id_dm";
    return pdo_query($sql);
}

function select_sp_iddm($id){
    $sql = "SELECT * from sanpham where iddm = ? ";
    return pdo_query($sql,$id);
}

function insert_hinhanh_admin($img, $id_sanpham) {
    $sql = "INSERT INTO hinhanhsanpham(img, id_sanpham) VALUES (?,?)";
    pdo_execute($sql, $img, $id_sanpham);
}

function select_sp_all_cl(){
    $sql = "SELECT * FROM sanpham LIMIT 8";
    return pdo_query($sql);
}

function  get_sanpham_by_id_admin($id){
    $sql = "SELECT * from sanpham  INNER JOIN danhmuc 
    on sanpham.iddm = danhmuc.id_dm  WHERE id_sp=?";
      return pdo_query_one($sql,$id);
}

function  get_sanpham_by_id($id){
    $sql = "SELECT * from sanpham WHERE id_sp=?";
      return pdo_query_one($sql,$id);
}

function showds_danhmuc_admin($dm) {
    $html_dsrole = '';
    foreach($dm as $dsdm) {
        extract($dsdm);
        $html_dsrole.='<option  value="'.$id_dm.'" >'.$tendm.'</option>';
    }
    return $html_dsrole;
}

function sanpham_update($id_sp, $name, $price, $mota, $img, $iddm ){
    $sql = "UPDATE sanpham SET id_sp=?,name=?,price=?,mota=?,img=?,iddm=? WHERE id_sp=$id_sp";
    pdo_execute($sql,$id_sp, $name, $price, $mota, $img,$iddm);
}

// function get_dssp($kyw,$iddm,$limi){
//     $sql = "SELECT * FROM sanpham WHERE 1";
//     if($iddm>0){
//         $sql .=" AND iddm=".$iddm;
//     }
//     if($kyw!=""){
//         $sql .=" AND name like '%".$kyw."%'";
    
//     }
//     $sql .= " ORDER BY id DESC limit ".$limi;
//     return pdo_query($sql);
// }
function get_name_dm($id){
    $sql = "SELECT tendm from danhmuc where id_dm=?";
    return  pdo_query_value($sql,$id);
}

function get_dssp($kyw,$iddm){
    $sql = "SELECT * FROM sanpham WHERE 1";
    if($iddm>0){
        $sql .=" AND iddm=".$iddm;
    }
    if($kyw!=""){
        $sql .=" AND name like '%".$kyw."%'";
    
    }
    $sql .= " ORDER BY id_sp DESC ";
    return pdo_query($sql);
}

//admin
function show_sp_admin($dssp){
    $html_dssp ='';
    foreach ($dssp as $sp) {
     extract($sp);
     if($tinhtrang==0){
        $tc = 'Còn Hàng';
     }else{
        $tc = 'Hết Hàng';
     }
     $html_dssp.='<div class="box25 mr15">
     <tr>
     <td>'.$id_sp.'</td>
     <td>'.$name.'</td>
     <td><img src="'.IMG_PATH_ADMIN.$img.'" style="width:30%" alt="Ảnh sản phẩm"></td>
     <td>'.$price.'VND</td>
     <td>'.$view.'</td>
     <td>'.$mota.'</td>
     <td>'.$tendm.'</td>
     <td>'.$tc.'</td>
     <td>
     <a href="index.php?ad=thembienthe&id='.$id_sp.'" class="btn btn-success">
     <i class="fa-solid fa-pen-to-square"></i>Thêm biến thể</a>
     <a href="index.php?ad=xembienthe&id='.$id_sp.'" class="btn btn-info">
     <i class="fa-solid fa-pen-to-square"></i>Xem biến thể</a> 
     </td> 
     <td>
     <a href="index.php?ad=themhinhanhsp&id='.$id_sp.'" class="btn btn-success">
     <i class="fa-solid fa-pen-to-square"></i>Thêm Hình ảnh SP</a>
     <a href="index.php?ad=xemhinhanhsp&id='.$id_sp.'" class="btn btn-info">
     <i class="fa-solid fa-pen-to-square"></i>Xem hình ảnh</a>
     </td>
     <td>
     <a href="index.php?ad=suasp&id='.$id_sp.'" class="btn btn-warning">
     <i class="fa-solid fa-pen-to-square"></i>Sửa</a>
     <a href="index.php?ad=deletesp&id='.$id_sp.'" class="btn btn-danger">
     <i class="fa-solid "></i>Xóa</a>
     </td>
   </tr>
   ';
    }
    return $html_dssp;
}

function showha_sp($hasp) {
    $html_showhasp = '';
    foreach ($hasp as $hinhanh) {
        extract($hinhanh);
        $html_showhasp.= '<div style="background-image: url('.IMG_PATH_USER.$img.');" class="item"></div>';
    } return $html_showhasp;
}

function showha_sp_itembox($hasp) {
    $html_showhaspitembox = '';
    foreach ($hasp as $hinhanh) {
        extract($hinhanh);
        $html_showhaspitembox.= '<div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>';
    } return $html_showhaspitembox;
}

                                        

function select_hasp_client($id) {
    $sql = "SELECT * FROM hinhanhsanpham WHERE id_sanpham=?";
    return pdo_query($sql, $id);
}

function sp_delete($id){
    $sql = "DELETE FROM sanpham WHERE  id_sp=?";
        pdo_execute($sql, $id);
    
}

function insert_sanpham_admin( $name, $price, $mota, $img, $iddm){
    $sql = "INSERT INTO sanpham (name, price, mota, img, iddm) VALUES (?,?,?,?,?)";
    pdo_execute($sql,  $name, $price, $mota, $img, $iddm);
}

function select_sanpham_by_id_client($id_sp) {
    $sql = "SELECT * FROM sanpham WHERE id_sp=?";
    return pdo_query_one($sql, $id_sp);
}

function sanpham_update_view($id){
    $sql = "UPDATE sanpham SET view = view +1 WHERE id_sp=?";
    pdo_execute($sql,$id);
}

function showsp_one_hot($dssp) {
    $html_showsponehot = '';
    foreach ($dssp as $sp) {
        extract($sp);
        $link = "index.php?cl=sanphamchitiet&idpro=".$id_sp;
        $html_showsponehot = '<div class="featured lazy" data-bg="url('.IMG_PATH_USER.$img.')">
                            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                                <div class="container margin_60">
                                    <div class="row justify-content-center justify-content-md-start">
                                        <div class="col-lg-6 wow" data-wow-offset="150">
                                            <h3>'.$name.'</h3>
                                            <p>'.$mota.'</p>
                                            <div class="feat_text_block">
                                                <div class="price_box">
                                                    <span class="new_price">$'.$price.'</span>
                                                </div>
                                                <a class="btn_1" href="'.$link.'" role="button">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>';
    }
    return $html_showsponehot;
}



function showsp_featured($dssp) {
    $html_showspfeatured = '';
    foreach ($dssp as $sp) {
        extract($sp);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $link = "index.php?cl=sanphamchitiet&idpro=".$id_sp;
        $html_showspfeatured.= '<div class="item">
                            <div class="grid_item">
                                <span class="ribbon new">New</span>
                                <figure>
                                    <a href="'.$link.'">
                                        <img class="owl-lazy" src="'.IMG_PATH_USER.$img.'" data-src="'.IMG_PATH_USER.$img.'" alt="">
                                    </a>
                                </figure>
                                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                                <a href="'.IMG_PATH_USER.$img.'">
                                    <h3>'.$name.'</h3>
                                </a>
                                <div class="price_box">
                                    <span class="new_price">'.$price.'$</span>
                                </div>
                                <ul>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                    <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                </ul>
                            </div>
                        </div>';
    }
    return $html_showspfeatured;
}


function showsp($dssp) {
    $html_showsp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        // if ($bestseller == 1) {
        //     $best = '<div class="best"></div>';
        // } else {
        //     $best = '';
        // }
        $link = "index.php?cl=sanphamchitiet&idpro=".$id_sp;
        $html_showsp.= '<div class="col-6 col-md-4 col-xl-3">
                        <div class="grid_item">
                            <figure>
                                <span class="ribbon off">-30%</span>
                                <a href="'.$link.'">
                                    <img class="img-fluid lazy" src="'.IMG_PATH_USER.$img.'" data-src="'.IMG_PATH_USER.$img.'" alt="">
                                    <img class="img-fluid lazy" src="'.IMG_PATH_USER.$img.'" data-src="'.IMG_PATH_USER.$img.'" alt="">
                                </a>
                            </figure>
                            <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                            <a href="'.$link.'">
                                <h3>'.$name.'</h3>
                            </a>
                            <div class="price_box">
                                <span class="new_price">'.$price.'$</span>
                            </div>
                            <ul>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                            </ul>
                        </div>
                        <!-- /grid_item -->
                     </div>';
    }
    return $html_showsp;
}

function select_sp_client(){
    $sql = "SELECT * from sanpham ORDER BY id_sp DESC limit 4";
    return pdo_query($sql);
}


function select_sp_one_hot(){
    $sql = "SELECT * from sanpham  ORDER BY view DESC limit 1";
    return pdo_query($sql);
}
function select_sp_hot(){
    $sql = "SELECT * from sanpham ORDER BY view DESC limit 4";
    return pdo_query($sql);
}

function show_spchitiet($spchitiet) {
    $html_showctsp = '';
        extract($spchitiet);
        $html_showctsp.= ' <div class="container margin_30">
                            <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="all">
                                        <div class="slider">
                                            <div class="owl-carousel owl-theme main">
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item-box"></div>
                                            </div>
                                            <div class="left nonl"><i class="ti-angle-left"></i></div>
                                            <div class="right"><i class="ti-angle-right"></i></div>
                                        </div>
                                        <div class="slider-two">
                                            <div class="owl-carousel owl-theme thumbs">
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item active"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item"></div>
                                                <div style="background-image: url('.IMG_PATH_USER.$img.');" class="item"></div>
                                            </div>
                                            <div class="left-t nonl-t"></div>
                                            <div class="right-t"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Category</a></li>
                                            <li>Page active</li>
                                        </ul>
                                    </div>
                                    <!-- /page_header -->
                                    <div class="prod_info">
                                        <h1><?=$name?></h1>
                                        <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                                        <p><small>SKU: '.$id_sp.'</small><br>'.$mota.'</p>
                                        <div class="prod_options">
                                            <div class="row">
                                                <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
                                                <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                                <div class="custom-select-form">
                                                    <select class="wide">
                                                    <option value="" selected>Small (S)</option>
                                                    <option value="">M</option>
                                                    <option value="">L</option>
                                                    <option value="">XL</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                                    <div class="custom-select-form">    
                                                    <select name="iddm" class="wide">
                                                            <option value="1" selected>Small (S)</option>
                                                            <option value="1">M</option>
                                                            <option value="3">L</option>
                                                            <option value="">XL</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                                    <div class="numbers-row">
                                                        <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5 col-md-6">
                                                <div class="price_main"><span class="new_price">$'.$price.'</span></div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /prod_info -->
                                    <div class="product_actions">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- /product_actions -->
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /container -->
                        
                        <div class="tabs_product">
                            <div class="container">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab" role="tab">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /tabs_product -->
                        <div class="tab_content_wrapper">
                            <div class="container">
                                <div class="tab-content" role="tablist">
                                    <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                                        <div class="card-header" role="tab" id="heading-A">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                                    Description
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                                            <div class="card-body">
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-6">
                                                        <h3>Details</h3>
                                                        <p>Lorem ipsum dolor sit amet, in eleifend <strong>inimicus elaboraret</strong> his, harum efficiendi mel ne. Sale percipit vituperata ex mel, sea ne essent aeterno sanctus, nam ea laoreet civibus electram. Ea vis eius explicari. Quot iuvaret ad has.</p>
                                                        <p>Vis ei ipsum conclusionemque. Te enim suscipit recusabo mea, ne vis mazim aliquando, everti insolens at sit. Cu vel modo unum quaestio, in vide dicta has. Ut his laudem explicari adversarium, nisl <strong>laboramus hendrerit</strong> te his, alia lobortis vis ea.</p>
                                                        <p>Perfecto eleifend sea no, cu audire voluptatibus eam. An alii praesent sit, nobis numquam principes ea eos, cu autem constituto suscipiantur eam. Ex graeci elaboraret pro. Mei te omnis tantas, nobis viderer vivendo ex has.</p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <h3>Specifications</h3>
                                                        <div class="table-responsive">
                                                            <table class="table table-sm table-striped">
                                                                <tbody>
                                                                    <tr>
                                                                        <td><strong>Color</strong></td>
                                                                        <td>Blue, Purple</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Size</strong></td>
                                                                        <td>150x100x100</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Weight</strong></td>
                                                                        <td>0.6kg</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>Manifacturer</strong></td>
                                                                        <td>Manifacturer</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- /table-responsive -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /TAB A -->
                                    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                                        <div class="card-header" role="tab" id="heading-B">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                                    Reviews
                                                </a>
                                            </h5>
                                        </div>
                                        <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                                            <div class="card-body">
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-6">
                                                        <div class="review_content">
                                                            <div class="clearfix add_bottom_10">
                                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                                                <em>Published 54 minutes ago</em>
                                                            </div>
                                                            <h4>"Commpletely satisfied"</h4>
                                                            <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="review_content">
                                                            <div class="clearfix add_bottom_10">
                                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><i class="icon-star empty"></i><em>4.0/5.0</em></span>
                                                                <em>Published 1 day ago</em>
                                                            </div>
                                                            <h4>"Always the best"</h4>
                                                            <p>Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <div class="row justify-content-between">
                                                    <div class="col-lg-6">
                                                        <div class="review_content">
                                                            <div class="clearfix add_bottom_10">
                                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star empty"></i><em>4.5/5.0</em></span>
                                                                <em>Published 3 days ago</em>
                                                            </div>
                                                            <h4>"Outstanding"</h4>
                                                            <p>Eos tollit ancillae ea, lorem consulatu qui ne, eu eros eirmod scaevola sea. Et nec tantas accusamus salutatus, sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="review_content">
                                                            <div class="clearfix add_bottom_10">
                                                                <span class="rating"><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><em>5.0/5.0</em></span>
                                                                <em>Published 4 days ago</em>
                                                            </div>
                                                            <h4>"Excellent"</h4>
                                                            <p>Sit commodo veritus te, erat legere fabulas has ut. Rebum laudem cum ea, ius essent fuisset ut. Viderer petentium cu his.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /row -->
                                                <p class="text-end"><a href="leave-review.html" class="btn_1">Leave a review</a></p>
                                            </div>
                                            <!-- /card-body -->
                                        </div>
                                    </div>
                                    <!-- /tab B -->
                                </div>
                                <!-- /tab-content -->
                            </div>
                            <!-- /container -->
                        </div>
                        <!-- /tab_content_wrapper -->
                    ';
        return $html_showctsp;
    }

    function select_hasp_admin($id){
        $sql = "SELECT * FROM `hinhanhsanpham` WHERE id_sanpham = ?";        
        return pdo_query($sql, $id);
    }

    function hinhanh_update($img, $id_ha){
        $sql = "UPDATE hinhanhsanpham SET img=? WHERE id_ha=?";
        pdo_execute($sql,$img, $id_ha);
    }
    function get_old_image_hasp($id_ha) {
        $sql = "SELECT * FROM hinhanhsanpham WHERE id_ha=?";
        $result = pdo_query_one($sql, $id_ha);
        return $result['img'];
    }

    function select_hacs_by_id_admin($id){
        $sql = "SELECT * FROM hinhanhsanpham WHERE id_ha=?";
        return pdo_query_one($sql, $id);
    }

    function hasp_delete($id){
        $sql = "DELETE FROM hinhanhsanpham WHERE  id_ha=?";
        pdo_execute($sql, $id);
    }    

    function show_hasp_admin($dsha){
        $html_showhasp ='';
        foreach ($dsha as $ha) {
         extract($ha);
         $html_showhasp.='<div class="box25 mr15">
                            <tr>
                            <td>'.$id_ha.'</td>
                            <td>'.$id_sanpham.'</td>
                            <td><img width=20% src="'.IMG_PATH_ADMIN.$img.'"></td>
                            <td>
                            <a href="index.php?ad=suahasp&id='.$id_ha.'&idsp='.$id_sanpham.'" class="btn btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>Sửa</a>
                            <a href="index.php?ad=deletehasp&id='.$id_ha.'&idsp='.$id_sanpham.'" class="btn btn-danger">
                            <i class="fa-solid "></i>Xóa</a>
                            </td>
                        </tr>
                        <tr>';
        }
        return $html_showhasp;
    }

    function get_dssp_lienquan($iddm,$id){
        $sql = "SELECT * FROM `sanpham` WHERE iddm=? AND id_sp<>?";
        return pdo_query($sql,$iddm,$id);
    }

    function showsp_lienquan($splienquan) {
        $html_showsplq = '';
        foreach($splienquan as $splq) {
            extract($splq);
            $link = "index.php?cl=sanphamchitiet&idpro=".$id_sp;
            $html_showsplq.='<div class="item">
                                    <div class="grid_item">
                                        <span class="ribbon new">New</span>
                                        <figure>
                                            <a href="'.$link.'">
                                                <img class="owl-lazy" src="public/client/img/products/product_placeholder_square_medium.jpg" data-src="'.IMG_PATH_USER.$img.'" alt="">
                                            </a>
                                        </figure>
                                        <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                                        <a href="'.$link.'">
                                            <h3>'.$name.'</h3>
                                        </a>
                                        <div class="price_box">
                                            <span class="new_price">'.$price.'</span>
                                        </div>
                                        <ul>
                                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                                        </ul>
                                    </div>
                                    <!-- /grid_item -->
                                </div>
                            <!-- /products_carousel -->	';
        } return $html_showsplq;
    }

// function hang_hoa_exist($ma_hh){
//     $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
//     return pdo_query_value($sql, $ma_hh) > 0;
// }

// function hang_hoa_tang_so_luot_xem($ma_hh){
//     $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
//     pdo_execute($sql, $ma_hh);
// }

// function hang_hoa_select_top10(){
//     $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
//     return pdo_query($sql);
// }

// function hang_hoa_select_dac_biet(){
//     $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
//     return pdo_query($sql);
// }

// function hang_hoa_select_by_loai($ma_loai){
//     $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
//     return pdo_query($sql, $ma_loai);
// }

// function hang_hoa_select_keyword($keyword){
//     $sql = "SELECT * FROM hang_hoa hh "
//             . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//             . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
//     return pdo_query($sql, '%'.$keyword.'%', '%'.$keyword.'%');
// }

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }