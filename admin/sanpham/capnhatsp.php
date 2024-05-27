<section class="main_content dashboard_part large_header_bg">
    <div class="main_content_iner overly_inner ">
        <div class="container-fluid p-0 ">
            <div class="row">
                <div class="col-12">
                    <div class="page_title_box d-flex align-items-center justify-content-between">
                        <div class="page_title_left">
                            <h3 class="f_s_30 f_w_700 text_white">Cập nhật sản phẩm</h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (is_array($sanpham)) {
                extract($sanpham);
            }
            ?>
            <div class="container pt-5 mt-5">
                <form action="index.php?act=updatesp" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Sản phẩm</label>
                            <input type="" name="idsp" style="display:none" class="form-control" id="exampleFormControlInput1" value="<?php if (isset($product_id) && ($product_id > 0)) echo $product_id; ?>">
                        </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" name="tensp" id="exampleFormControlInput1" value="<?php echo $sanpham['product_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ảnh sản phẩm</label><br>
                        <img src="../upload/<?php echo $sanpham['img'] ?>" width="150" height="150"><br>
                        <input type="file" class="form-control mt-3" name="img" id="exampleFormControlInput1" value="<?php echo $sanpham['img']?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Giá sản phẩm</label>
                        <input type="text" class="form-control" name="giasp" id="exampleFormControlInput1" value="<?php echo $sanpham['price'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                        <textarea class="form-control" name="mota" id="exampleFormControlTextarea1" rows="3"><?php echo $sanpham['description'] ?></textarea>
                    </div>
<!-- update mới  -->
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Danh mục</label>
                        <select class="form-select" name="iddm" aria-label="Default select example">
                            <?php
                            foreach ($listdanhmuc as $danhmuc) :
                                extract($danhmuc);
                            ?>
                                <option value="<?php echo $danhmuc['category_id'] ?>"<?php echo $sanpham['category_id']==$danhmuc['category_id']?'selected':'' ?> ><?php echo $danhmuc['category_name']?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
<!-- end update  -->
                    <div class="mb-3 d-flex justify-content-center">
                        <button type="submit" name="update" class="btn btn-success">Cập nhật</button>
                    </div>
                </form>
                <?php if(isset($thongbao)){
                    echo $thongbao;
                }?>
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