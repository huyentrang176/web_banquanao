  <section class="confirmation_part padding_top">
    <div class="container">
      <div class="row" >
        <div class="col-lg-12" >
          <div class="confirmation_tittle" >
            <span>Cảm ơn bạn đã đặt hàng.</span>
          </div>
        </div>
        
        <?php if(isset($list_bill)&&is_array($list_bill)){
          extract($list_bill);

        }
        ?>
        <div class="col-lg-6 col-lx-4" >
          <div class="single_confirmation_details" style="background-color: #ccc;">
            <h4>Thông tin đơn hàng</h4>
            <ul>
              <li>
                <p>Mã đơn hàng</p><span>: <?php echo $bill_id?></span>
              </li>
              <li>
                <p>Ngày đặt hàng</p><span>: <?php echo $ngaydathang;?></span>
              </li>
              <!-- <li>
             
                <p>Tổng đơn hàng</p><span>:  <?php echo $total;?> VNĐ</span>
              </li> -->
              <li>
                <p>Phương thức thanh toán</p>
                <span>: 
                  <?php  
                  if($bill_pttt=0){ 
                    echo "Thanh toán khi nhận hàng";
                  }else {
                    echo "Thanh toán khi nhận hàng";
                  }
                  ?>
                </span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details" style="background-color: #ccc;">
            <h4>Địa chỉ giao hàng</h4>
            <ul>
              <li>
                <p>Địa chỉ</p><span>: <?php echo $address?></span>
              </li>
              <li>
                <p>Quốc gia</p><span>: Việt Nam</span>
              </li>
              <li>
                <p>Mã bưu điện</p><span>: 36952</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner" style="background-color: #ccc;">
            <h3>Chi tiết đặt hàng</h3>
            <table class="table table-borderless" style="text-align: center;"> 
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
                </tr>
              </thead>
              
              
              
              <tbody>
            <?php 
            
            $index=1;
              $tongtien=0;
              $thanhtien=0;
              foreach($bill_ct as $cart):
                $tongtien = $cart['price'] * $cart['soluong'];
                  $thanhtien +=$tongtien; 
            ?>
            <tr>
              <th scope="row"><?php echo $index++;?></th>
              
              <td><img src="upload/<?php echo $cart['img']?>" alt="" width="150px"></td>
              <td><span> <?= number_format($cart['price'],0,".",".") ?></span> VNĐ</td>
           
              <td>
                <p><?php echo $cart['soluong'];?></p>
              </td>
              <td><span style="color:black;"> <?= number_format($tongtien,0,".",".")  ?></span> VNĐ</td>
             
            </tr>
            
            <?php endforeach; ?>
          </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="4">Thành tiền</th>
                  <th scope="col" colspan="6"><span> <?= number_format($thanhtien,0,".",".") ?></span> VNĐ</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
