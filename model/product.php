<?php
function insert_sanpham($tensp, $giasp, $mota,$filename, $iddm)
{
    $sql = "INSERT INTO `products`(`product_name`, `price`, `description`, `img`, `category_id`) VALUES 
    ('$tensp','$giasp','$mota','$filename','$iddm')";
    pdo_execute($sql);
}
function listAll()
{
    $sql = "SELECT * FROM products";
    $listAll = pdo_query($sql);
    return $listAll;
}
function delete_sanpham($id)
{
    $id = $_GET['product_id'];
    $sql = "DELETE FROM products WHERE product_id = '$id';";
    pdo_execute($sql);
}
function loadone_sanpham($id)
{
    $sql = "SELECT * FROM products WHERE product_id = '$id'";
    $sp = pdo_query_one($sql);
    return $sp;
}
// ham tang luot xem
function tangluotxem($id){
    $sp = loadone_sanpham($id);
    $luotxem = $sp['view']+1;
    $sql =" UPDATE products SET view = '$luotxem' where product_id = $id";
    pdo_execute($sql);
}

function update_sanpham($idsp, $tensp, $giasp, $filename, $mota, $iddm)
{
    $sql = "UPDATE `products` SET `product_name`='$tensp', `price`='$giasp', `description`='$mota', `img`='$filename', `category_id`='$iddm' WHERE `product_id`='$idsp'";
    pdo_execute($sql);
}
function loadsphome($category_id)
{
    $sql = "SELECT * FROM products WHERE category_id = '$category_id';";
    $sp = pdo_query($sql);
    return $sp;
}
function loade_sanpham($kyw="", $iddm=0){
    $sql = "SELECT * FROM products
    where 1";
    if($kyw != ""){
        $sql.= " and product_name like '%".$kyw."%'";
    }
    if($iddm > 0){
        $sql.= " and category_id = '".$iddm."'";
    }
    $sql.=" order by product_id";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loade_tendm($iddm){
    if($iddm>0){
        $sql = "SELECT * FROM categorys WHERE category_id = '$iddm'";
        $dm = pdo_query_one($sql);
        extract($dm);
        return $category_name;
    }else{
        return "";
    }
}
function loadeone_sanphamCungloai($id, $iddm){
    $sql = "SELECT * FROM categorys WHERE category_id=".$iddm." AND  product_id <> ".$id;
    $listsphome = pdo_query($sql);
    return $listsphome;
}



// hàm dành cho sản phẩm cùng loại bên chi tiết
function sanpham_cungloai($id){
    $sp = getone_sanpham($id);
    $iddm = $sp['category_id'];
    $sql = "SELECT * FROM products where category_id=$iddm and product_id <> $id limit 0,10";
    $result = pdo_query($sql);
    return $result;
}

function getone_sanpham($id)
{
    $sql = "SELECT * FROM products WHERE product_id = '$id';";
    $sp = pdo_query_one($sql);
    return $sp;
}
function size_product($product_id){
    $sql = "SELECT * FROM variants WHERE product_id='$product_id'";
    $result = pdo_query($sql);
    return $result;
}
function load_variant($product_id, $size){
    $sql = "SELECT * FROM variants 
    WHERE product_id = '$product_id' 
    AND size_quan = '$size' OR size_ao = '$size' OR size_phukien = '$size'";
    $result= pdo_query_one($sql);
    return $result;
}
?>