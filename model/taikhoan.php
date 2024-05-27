<?php
function loadall_taikhoan()
{
    
        $sql = "SELECT * FROM users order by user_id desc";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
}
function loadone_taikhoan($id)
{
    $id = $_GET['user_id'];
    $sql = "SELECT * FROM users WHERE user_id = '$id';";
    $tk = pdo_query_one($sql);
    return $tk;
}
function updatetk($tentk,$email ,$phone,$address , $id)
{
    $sql = "UPDATE `users` SET `user_name`='$tentk' ,`email` = '$email',`phone`='$phone',`address`='$address' WHERE `user_id`='$id'";
    pdo_execute($sql);
}
?>