<div class="row mt-4 main-web" style="text-align: center; display: flex; justify-content: center;">
    <div class="col-md-9" style="text-align: center; margin-left:270px;">
        <div class="card mt-5">
            <div class="card-header" style="background-color: black">
                <p style="color: white; font-size: 20px;">Thông tin chi tiết đơn hàng </p>
            </div>
            <table class="table"><br>
            <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                    </div>
                    <ul>
                    <li style="display: flex;">
                    <h5>Thông tin khách hàng</h5>
                    </li>  
                    <li style="display: flex;">
                            <p>Họ tên</p>
                            <p>: Trần Hoàn</p>
                        </li>
                        <li style="display: flex;">
                            <p>Địa chỉ</p>
                            <p>: Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
                        </li>
                        <li style="display: flex;">
                            <p>Số điện thoại</p>
                            <p>: 0326376538</p>
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
            <div style="width: 1256px;
    display: flex;
    margin: 0 auto;">
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <div>
                            <ul>

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
                
            </div>
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
                            <td><img src="../upload/<?= $img ?>" alt="" width="100px"></td>

                            <td>L</td>
                            <td><?= number_format($price, 0, ',', '.') ?> VNĐ</td>
                            <td>
                                <p><?= $cart_quantity ?></p>
                            </td>
                            <td><?= number_format($price * $cart_quantity, 0, ',', '.'); ?> VNĐ</td>
                        </tr>
                    <?php } ?>
                </tbody>
                </tr> 
            </table>
            
        </div>
      
    </div>
    
</div>