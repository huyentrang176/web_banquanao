<?php
// function insert_danhmuc($tenloai)
// {
//     $sql = "INSERT INTO `categorys`(`category_name`) VALUES ('$tenloai')";
//     pdo_execute($sql);
// }
function checkuser($email,$password)
{
    $conn=pdo_get_connection();
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = '".$email."' AND password ='".$password."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0) return $kq[0]['role'];
    else return 0;

}
function insert_taikhoan($user,$email,$password){
    $sql = "INSERT INTO `users` ( `user_name`, `email`, `password`) VALUES ('$user','$email','$password')";
    pdo_execute($sql);
}

function checkuser1($email, $password)
{
$sql = "SELECT * FROM users where email = '$email' AND password = '$password'";
$p = pdo_query_one($sql);
return $p;
}

function updatetaikhoan($user_id,$user,$email,$phone,$address){
    $sql="UPDATE `users` SET `user_name`='$user',`email`='$email',`phone`='$phone',`address`='$address' WHERE user_id='$user_id'";
    pdo_execute($sql);
}

function load_user($user_id){
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result= pdo_query_one($sql);
    return $result;
}
// function loadall_taikhoan(){
//     $sql = "SELECT * FROM users WHERE 1";
//     $taikhoan = pdo_query($sql);
   
//     return $taikhoan;
// }


// dành cho quên mật khẩu 
function check_email($email)
{
$sql = "SELECT * from users where email='" . $email . "'";
$sp = pdo_query_one($sql);
return $sp;
}
?>