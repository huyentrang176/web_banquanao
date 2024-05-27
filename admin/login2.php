<?php
session_start();
ob_start();
include "../model/pdo.php";
include "../model/user.php";

if ((isset($_POST['dangnhap'])) && ($_POST['dangnhap'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = checkuser($email, $password);
    $_SESSION['role'] = $role;
    if ($role == 1) header('location: index.php');
    else {
        $txt_erro = "Tài khoản hoặc mật khẩu không chính xác";
    } //header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <div class="login-admin">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h2>Đăng nhập để vào trang quản trị Admin</h2>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Example input placeholder">
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" name="password" placeholder="Example input placeholder">
            </div>

            <!-- <input type="submit" name="dangnhap" class="btn btn-primary">Đăng nhập</input> -->
            <input type="submit" name="dangnhap" value="Đăng nhập">
            <br>
            <?php
            if (isset($txt_erro) && ($txt_erro != "")) {
                echo "<font color='red'>" . $txt_erro . "</font>";
            }
            ?>
        </form>
    </div>
</body>

</html>