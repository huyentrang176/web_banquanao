<div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Cập nhật thông tin khách hàng</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="checkout_area " style="width:30%;margin:auto">
    <div class="container"  >
      <div class="billing_details">
        <div class="row">
            <!-- thông tin khách hàng  -->
       <?php extract($taikhoan);?>
          <div class="col-lg-12">
            <h3 style="text-align:center">Cập nhật thông tin khách hàng</h3>
            <form action="?act=capnhattaikhoan&user_id=<?php echo $_GET["user_id"]?>" method="post">
              <div class="col-md-12 form-group">
                <label for="">Họ và tên</label>
                <input type="text" class="form-control" name="user" placeholder="Company name" value="<?php if(isset($user_name))echo $user_name;?>"  />
                <span style="color:red;"><?php echo isset($error_user) ? $error_user : '' ?></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <label for="">Số điện thoại</label>
                <input type="text" class="form-control" name="tel"value="<?php if(isset($phone))echo $phone?>"  />
                <span style="color:red;"><?php echo isset($error_tel) ? $error_tel : '' ?></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <label for="">Email</label>
                <input type="text" class="form-control"  name="email" value="<?php echo $email?>" />
                <span style="color:red;"><?php echo isset($error_email) ? $error_email : '' ?></span>
              </div>
              <div class="col-md-12 form-group p_star">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control"  name="address" value="<?php echo $address?>" />
                <span style="color:red;"><?php echo isset($error_address) ? $error_address : '' ?></span>
              </div>
              <div class="col-md-12 " style="text-align: center;">
              <input type="submit" name="capnhat" value="Cập nhật tài khoản" class="btn btn-dark">
              </div>
              <?php if(isset($thongbao)){
            echo $thongbao;
         }?>
          </div>

          <!-- end thông tin khách hàng  -->

          <!-- thông tin đơn hàng  -->
        
        </div>
      </div>
      </div>
  </section>
  </form>
