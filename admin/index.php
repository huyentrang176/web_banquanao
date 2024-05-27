<?php
session_start();
ob_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] == 1)) {




?>



    <!DOCTYPE html>
    <html lang="zxx">

    <!-- Mirrored from demo.dashboardpack.com/sales-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 02 Nov 2023 18:12:16 GMT -->

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Admin </title>
        <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
        <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
        <link rel="stylesheet" href="../css/metisMenu.css">
        <link rel="stylesheet" href="../css/style1.css" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body class="crm_body_bg">
        <?php

        include "header.php";
        include "../model/pdo.php";
        include "../model/category.php";
        include "../model/product.php";
        include "../model/taikhoan.php";
        include "../model/cart.php";
        include "../model/user.php";
        // $listdanhmuc = loade_danhmuc();

        ?>
    <?php
    if ((isset($_GET['act'])) && ($_GET['act']) != "") {
        $act = $_GET['act'];
        switch ($act) {
            case 'add_danhmuc':
                if (isset($_POST['submit']) && ($_POST['submit'])) {
                    if (empty($_POST['tenloai'])) {
                        $error_tenloai = "Không được bỏ trống";
                    } else {
                        $tenloai = $_POST['tenloai'];
                    }
                    if (!isset($error_tenloai)) {
                        insert_danhmuc($tenloai);
                        $thongbao = "Thêm thành công danh mục";
                    } else {
                        $thongbao = "Thêm thất bại. Thử lại !";
                    }
                }
                include 'danhmuc/themdanhmuc.php';
                break;
            case 'list_danhmuc':
                $listdanhmuc = load_danhmuc();
                include 'danhmuc/danhmuc.php';
                break;
            case 'xoa_danhmuc':
                if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                    delete_danhmuc($_GET['category_id']);
                }
                $listdanhmuc = load_danhmuc();
                include 'danhmuc/danhmuc.php';
                break;
            case 'sua_danhmuc':
                if (isset($_GET['category_id']) && ($_GET['category_id'] > 0)) {
                    $dm = loadone_danhmuc($_GET['category_id']);
                }
                include 'danhmuc/capnhatdanhmuc.php';
                break;
            case 'update_danhmuc':
                if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    if (empty($_POST['tenloai'])) {
                        $error_tenloai = "Không được bỏ trống";
                    } else {
                        $tenloai = $_POST['tenloai'];
                    }
                    update_danhmuc($tenloai, $id);
                }
                $listdanhmuc = load_danhmuc();
                include 'danhmuc/danhmuc.php';
                break;
            case 'addproduct':
                if (isset($_POST['themmoi'])) {
                    if (empty($_POST['tensp'])) {
                        $error_tensp = "Không được để trống";
                    } else {
                        $tensp = $_POST['tensp'];
                    }
                    // end tên sản phẩm 

                    if (empty($_POST['giasp'])) {
                        $error_giasp = "Không được để trống";
                    } else {
                        $giasp = $_POST['giasp'];
                    }
                    // end giá sản phẩm 

                    if (empty($_POST['mota'])) {
                        $error_mota = "Không được để trống";
                    } else {
                        $mota = $_POST['mota'];
                    }
                    // end mô tả sản phẩm

                    if (empty($_POST['iddm'])) {
                        $error_iddm = "Không được để trống";
                    } else {
                        $iddm = $_POST['iddm'];
                    }
                    // end id danh mục
                    $duongdan = "../upload/";
                    $chiden = $duongdan . basename($_FILES['img']['name']);
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $chiden)) {
                        $filename = $_FILES['img']['name'];
                    } else {
                        $error_img = "Thêm ảnh thất bại";
                    }
                    // end thêm ảnh sản phẩm
                    if (!isset($error_tensp) && !isset($error_giasp) && !isset($error_mota) && !isset($error_iddm) && !isset($error_img)) {
                        insert_sanpham($tensp, $giasp, $mota, $filename, $iddm);
                        $thongbao = "Thêm thành công";
                    } else {
                        $thongbao = "Thêm thất bại";
                    }

                    // check lỗi
                }
                $listdanhmuc = load_danhmuc();
                include "sanpham/themsp.php";
                break;
            case 'listproduct':
                $listAll = listAll();
                include 'sanpham/sanpham.php';
                break;
            case 'xoasp':
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    delete_sanpham($_GET['product_id']);
                }
                $listAll = listAll();
                include 'sanpham/sanpham.php';
                break;
            case 'suasp':
                if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                    $id = $_GET['product_id'];
                    $sanpham = loadone_sanpham($id);
                }
                $listdanhmuc = load_danhmuc();
                $listAll = listAll();
                include 'sanpham/capnhatsp.php';
                break;


            case 'updatesp':

                if (isset($_POST['update'])) {

                    if (empty($_POST['idsp'])) {
                        $error_idsp = "Không được để trống";
                    } else {
                        $idsp = $_POST['idsp'];
                    }
                    // end id sản phẩm
                    if (empty($_POST['tensp'])) {
                        $error_tensp = "Không được để trống";
                    } else {
                        $tensp = $_POST['tensp'];
                    }
                    // end tên sản phẩm 

                    if (empty($_POST['giasp'])) {
                        $error_giasp = "Không được để trống";
                    } else {
                        $giasp = $_POST['giasp'];
                    }
                    // end giá sản phẩm 

                    if (empty($_POST['mota'])) {
                        $error_mota = "Không được để trống";
                    } else {
                        $mota = $_POST['mota'];
                    }
                    // end mô tả sản phẩm

                    if (empty($_POST['iddm'])) {
                        $error_iddm = "Không được để trống";
                    } else {
                        $iddm = $_POST['iddm'];
                    }
                    // end id danh mục
                    $duongdan = "../upload/";
                    $chiden = $duongdan . basename($_FILES['img']['name']);
                    if (move_uploaded_file($_FILES['img']['tmp_name'], $chiden)) {
                        $filename = $_FILES['img']['name'];
                    } else {
                        $error_img = "Thêm ảnh thất bại";
                    }
                    update_sanpham($idsp, $tensp, $giasp, $filename, $mota, $iddm);

                    // check lỗi
                }

                $listdanhmuc = load_danhmuc();
                $listAll = listAll();
                include "sanpham/sanpham.php";
                break;
            case "chitietsp":
                $listbill = loadall_bill1();
                $listAll = listAll();
                include "sanpham/chitietsp.php";
                break;
            case "listbill":
                $listbill = loadall_bill1();
                include "donhang/danhsachdonhang.php";
                break;

            case 'dskh':
                $listtaikhoan = loadall_taikhoan();
                include 'taikhoan/taikhoan.php';
                break;
            case 'suatk':
                if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                    $tk = loadone_taikhoan($_GET['user_id']);
                }
                include 'taikhoan/capnhattk.php';
                break;
            case 'update_tk':
                if (isset($_POST['capnhat'])) {
                    $id = $_POST['id'];
                    if (empty($_POST['tentk'])) {
                        $error_tenloai = "Không được bỏ trống";
                    } else {
                        $tentk = $_POST['tentk'];
                    }
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];
                    updatetk($tentk, $email, $phone, $address, $id);
                }
                $listtaikhoan = loadall_taikhoan();
                include 'taikhoan/taikhoan.php';
                break;
            case 'chitietdonhang':
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
                include 'donhang/chitietdonhang.php';
                break;
            case "sua_donhang":
                $id = $_GET['id'];
                update_donhang(1, $id);
                $listbill = loadall_billAdmin();
                include 'donhang/danhsachdonhang.php';
                break;
            case "xacnhan_donhang":
                $id = $_GET['id'];
                update_donhang(2, $id);
                $listbill = loadall_billAdmin();
                include 'donhang/danhsachdonhang.php';
                break;
            case "ht_donhang":
                $id = $_GET['id'];
                update_donhang(5, $id);
                $listbill = loadall_billAdmin();
                include 'donhang/danhsachdonhang.php';
                break;

            case "thoat":
                if (isset($_SESSION['role'])) unset($_SESSION['role']);
                header('location: ../index.php');
        }
    } else {
        include "home.php";
    }
} else {
    header('location: login2.php');
}
    ?>
    <script src="../js/jquery1-3.4.1.min.js"></script>
    <script src="../js/popper1.min.js"></script>
    <script src="../js/bootstrap.min.html"></script>
    <script src="../js/metisMenu.js"></script>
    <script src="../js/dashboard_init.js"></script>
    <script src="../js/custom.js"></script>
    </body>


    </html>