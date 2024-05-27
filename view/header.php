<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.php" class="logo">
                        <h3 style="margin-top: 50px;">Nhóm 12</h3>
                    </a>
                    <ul class="nav" style="margin-top:4%">

                        <li class="scroll-to-section"><a href="index.php" class="active" >Trang chủ</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Danh Mục</a>
                            <ul>
                                <?php
                                $listcategory = load_danhmuc();
                                foreach ($listcategory as $category) :
                                ?>
                                    <li>
                                        <a href="index.php?act=sanpham&categorys_id=<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="./view/gioithieu.php">Giới thiệu</a></li>
                        <li class="scroll-to-section"><a href="./view/contact.php">Liên hệ</a></li>
                        <li>
                            <form action="?act=sanpham" method="post">
                                <div style="border:none;border-bottom:1px solid #ccc; margin-left:20px;">
                                    <input type="text" style="border: none; " placeholder="Tìm kiếm" name="kyw">
                                    <button type="submit" style="border:none; background:white"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>
                        <li><a href="?act=cart"><i class="fa fa-shopping-cart" style="font-size:30px"></i></a></li>
                        <li class="scroll-to-section" style="font-size: 20px;"><a href="?act=login"><i class="fa fa-heart-o" style="font-size:26px ;color:red"></i></a></li>
                        <?php
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        ?>

                            <li class="submenu">
                                <a href="javascript:;"><?php echo $user_name ?></a>
                                <ul>
                                    <li><a href="index.php?act=capnhattaikhoan&user_id=<?php echo $user_id ?>">Cập nhật tài khoản</a></li>
                                    <?php if ($role == 1) {  ?>
                                       
                                        <li><a href="admin/index.php">Truy cập Admin</a></li>
                                    <?php } ?>

                                    <li><a href="index.php?act=mybill">Đơn hàng của tôi</a></li>
                                    <li><a href="index.php?act=thoat">Đăng xuất</a></li>
                                </ul>
                            </li>
                        <?php
                        } else {
                            echo '<li><a href="?act=login"><i class="fa fa-user" style="font-size:30px"></i></a></li>';
                        }
                        ?>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>


</header>