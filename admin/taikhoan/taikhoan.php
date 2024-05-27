<section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 text_white">Quản lý tài khoản</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-5 mt-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tài Khoản</th>
                                <!-- <th scope="col">Mật Khẩu</th> -->
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listtaikhoan as $taikhoan){
                                    extract($taikhoan);
                                    $suatk="index.php?act=suatk&user_id".$user_id;
                                }
                            ?>
                            <tr>
                                <td><?php echo $taikhoan['user_id'] ?></td>
                                <td><?php echo $taikhoan['user_name'] ?></td>
                                <!-- <td><?php echo $taikhoan['password'] ?></td> -->
                                <td><?php echo $taikhoan['phone'] ?></td>
                                <td><?php echo $taikhoan['email'] ?></td>
                                <td><?php echo $taikhoan['address'] ?></td>
                                <td>
                                    <a href="index.php?act=suatk&user_id=<?php echo $taikhoan['user_id'] ?>"><button type="button" class="btn btn-success">Sửa</button></a>
                                    
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2024 - FPOLY HN<a href="#"> <i class="ti-heart"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>