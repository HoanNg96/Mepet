<?php include_once('header.php'); ?>

    <div class="content">
        <div class="content-header"></div>
        <div class="content-main container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php
                            foreach ($product_detail as $key => $value) {
                                echo $value['name'];
                            }
                        ?>
                    </li>
                </ol>
            </nav>
            <div class="product-detail">
                <div class="row">
                    <?php
                        foreach ($product_detail as $key => $value) {
                    ?>
                        <div class="col-lg-5 col-md-7 col-12 product-image">
                            <div class="row">
                                <div class="col-sm-2 small-slick">
                                    <?php
                                        foreach ($product_img as $key => $value1) {
                                    ?>
                                        <div class="small-container"><img src="./image/<?php echo $value1['img_link'] ?>" alt=""></div>
                                    <?php } ?>
                                </div>
                                <div class="col-sm-10 big-slick">
                                    <?php
                                        foreach ($product_img as $key => $value1) {
                                    ?>
                                        <div><img src="./image/<?php echo $value1['img_link'] ?>" alt=""></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-12 product-info">
                            <div class="add-wishlist d-flex" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                <a href="">
                                    <i class="fal fa-heart"></i>
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div>
                            <div class="detail-name"><?php echo $value['name'] ?></div>
                            <div class="detail-price"><?php echo number_format ($value['price'],0,",",".") ?>đ</div>
                            <div class="detail-brand"><b>Thương hiệu: </b><?php echo $value['brand_name'] ?></div>
                            <div class="detail-sold-status"><b>Đã bán: </b><?php echo $value['sold'] ?></div>
                            <div class="detail-status"><b>Tình trạng: </b>
                                <?php
                                    if ($value['quantity']>0) {
                                        echo "Còn hàng";
                                    }
                                    else {echo "Hết hàng";}
                                ?>
                            </div>
                            <div class="detail-option">
                                <form action="?controller=productdetail&id=<?php echo $id ?>" method="POST" name="option-form">
                                    <?php
                                        foreach ($product_option_type as $key => $value4) {
                                    ?>
                                        <div class="detail-option"><b><?php echo $value4['option_describe'] ?>:</b></div>
                                        <?php
                                            foreach (${'option'.$value4['option_type_id']} as $key => $value3) {
                                        ?>
                                            <input type="radio" name="<?php echo $value4['option_name'] ?>" value="<?php echo $value3['option_value_id'] ?>" id="<?php echo $value4['product_id'].$value4['option_name'].$value3['option_value_id'] ?>" 
                                            <?php 
                                                if (isset($_POST['color'])||isset($_POST['weight'])||isset($_POST['size'])) {
                                                    if($value4['option_name']=='color') {
                                                        if($value3['option_value_id'] == $option_color_value_id) {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    if($value4['option_name']=='weight') {
                                                        if($value3['option_value_id'] == $option_weight_value_id) {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    if($value4['option_name']=='size') {
                                                        if($value3['option_value_id'] == $option_size_value_id) {
                                                            echo 'checked';
                                                        }
                                                    }
                                                }
                                                else {
                                                    if($value3['option_value_order']==1) {echo 'checked';} 
                                                }
                                            ?>
                                            onclick="this.form.submit()">
                                            <?php 
                                                if($value3['option_type_id']==2) {
                                            ?>
                                                <label for="<?php echo $value4['product_id'].$value4['option_name'].$value3['option_value_id'] ?>" class="product-option-color" style="background-color: <?php echo $value3['color_code'] ?>"></label>
                                            <?php } else { ?>
                                                <label for="<?php echo $value4['product_id'].$value4['option_name'].$value3['option_value_id'] ?>" class="product-option"><?php echo $value3['option_value'] ?></label>
                                        <?php }} ?>
                                    <?php } ?>
                                </form>
                            </div>
                            <div class="d-flex justify-content-start position-relative align-items-center mt-3">
                                <div class="cart-quantity">
                                    <button class="inc-quantity" onclick="this.parentNode.querySelector('.cart-quantity-number').stepUp()"><i class="fal fa-plus"></i></button>
                                    <input type="number" min="1" max="99" value="1" step="1" class="cart-quantity-number">
                                    <button class="dec-quantity" onclick="this.parentNode.querySelector('.cart-quantity-number').stepDown()"><i class="fal fa-minus"></i></button>
                                </div>
                                <div class="detail-addcart">
                                    <?php
                                        if ($value['quantity']>0) {
                                    ?>
                                        <a href="" data-id="<?php echo $value['id'] ?>" class="allow-addcart">THÊM VÀO GIỎ</a>
                                    <?php
                                        } else {
                                    ?>
                                        <a class="disabled">THÊM VÀO GIỎ</a>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                    <?php } ?>
                            <div class="detail-cate mt-4">
                                <b>Phân loại: </b>
                                <?php
                                    foreach($product_cate as $key => $value7) {
                                ?>
                                    <a href="?controller=collection&filter_cate=<?php echo $value7['shopcate_id'] ?>"><?php echo $value7['shopcate_name'] ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-12 shopad">
                            <div class="shopad-box text-center">
                                <h5>Lý do nên chọn chúng tôi ?</h5>
                                <p>MePetStore cung cấp đa dạng các sản phẩm chất lượng và đảm bảo tất cả các sản phẩm là chính hãng được nhập khẩu từ các công ty uy tín trên khắp thế giới.</p>
                            </div>
                            <div class="shopad-box text-center">
                                <h5>Trả hàng</h5>
                                <p>Bạn có thể trả lại hàng trong vòng 14 ngày nếu bạn đổi ý. Bạn sẽ nhận hoàn tiền và miễn phí phí vận chuyển trả hàng nếu sản phẩm được giao bị hư hỏng hay không giống như mô tả.</p>
                            </div>
                        </div>
                </div>
            </div>
            <div class="tab-product-detail mt-4">
                <div class="nav-tab-detail row">
                    <div class="container-fluid">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="#product-describe" data-toggle="tab" class="nav-link active">Mô tả sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="#product-rate" data-toggle="tab" class="nav-link">Đánh giá</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="content-tab-detail row">
                    <div class="container-fluid tab-content">
                        <div id="product-describe" class="tab-pane active">
                            <?php
                                foreach($product_detail as $key => $value) {
                            ?>
                                <div><?php echo $value['content'] ?></div>
                            <?php } ?>
                        </div>
                        <div id="product-rate" class="tab-pane">
                            <div>rate form</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-relate-product">
                <div class="text-center title mb-4 mb-lg-5">Sản phẩm tương tự</div>
                <div class="relate-products-slide owl-carousel owl-theme">
                    <?php
                        foreach ($product_cate as $key => $value12) {
                            foreach(${'product_id_cate'.$value12['shopcate_id']} as $key => $value13) {
                                if ($value13['product_id'] != $id) {
                                    foreach (${'relate_product_cate'.$value13['product_id']} as $key => $value14) {
                    ?>
                                        <div class="product-item">
                                            <div class="product-image">
                                                <a href="?controller=productdetail&id=<?php echo $value14['id'] ?>">
                                                    <img src="./image/<?php echo $value14["img_link"] ?>" alt="" srcset="">
                                                </a>
                                                <div class="d-flex text-center product-icon justify-content-center align-items-center">
                                                    <div class="d-flex wishlist w-50 justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fal fa-heart"></i></a></div>
                                                    <div class="vertical-line"></div>
                                                    <div class="d-flex quickview w-50 d-flex justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fal fa-search"></i></a></div>
                                                </div>
                                            </div>
                                            <div class="product-name">
                                                <a href="?controller=productdetail&id=<?php echo $value14['id'] ?>"><?php echo $value14["name"] ?></a>
                                            </div>
                                            <div class="product-price">
                                                <div><?php echo number_format ($value14['price'],0,",",".") ?>đ</div>
                                                <div class="addcart-btn"><a href="javascript:void(0)" data-id="<?php echo $value14['id'] ?>">THÊM VÀO GIỎ</a></div>
                                            </div>
                                        </div>
                    <?php }}}} ?>
                </div>
            </div>
        </div>
        <div class="addcart-response">
            <div class="addcart-response-box d-flex justify-content-center align-items-center h-100"></div>
        </div>
    </div>

<?php include_once('footer.php'); ?>