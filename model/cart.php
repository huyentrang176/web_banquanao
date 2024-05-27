<?php
function tongdonhang()
{
    $tong = 0;
    $thanhtien = 0;
    foreach ($_SESSION['mycart'] as $checkout) {
        extract($checkout);
        $tong = $checkout[3] * $checkout[5];
        $thanhtien += $tong;
    }
    return $thanhtien;
}


function insert_bill($user_id, $name, $email, $address, $phone, $pttt, $tongdonhang)
{
    $sql = "INSERT INTO bill(user_id, bill_name, bill_address, bill_tel, bill_email, bill_pttt, ngaydathang, total) 
            VALUES('$user_id', '$name', '$address', '$phone', '$email', '$pttt', CURRENT_TIMESTAMP, '$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}


function insert_cart($user_id, $product_id, $img, $name, $size, $price, $soluong, $thanhtien, $bill_id)
{
    $sql = "INSERT INTO carts(user_id,product_id,img,name,size,price,soluong,thanhtien,bill_id) 
    VALUES('$user_id','$product_id','$img','$name','$size','$price','$soluong','$thanhtien','$bill_id')";
    return pdo_execute($sql);
}

function loadone_bill($bill_id)
{
    $sql = "SELECT * FROM bill WHERE bill_id = '$bill_id'";
    $result = pdo_query_one($sql);
    return $result;
}
function loadall_cart($bill_id)
{
    $sql = "SELECT * FROM carts WHERE bill_id = '$bill_id'";
    $result = pdo_query($sql);
    return $result;
}

//dành cho trang đơn hàng của tôi
function loadall_cart_count($bill_id)
{
    $sql = "SELECT * FROM carts WHERE bill_id = '$bill_id'";
    $result = pdo_query($sql);
    return sizeof($result);
}

// function loadall_bill($user_id){
//     $sql = "SELECT * FROM  bill WHERE user_id='$user_id'";
//     $result = pdo_query($sql);
//     return $result;
// }
function loadall_bill($user_id)
{
    $sql = "SELECT * FROM  bill WHERE user_id='$user_id' ORDER BY bill_id DESC";
    $result = pdo_query($sql);
    return $result;
}

function bill_detail($id)
{
    $sql = "SELECT * FROM  carts WHERE bill_id='$id'";
    $result = pdo_query($sql);
    return $result;
}
function bill_ct($user_id)
{
    $sql = "SELECT * FROM  bill WHERE user_id='$user_id'";
    $result = pdo_query($sql);
    return $result;
}
//dành cho loát bill bên admin
function loadall_bill1()
{
    $sql = "SELECT * FROM bill WHERE 1 order by bill_id desc";
    $result = pdo_query($sql);
    return $result;
}
function update_giohang($trangthai, $id)
{
    $sql = "UPDATE `bill` SET `bill_status`='$trangthai' WHERE `bill_id`='$id'";
    pdo_execute($sql);
}

function get_ttdh($n)
{
    switch ($n) {
        case '0':
            $tt = "Chờ xác nhận";
            break;
        case '1':
            $tt = "Đã xác nhận";
            break;
        case '2':
            $tt = "Đang giao hàng";
            break;
        case '3':
            $tt = "Đã giao hàng";
            break;
        case '4':
            $tt = "Đã hủy";
            break;
        case '5':
            $tt = "Hoàn thành đơn";
            break;
        default:
            $tt = "Chờ xác nhận";
    }
    return $tt;
}

function update_donhang($trangthai, $id)
{
    $sql = "UPDATE `bill` SET `bill_status`='$trangthai' WHERE `bill_id`='$id'";
    pdo_execute($sql);
}
function loadall_billAdmin()
{
    $sql = "SELECT * FROM  bill ORDER BY bill_id DESC";
    $result = pdo_query($sql);
    return $result;
}
