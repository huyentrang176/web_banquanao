
<section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 text_white">Cập nhật tài khoản</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if (is_array($tk)) {
                    extract($tk);
                }
                ?>
                <div class="container pt-5 mt-5">
                    <form action="index.php?act=update_tk" method="POST">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ID TÀI KHOẢN</label>
                            <input type="" name="id" class="form-control" style="display:none" id="exampleFormControlInput1" value="<?php if (isset($user_id) && ($user_id > 0)) echo $user_id; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tên tài khoản</label>
                            <input type="text" name="tentk" class="form-control" id="exampleFormControlInput1" value="<?php if (isset($user_name) && $user_name != "") echo $user_name; ?>">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Mật Khẩu</label>
                            <input type="text" name="password" class="form-control" id="exampleFormControlInput1" value="<?php if (isset($password) && $password != "") echo $password; ?>">
                        </div> -->
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                            <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="<?php if (isset($phone) && $phone != "") echo $phone; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="<?php if (isset($email) && $email != "") echo $email; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="exampleFormControlInput1" value="<?php if (isset($address) && $address != "") echo $address; ?>">
                        </div>
                        <div class="mb-3 d-flex justify-content-center">
                            
                            <button type="reset" class="btn btn-secondary mx-2">Nhập lại</button>
                            <input type="submit" name="capnhat" class="btn btn-success mx-2" value="Cập nhật">
                        </div>
                    </form>
                    <?php if(isset($thongbao)){
                        echo $thongbao;
                    }else{
                        echo "";
                    }?>
                </div>
            </div>
        </div>
        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2023 - Designed FPOLY HN<a href="#"> <i class="ti-heart"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end main  -->
 