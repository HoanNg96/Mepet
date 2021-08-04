<?php include_once('header.php'); ?>

    <div class="content">
        <div class="content-main">
            <div class="banner-slide owl-carousel owl-theme">
                <?php
                    $i=1;
                    do { 
                        echo '<div><img src="image/banner'.$i.'.jpg" alt="" srcset=""></div>';
                        $i++;
                    }
                    while ($i<=9)
                ?>
            </div>
            <div class="categorize">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 mb-3 cate-item">
                            <div class="cate-img">
                                <a href=""><img src="image/banner-v3-1.jpg" alt=""></a>
                                <div class="cate-banner">
                                    <h3>Sản Phẩm Cho Chó</h3>
                                    <p>Các đồ dùng hàng ngày</p>
                                </div>
                                <div class="cate-btn">
                                    <a href="">Khám phá</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3 cate-item">
                            <div class="cate-img">
                                <a href=""><img src="image/banner-v3-2.jpg" alt=""></a>
                                <div class="cate-banner">
                                    <h3>Sản Phẩm Cho Mèo</h3>
                                    <p>Các đồ dùng hàng ngày</p>
                                </div>
                                <div class="cate-btn">
                                    <a href="">Khám phá</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid products">
                <div class="text-banner text-center">
                    <h3>BỘ SẢN PHẨM MỚI</h3>
                    <p>Đừng bỏ lỡ các deal hot hôm nay</p>
                </div>
                <div class="products-slide owl-carousel owl-theme">
                    <?php
                        foreach ($products_slide as $key => $value) {
                    ?>
                        <div class="product-item">
                            <form id="ajax-product-item">
                                <div class="product-image">
                                    <a href="?controller=productdetail&id=<?php echo $value['id'] ?>">
                                        <img src="./image/<?php echo $value["img_link"] ?>" alt="" srcset="">
                                    </a>
                                    <div class="d-flex text-center product-icon justify-content-center align-items-center">
                                        <div class="d-flex wishlist w-50 justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fal fa-heart"></i></a></div>
                                        <div class="vertical-line"></div>
                                        <div class="d-flex quickview w-50 d-flex justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fal fa-search"></i></a></div>
                                    </div>
                                </div>
                                <div class="product-name">
                                    <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><?php echo $value["name"] ?></a>
                                </div>
                                <div class="product-price">
                                    <div><?php echo number_format ($value['price'],0,",",".") ?>đ</div>
                                    <div class="addcart-btn"><a href="javascript:void(0)" data-id="<?php echo $value['id'] ?>">THÊM VÀO GIỎ</a></div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>
                <div class="text-banner text-center">
                    <h3>Sản phẩm nổi bật</h3>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#feature-new" data-toggle="tab" class="nav-link active">HÀNG MỚI VỀ</a>
                        </li>
                        <li class="nav-item">
                            <a href="#feature-sold" data-toggle="tab" class="nav-link">BÁN CHẠY NHẤT</a>
                        </li>
                        <li class="nav-item">
                            <a href="#feature-rate" data-toggle="tab" class="nav-link">ĐÁNH GIÁ CAO</a>
                        </li>
                    </ul>
                </div>
                <div class="product-list tab-content">
                    <div id="feature-new" class="tab-pane active">
                        <div class="row">
                            <?php
                                foreach ($products_new as $key => $value) {
                            ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><img src="./image/<?php echo $value["img_link"] ?>" alt="" srcset=""></a>
                                        <div class="d-flex text-center product-icon justify-content-center align-items-center">
                                            <div class="d-flex wishlist w-50 justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fal fa-heart"></i></a></div>
                                            <div class="vertical-line"></div>
                                            <div class="d-flex quickview w-50 d-flex justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fal fa-search"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="product-name">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><?php echo $value["name"] ?></a>
                                    </div>
                                    <div class="product-price">
                                        <div><?php echo number_format ($value['price'],0,",",".") ?>đ</div>
                                        <div class="addcart-btn"><a href="javascript:void(0)" data-id="<?php echo $value['id'] ?>">THÊM VÀO GIỎ</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="feature-sold" class="tab-pane">
                        <div class="row">
                            <?php
                                foreach ($products_sold as $key => $value) {
                            ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><img src="./image/<?php echo $value["img_link"] ?>" alt="" srcset=""></a>
                                        <div class="d-flex text-center product-icon justify-content-center align-items-center">
                                            <div class="d-flex wishlist w-50 justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fal fa-heart"></i></a></div>
                                            <div class="vertical-line"></div>
                                            <div class="d-flex quickview w-50 d-flex justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fal fa-search"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="product-name">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><?php echo $value["name"] ?></a>
                                    </div>
                                    <div class="product-price">
                                        <div><?php echo number_format ($value['price'],0,",",".") ?>đ</div>
                                        <div class="addcart-btn"><a href="javascript:void(0)" data-id="<?php echo $value['id'] ?>">THÊM VÀO GIỎ</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div id="feature-rate" class="tab-pane">
                        <div class="row">
                            <?php
                                foreach ($products_rate as $key => $value) {
                            ?>
                            <div class="col-lg-3 col-md-4 col-6">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><img src="./image/<?php echo $value["img_link"] ?>" alt="" srcset=""></a>
                                        <div class="d-flex text-center product-icon justify-content-center align-items-center">
                                            <div class="d-flex wishlist w-50 justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fal fa-heart"></i></a></div>
                                            <div class="vertical-line"></div>
                                            <div class="d-flex quickview w-50 d-flex justify-content-center align-items-center"><a href="" data-toggle="tooltip" data-placement="top" title="Quickview"><i class="fal fa-search"></i></a></div>
                                        </div>
                                    </div>
                                    <div class="product-name">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><?php echo $value["name"] ?></a>
                                    </div>
                                    <div class="product-price">
                                        <div><?php echo number_format ($value['price'],0,",",".") ?>đ</div>
                                        <div class="addcart-btn"><a href="javascript:void(0)" data-id="<?php echo $value['id'] ?>">THÊM VÀO GIỎ</a></div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="addcart-response">
            <div class="addcart-response-box d-flex justify-content-center align-items-center h-100">
            <div class="addcart-fail">Thêm vào giỏ hàng thất bại, vui lòng thử lại</div>
            </div>
        </div>
    </div>

<?php include_once('footer.php'); ?>