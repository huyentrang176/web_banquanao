<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Chi tiết đơn hàng</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="width: 1256px;
    display: flex;
    margin: 0 auto;border:1px solid #000;">
  <div class="col-lg-6 col-lx-4" style="border:1px solid #000;">
    <div class="single_confirmation_details">
      <div>
        <h4>Phương thức thanh toán</h4>
      </div>
      <div>
        <ul>

          <!-- <li>
     
        <p>Tổng đơn hàng</p><span>:  <?php echo $total; ?> VNĐ</span>
      </li> -->
          <li style="display: flex;">
            <p><strong>Phương thức thanh toán</strong></p>
            <p>:
              <?php
              if ($bill_pttt = 0) {
                echo "Thanh toán khi nhận hàng";
              } else {
                echo "Thanh toán khi nhận hàng";
              }
              ?>
            </p>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-lx-4" style="border:1px solid #000;">
    <div class="single_confirmation_details">

      <h4>Địa chỉ giao hàng</h4>
    </div>

    <ul>
    <li style="display: flex;">
        <p>Họ tên</p>
        <p>: Trần Hoàn</p>
      </li>
      <li style="display: flex;">
        <p>Số điện thoại</p>
        <p>: 0326376538</p>
      </li>
      <li style="display: flex;">
        <p>Địa chỉ</p>
        <p>: Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
      </li>
      
      <li style="display: flex;">
        <p>Quốc gia</p>
        <p>: Việt Nam</p>
      </li>
      <li style="display: flex;">
        <p>Mã bưu điện</p>
        <p>: 36952</p>
      </li>
    </ul>
  </div>
</div>
</div>
</div>

<div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
  <div class="col-md-9">
    <div class="card mt-5">
      <div class="card-header" style="background-color: black">
        <p style="color: white; font-size: 20px;">Đơn hàng của bạn</p>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Hình ảnh</th>
            <th scope="col">Size</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Thành tiền</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $index = 0;
          $tongtien = 0;
          foreach ($cartdetail as $cart) {
            extract($cart);
            $cart_quantity   = loadall_cart_count($bill_id);
            $index++;
            $tongtien += ($price);
          ?>
            <tr>
              <th scope="row"><?= $index ?></th>
              <td>
                <span class="font-weight-bold"><?= $name ?></span>
              </td>
              <td><img src="./upload/<?= $img ?>" alt="" width="100px"></td>
              <td>L</td>
              <td><?= number_format($price, 0, ',', '.') ?> VNĐ</td>
              <td>
                <p><?= $cart_quantity ?></p>
              </td>
              <td><?= number_format($price * $cart_quantity, 0, ',', '.'); ?> VNĐ</td>
            </tr>
          <?php } ?>
        </tbody>
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <th scope="col"></th>
          <!-- <th scope="col">Tổng tiền</th>
          <th scope="col"><?= number_format($tongtien, 0, ',', '.') ?> <span> VNĐ</span></th> -->
        </tr>
      </table>
    </div>
  </div>
</div>