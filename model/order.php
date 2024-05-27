<?php
function insert_order($name, $ngaydathang, $total, $payment, $id_user)
{
    $sql = "INSERT INTO orders(`order_name`, `time`,`total`,`payment`,`user_id`) 
        VALUE ('$name','$ngaydathang','$total','$payment', '$id_user')";
    pdo_execute($sql);
}

// function load_cart2($user_id)
// {
//     $sql = "SELECT * FROM cart WHERE users_id='$user_id'";
//     $result = pdo_query($sql);
//     return $result;
// }
//xoa sp trong gio hang
function delete_sanphamcart($cart_id, $users_id){
    $sql = "DELETE FROM cart 
    WHERE cart_id  = '$cart_id' AND users_id = '$users_id'";
    pdo_execute($sql);
}
function loado_orders($name) {
    $sql = "SELECT * FROM orders WHERE order_name = '$name'";
    return pdo_query_one($sql);
}

//xoa sp khi thanh toan
function delete_cartoder($id_user){
    $sql = "DELETE FROM cart WHERE users_id = '$id_user'";
    return pdo_execute($sql);
}
//mycart
function mycart($user_id){
    $sql = "SELECT * FROM orders where user_id = '$user_id'";
    return pdo_query($sql);
}
//loade oder admin
function loadorder(){
    $sql = "SELECT * FROM orders order by order_id desc";
    return pdo_query($sql);
}