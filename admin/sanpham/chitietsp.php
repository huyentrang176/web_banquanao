<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Chi tiết sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container pt-5 mt-5">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Thông tin sản phẩm</th>
                            <!-- <th scope="col">Bình luận</th> -->
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($listAll as $sanpham) :
                            extract($sanpham);
                        ?>
                            <tr>
                                <td><?php echo $sanpham['product_id'] ?></td>
                                <td><img src="../upload/<?php echo $sanpham['img'] ?>" width="150" height="150"></td>
                                <td>
                                    <strong>Tên sản phẩm:</strong> <?php echo $sanpham['product_name'] ?><br>
                                    <strong>Giá:</strong>  <span> <?= number_format($price,0,".",".") ?></span> VNĐ<br>
                                    <strong>Mô tả:</strong> <?php echo $sanpham['description'] ?><br>
                                    <!-- <strong>Category ID:</strong> <?php echo $sanpham['category_id'] ?> -->
                                </td>
                                <!-- <td></td> -->
   
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- <td>Tên sản phẩm: <?php echo $sanpham['product_name'] ?></td>
                                <td><?php echo $sanpham['price'] ?></td>
                                <td><?php echo $sanpham['description'] ?></td>
                                <td><?php echo $sanpham['category_id'] ?></td> -->