<div class="page-heading about-page-heading" id="top">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-content">
          <h2>Đơn hàng của tôi</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
  <div class="col-md-9">
    <div class="card mt-5">
      <div class="card-header" style="background-color: black">
        <p style="color: white; font-size: 20px;">Đơn hàng của tôi</p>
      </div>
      <table class="table">
        <thead>
          <tr>

            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tên người đặt hàng</th>
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Số lượng mặt hàng</th>
            <th scope="col">Tổng giá trị đơn hàng</th>
            <th scope="col">Tình trạng đơn hàng</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (is_array($list_bill)) {
            foreach ($list_bill as $bill) :
              extract($bill);
              $ttdh = get_ttdh($bill['bill_status']);
              $soluongsp = loadall_cart_count($bill['bill_id']);
          ?>
              <tr>
                <th scope="row"><?php echo $bill['bill_id'] ?></th>
                <th scope="row"><?php echo $bill['bill_name'] ?></th>
                <td>
                  <span class="font-weight-bold"><?php echo $bill['ngaydathang']; ?></span>
                  <!-- <?php echo $bill['ngaydathang'] ?> -->
                </td>
                <td><?php echo $soluongsp; ?></td>
                <td><?php echo $bill['total'] ?></td>
                <td><?php echo $ttdh?></td>
                <td>
                  <a href="index.php?act=cartdetail&id=<?php echo $bill["bill_id"]?>"><button type="button" class="btn btn-success " style="width: 70px; font-size: 12px;">Chi tiết</button></a>
                  <a href="index.php?act=delete&id=<?php echo $bill["bill_id"]?>"><button type="button" class="btn btn-success  <?php echo $bill['bill_status'] != 0 ? 'd-none' : '' ?>" style="width: 110px; font-size: 12px; background-color: red; "onclick="return confirm('Bạn có muốn hủy đơn hàng này?');">Hủy đơn hàng</button></a>
                  <!-- <a href="#<?php echo $bill["bill_id"]?>"><button type="button" class="btn btn-success  <?php echo $bill['bill_status'] != 1 ? 'd-none' : ''  ?>" style="width: 130px; font-size: 12px; background-color: red; ">Đang giao hàng</button></a> -->
                  <a href="index.php?act=danhanhang&id=<?php echo $bill["bill_id"]?>"><button type="button" class="btn btn-success  <?php echo $bill['bill_status'] != 2 ? 'd-none' : ''  ?>" style="width: 130px; font-size: 12px; background-color: red; ">Đã nhận hàng</button></a>
                </td>

              </tr>

          <?php endforeach;
          } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>