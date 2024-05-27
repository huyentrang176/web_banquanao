<?php
session_start();
ob_start();

include "./model/pdo.php";
include "./model/user.php";
include "./model/category.php";
include "./model/product.php";
include "./model/cart.php";
include "./model/order.php";

// include "./model/bill.php";
if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <title>Trang chủ</title>
    <link rel="stylesheet" type="text/css" href="./view/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./view/assets/css/font-awesome.css">
    <link rel="stylesheet" href="./view/assets/css/templatemo-hexashop.css">
    <link rel="stylesheet" href="./view/assets/css/owl-carousel.css">
    <link rel="stylesheet" href="./view/assets/css/lightbox.css">
    <link rel="stylesheet" href="./view/css/style.css">
    <link rel="stylesheet" href="./view/css/bootstrap.min.css">
    <link rel="icon" href="img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="view/css/css/bootstrap.min.css">
    <!-- animate CSS -->

    <!-- style CSS -->
    <link rel="stylesheet" href="view/css/css/style.css">

</head>

<body>
    <?php
    include "view/header.php";

    ?>
    <?php
    if (isset($_GET['act']) && $_GET['act'] != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'sanpham':
                if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                    $kyw = $_POST['kyw'];
                } else {
                    $kyw = "";
                }
                if (isset($_GET['categorys_id']) && ($_GET['categorys_id'] > 0)) {
                    $iddm = $_GET['categorys_id'];
                } else {
                    $iddm = 0;
                }
                $dssp = loade_sanpham($kyw, $iddm);
                $tendm = loade_tendm($iddm);
                include "view/productKYW.php";
                break;
            case 'chitietsanpham':
                $_SESSION['product_id'] = $_GET['product_id'];
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    $id = $_GET['product_id'];
                    $ctsanpham = loadone_sanpham($id);
                    $spcungloai = sanpham_cungloai($id);
                    $size_sp = size_product($id);
                    tangluotxem($id);
                    // $spcungloai = loadeone_sanphamCungloai($id, $iddm);
                    include "view/productdetail.php";
                } else {
                    include "view/productdetail.php";
                }


                break;
            case 'register':
                if (isset($_POST['register'])) {
                    if (empty($_POST['user'])) {
                        $error_user = "Không được bỏ trống trường này";
                    } else {
                        $user = $_POST['user'];
                    }

                    if (empty($_POST['email'])) {
                        $error_email = "Không được bỏ trống trường này";
                    } else {
                        $email = $_POST['email'];
                    }

                    if (empty($_POST['password'])) {
                        $error_pass = "Không được bỏ trống trường này";
                    } else {
                        $password = $_POST['password'];
                    }

                    if (empty($_POST['repassword'])) {
                        $error_repass = "Không được bỏ trống trường này";
                    } else if ($_POST['repassword'] != $_POST['password']) {
                        $error_repass = "Không đúng định dạng password";
                    }

                    if (!isset($error_user) && !isset($error_email) && !isset($error_pass) && !isset($error_repass)) {
                        insert_taikhoan($user, $email, $password);
                        $thongbao = "<span style='color: red'>Đăng ký tài khoản thành công</span>";
                        header('Location: index.php?act=login');
                    } else {
                        echo "Add không thành công";
                    }
                }
                include "view/register.php";
                break;
            case 'login':
                if (isset($_POST['login']) && $_POST['login']) {

                    if (empty($_POST['email'])) {

                        $errorEmail = "Không được để trống trường này";
                    } else {
                        // $_SESSION['email']="";
                        $email = $_POST['email'];
                        // $_SESSION['email']="";
                    }
                    if (empty($_POST['password'])) {

                        $errorPass = "Không được để trống trường này";
                    } else {
                        // $_SESSION['password']="";
                        $password = $_POST['password'];
                        // $_SESSION['password']="";
                    }
                    if (!isset($errorEmail) && !isset($errorPass)) {
                        $checkuser = checkuser1($email, $password);
                        if (is_array($checkuser)) {
                            // var_dump(1);
                            // die();
                            $_SESSION['user'] = $checkuser;
                            header('Location: index.php');
                        } else {

                            $thongbao = "Tài khoản không tồn tại";
                        }
                    }
                }
                include 'view/login.php';
                break;
            case 'thoat':
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                    header("location: index.php");
                }
                break;
            case 'suataikhoan':

                if (isset($_GET['user_id']) && $_GET['user_id']) {
                    $user_id = $_GET['user_id'];
                    $suatk = load_user($user_id);
                }

                $dstk = loadall_taikhoan();
                include "view/capnhattaikhoan.php";

                break;
            case 'capnhattaikhoan':

                $user_id = $_SESSION['user']['user_id'];

                if (isset($_POST['capnhat'])) {
                    if (empty($_POST['user'])) {
                        $error_user = "Không được bỏ trống trường này";
                    } else {
                        $user = $_POST['user'];
                    }

                    if (empty($_POST['tel'])) {
                        $error_tel = "Không được bỏ trống trường này";
                    } else {
                        $phone = $_POST['tel'];
                    }

                    if (empty($_POST['email'])) {
                        $error_email = "Không được bỏ trống trường này";
                    } else {
                        $email = $_POST['email'];
                    }

                    if (empty($_POST['address'])) {
                        $error_address = "Không được bỏ trống trường này";
                    } else {
                        $address = $_POST['address'];
                    }
                    $thongbao = true;
                    $alertDisplayed = false;
                    $taikhoan = load_user($user_id);

                    if (!isset($error_user) && !isset($error_email) && !isset($error_tel) && !isset($error_address)) {
                        updatetaikhoan($user_id, $user, $email, $phone, $address);
                        // $thongbao = "<span style='color: red'>Cập nhật tài khoản thành công</span>";
                        if ($thongbao && !$alertDisplayed) {
                            echo '<script>';
                            echo 'alert("Cập nhật thành công!");';
                            echo 'window.location.href = "index.php";'; // Đổi đường dẫn theo ý muốn của bạn
                            echo '</script>';
                            $alertDisplayed = true;
                        }
                    } else {
                        echo "Add không thành công";
                    }
                }
                $taikhoan = load_user($user_id);

                include "view/capnhattaikhoan.php";
                break;
            case 'Forgotpassword':
                if (isset($_POST['quenmk']) && ($_POST['quenmk'])) {
                    $email = $_POST['email'];
                    $checkemail = check_email($email);
                    if (is_array($checkemail)) {
                        $thongbao = "<span style='color: red;'>Mật khẩu của bạn là: </span>" . $checkemail['password'];
                    } else {
                        $thongbao = "email không tồn tại";
                    }
                }
                include "view/Forgotpassword.php";
                break;
            case 'cart':
                if (isset($_POST['addtocart'])) {
                    $product_id = $_POST['product_id'];
                    $namesp = $_POST['product_name'];
                    $image = $_POST['image'];
                    $price = $_POST['price'];
                    $size = $_POST['size'];
                    $soluong = $_POST['quantity'];
                    // $variant = $_POST['variant'];
                    // $variant = load_variant($product_id, $size);
                    // var_dump($variant);
                    // $variant_id = $variant['Variant_id'];
                    $addsp = [$product_id, $namesp, $image, $price, $size, $soluong];
                    array_push($_SESSION['mycart'], $addsp);
                }

                include "view/cart.php";
                break;
            case 'delcart':
                if (isset($_GET['cart_id'])) {
                    // Sử dụng unset để xóa mục tại chỉ mục được chỉ định
                    unset($_SESSION['mycart'][$_GET['cart_id']]);
                    // Reset lại các chỉ mục của mảng nếu cần
                    $_SESSION['mycart'] = array_values($_SESSION['mycart']);
                } else {
                    $_SESSION['mycart'] = [];
                }
                header("Location: ?act=viewcart");
                break;

            case "viewcart":
                include "view/cart.php";
                break;
            case 'checkout':
                $_SESSION['user'];
                $_SESSION['mycart'];
                // $user = cart_load_all($user_id);

                include 'view/checkout.php';
                break;
            case 'billconfirm':

                if (isset($_POST['dathang']) && $_POST['dathang']) {
                    if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['user_id'];
                    } else {
                        $user_id = 0;
                    }
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $pttt = $_POST['thanhtoan'];
                    $phone = $_POST['tel'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
                    $bill_id = insert_bill($user_id, $name, $email, $address, $phone, $pttt, $ngaydathang, $tongdonhang);

                    $thanhtien = 0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $product_id = $cart[0];
                        $img = $cart[2];
                        $name = $cart[1];
                        $price = $cart[3];
                        $size = $cart[4];
                        $soluong = $cart[5];
                        $thanhtien = $price * $soluong;
                        insert_cart($user_id, $product_id, $img, $name, $size, $price, $soluong, $thanhtien, $bill_id);
                    }
                    //xóa giỏ hàng
                    $_SESSION['mycart'] = [];
                }
                $list_bill = loadone_bill($bill_id);
                $bill_ct = loadall_cart($bill_id);
                include "view/billconfirm.php";
                break;

            case "mybill":
                $user_id = $_SESSION['user']['user_id'];
                $list_bill = loadall_bill($user_id);
                include "view/myoder.php";
                break;

            case 'cartdetail':
                if (isset($_POST['dathang']) && $_POST['dathang']) {
                    if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['user_id'];
                    } else {
                        $user_id = 0;
                    }
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $pttt = $_POST['thanhtoan'];
                    $phone = $_POST['tel'];
                    $ngaydathang = date('h:i:sa d/m/Y');
                    $tongdonhang = tongdonhang();
                    $bill_id = insert_bill($user_id, $name, $email, $address, $phone, $pttt, $ngaydathang, $tongdonhang);

                    $thanhtien = 0;
                    foreach ($_SESSION['mycart'] as $cart) {
                        $product_id = $cart[0];
                        $img = $cart[2];
                        $name = $cart[1];
                        $price = $cart[3];
                        $size = $cart[4];
                        $soluong = $cart[5];
                        $thanhtien = $price * $soluong;
                        insert_cart($user_id, $product_id, $img, $name, $size, $price, $soluong, $thanhtien, $bill_id);
                    }
                    //xóa giỏ hàng
                    $_SESSION['mycart'] = [];
                }
                $cartdetail  = bill_detail($_GET["id"]);
                include "view/cartdetail.php";
                break;
            case "delete":
                $id = $_GET['id'];
                update_giohang(4, $id);
                $list_bill = loadall_bill($user_id);
                include "view/myoder.php";
                break;
                case "danhanhang":
                    $id = $_GET['id'];
                    update_giohang(3, $id);
                    $list_bill = loadall_bill($user_id);
                    include "view/myoder.php";
                    break;
            case "gioithieu":
                include "view/gioithieu.php";
                break;
        }
    } else {
        include "view/home.php";
    }
    ?>
    <!-- ***** Footer ***** -->
    <?php
    include "view/footer.php";
    ?>
    <!-- jQuery -->
    <script src="./view/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="./view/assets/js/popper.js"></script>
    <script src="./view/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="./view/assets/js/owl-carousel.js"></script>
    <script src="./view/assets/js/accordions.js"></script>
    <script src="./view/assets/js/datepicker.js"></script>
    <script src="./view/assets/js/scrollreveal.min.js"></script>
    <script src="./view/assets/js/waypoints.min.js"></script>
    <script src="./view/assets/js/jquery.counterup.min.js"></script>
    <script src="./view/assets/js/imgfix.min.js"></script>
    <script src="./view/assets/js/slick.js"></script>
    <script src="./view/assets/js/lightbox.js"></script>
    <script src="./view/assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="./view/assets/js/custom.js"></script>
    <script src="./view/js/main.js"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>


    <!-- dành cho trang checkout  -->
    <script src="view/js/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="view/js/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="view/js/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="view/js/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="view/js/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="view/js/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="view/js/js/owl.carousel.min.js"></script>
    <script src="view/js/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="view/js/js/slick.min.js"></script>
    <script src="view/js/js/jquery.counterup.min.js"></script>
    <script src="view/js/js/waypoints.min.js"></script>
    <script src="view/js/js/contact.js"></script>
    <script src="view/js/js/jquery.ajaxchimp.min.js"></script>
    <script src="view/js/js/jquery.form.js"></script>
    <script src="view/js/js/jquery.validate.min.js"></script>
    <script src="view/js/js/mail-script.js"></script>
    <script src="view/js/js/stellar.js"></script>
    <script src="view/js/js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="view/js/js/custom.js"></script>
    <!-- end check out  -->
    <!-- dành cho đánh giá sao  -->
    <script>
        //lay stars
        window.onload = function() {
            updateHiddenInput();
        };

        function updateHiddenInput() {
            var selectedValue = document.querySelector('input[name="star"]:checked').value;
            document.getElementById("hiddenInput2").value = selectedValue;
        }
    </script>
</body>

</html>