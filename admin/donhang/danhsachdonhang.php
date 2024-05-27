<section class="main_content dashboard_part large_header_bg">
        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 text_white">Quản lí đơn hàng</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container pt-5 mt-5">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Số lượng hàng</th>
                                <th scope="col">Giá trị đơn hàng</th>
                                <th scope="col">Tình trạng đơn hàng</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($listbill as $bill):
                                    extract($bill);
                                    $khachhang =  $bill['bill_name'].'<br>'.
                                                  $bill['bill_email'].'<br>'.
                                                  $bill['bill_address'].'<br>'.
                                                  $bill['bill_tel'];
                                    $ttdh = get_ttdh($bill['bill_status']);
                                    $soluongsp=loadall_cart_count($bill['bill_id']);
                            ?>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><?php echo $bill['bill_id'] ?></td>
                                <td><?php echo $khachhang ?></td>
                                <td><?php echo $soluongsp ?></td>
                                <td><?php echo $bill['total']?></td>
                                <td><?php echo $ttdh?></td>
                                <td>
                                    <a href="index.php?act=sua_donhang&id=<?php echo $bill['bill_id'] ?>"><button type="button" class="btn btn-success <?php echo $bill['bill_status'] != 0 ? 'd-none' : '' ?>">Xác nhận đơn hàng</button></a>
                                    <a href="index.php?act=chitietdonhang&id=<?php echo $bill["bill_id"]?>"><button type="button" class="btn btn-success" style="width: 100px; font-size: 15px; background-color: red;">Chi tiết</button></a><br><br>
                                    <a href="index.php?act=xacnhan_donhang&id=<?php echo $bill['bill_id'] ?>"><button type="button" class="btn btn-success <?php echo $bill['bill_status'] != 1 ? 'd-none' : '' ?>">Đang giao hàng</button></a>
                                    
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>
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