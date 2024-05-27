<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Danh sách sản phẩm của chúng tôi</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section" id="products">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Sản Phẩm <?= $tendm ?></h2>
                    <span>Đây là những sản phẩm của chúng tôi</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            foreach ($dssp as $sanpham) :
                extract($sanpham);
                $linksp = "index.php?act=chitietsanpham&idsp=" . $product_id;
            ?>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="thumb">
                            <div class="hover-content">
                                <ul>
                                    <li><a href="index.php?act=chitietsanpham&product_id=<?php echo $product_id?>"><i class="fa fa-eye"></i></a></li>
                                </ul>
                            </div>
                            <img src="./upload/<?php echo $img ?>" alt="">
                        </div>
                        <div class="down-content">
                            <h4><?php echo  $sanpham['product_name'] ?></h4>
                            <span>Giá: <?= number_format($price,0,".",".") ?> VNĐ</span>
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php
            endforeach
            ?>
            <div class="col-lg-12">
                <div class="pagination">
                </div>
            </div>
        </div>
    </div>
</section>