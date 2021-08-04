<?php include_once('header.php'); ?>

<div id="test-ajax"></div>
<div class="content">
    <div class="content-header"></div>
    <div class="content-main container-fluid">
        <nav aria-label="breadcrumb" class="mt-2">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </nav>
        <div class="main-collection">
            <div class="collection-control row mb-5">
                <div class="filter col-lg-8 col-md-6 col-12">
                    <a href="" id="open-m-filter" class="d-lg-none d-inline-flex">
                        <i class="fal fa-filter"></i>
                        <span>Lọc sản phẩm</span>
                    </a>
                </div>
                <div class="filter-shortby col-lg-4 col-md-6 col-12">
                    <div class="collection-sorting text-right">
                        <div class="dropdown d-inline-block">
                            <button class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenuLink" aria-expanded="false">
                                <span class="dropdown-label">Sắp xếp</span>
                                <span class="dropdown-icon"><i class="fas fa-caret-down"></i></span>
                            </button>
                            <ul class="dropdown-content dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 42px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <li><a href="">Mặc định</a></li>
                                <li><a href="">Sản phẩm mới</a></li>
                                <li><a href="">Sản phẩm bán chạy</a></li>
                                <li><a href="">Đánh giá cao</a></li>
                                <li><a href="">Giá từ thấp tới cao <i class="fal fa-long-arrow-up"></i></a></li>
                                <li><a href="">Giá từ cao tới thấp <i class="fal fa-long-arrow-down"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collection-products row">
                <div id="m-filter-bar" class="container-fluid">
                    <div class="row">
                        <div class="filter-bar col-12 col-sm-9 col-md-6 main-m-filter">
                            <a href="" id="close-m-filter"><i class="fal fa-times"></i></a>
                            <!-- <div class="filter-cate filter-list">
                                <div class="filter-title">
                                    <h5 class="mb-0">Phân loại</h5>
                                </div>
                                <div class="filter-content">
                                    <form id="m-filter-cate-form">
                                        <ul>
                                            <?php 
                                                foreach($first_cate as $key => $value) {
                                            ?>
                                                <li>
                                                <label><input type="checkbox" name="filter-cate" value="<?php echo $value['id'] ?>" <?php if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) { if(in_array($value['id'], $filter_cate_data_array)) {echo 'checked';} } ?>> <?php echo $value['shopcate_name'] ?></label>
                                                <ul class="child-checkbox">
                                                    <?php
                                                        foreach(${'second_cate'.$value['id']} as $key => $value1) {
                                                    ?>
                                                        <li>
                                                            <div class="d-flex">
                                                                <label><input type="checkbox" name="filter-cate" value="<?php echo $value1['id'] ?>" <?php if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) { if(in_array($value1['id'], $filter_cate_data_array)) {echo 'checked';} } ?>> <?php echo $value1['shopcate_name'] ?></label>
                                                                <a href="javascript:void(0)" class="accordion1 text-right w-100"><i class="far fa-chevron-right"></i></a>
                                                            </div>
                                                            <ul class="panel child-checkbox">
                                                                <?php
                                                                    foreach (${'third_cate'.$value1['id']} as $key => $value2) {
                                                                ?>
                                                                    <li><label><input type="checkbox" name="filter-cate" value="<?php echo $value2['id'] ?>" <?php if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) { if(in_array($value2['id'], $filter_cate_data_array)) {echo 'checked';} } ?>> <?php echo $value2['shopcate_name'] ?></label></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div class="filter-brand filter-list">
                                <div class="filter-title">
                                    <h5 class="mb-0">Thương hiệu</h5>
                                </div>
                                <div class="filter-content">
                                    <form id="m-filter-brand-form">
                                        <?php foreach ($product_brand as $key => $value) { ?>
                                            <label><input type="checkbox" name="filter-brand" value="<?php echo $value['id'] ?>" <?php if(isset($_GET['filter_brand']) && !empty($_GET['filter_brand'])) { if(in_array($value['id'], $filter_brand_data_array)) {echo 'checked';} } ?>> <?php echo $value['brand_name'] ?></label>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <div class="filter-price filter-list">
                                <div class="filter-title">
                                    <h5 class="mb-0">Mức giá</h5>
                                </div>
                                <div class="filter-content">
                                    <form id="m-filter-price-form">
                                        <label><input type="radio" name="filter-price" value="1" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 1) {echo 'checked';}} else {echo 'checked';} ?>> Tất cả mức giá</label>
                                        <label><input type="radio" name="filter-price" value="2" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 2) {echo 'checked';}} ?>> Dưới 100.000đ</label>
                                        <label><input type="radio" name="filter-price" value="3" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 3) {echo 'checked';}} ?>> 100.000đ - 200.000đ</label>
                                        <label><input type="radio" name="filter-price" value="4" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 4) {echo 'checked';}} ?>> 200.000đ - 300.000đ</label>
                                        <label><input type="radio" name="filter-price" value="5" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 5) {echo 'checked';}} ?>> 300.000đ - 500.000đ</label>
                                        <label><input type="radio" name="filter-price" value="6" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 6) {echo 'checked';}} ?>> 500.000đ - 1.000.000đ</label>
                                        <label><input type="radio" name="filter-price" value="7" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 7) {echo 'checked';}} ?>> Trên 1.000.000đ</label>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                        <div id="m-close-filter" class="close-blank col-0 col-sm-3 col-md-6"></div>
                    </div>
                </div>
                <div class="filter-bar col-lg-3 d-none d-lg-block">
                    <div class="filter-cate filter-list">
                        <div class="filter-title">
                            <h5 class="mb-0">Phân loại</h5>
                        </div>
                        <div class="filter-content">
                            <form id="filter-cate-form">
                                <ul>
                                    <?php 
                                        foreach($first_cate as $key => $value) {
                                    ?>
                                        <li>
                                        <label><input type="checkbox" name="filter-cate" value="<?php echo $value['id'] ?>" <?php if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) { if(in_array($value['id'], $filter_cate_data_array)) {echo 'checked';} } ?>> <?php echo $value['shopcate_name'] ?></label>
                                        <ul class="child-checkbox">
                                            <?php
                                                foreach(${'second_cate'.$value['id']} as $key => $value1) {
                                            ?>
                                                <li>
                                                    <div class="d-flex">
                                                        <label><input type="checkbox" name="filter-cate" value="<?php echo $value1['id'] ?>" <?php if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) { if(in_array($value1['id'], $filter_cate_data_array)) {echo 'checked';} } ?>> <?php echo $value1['shopcate_name'] ?></label>
                                                        <a href="javascript:void(0)" class="accordion1 text-right w-100"><i class="far fa-chevron-right"></i></a>
                                                    </div>
                                                    <ul class="panel child-checkbox">
                                                        <?php
                                                            foreach (${'third_cate'.$value1['id']} as $key => $value2) {
                                                        ?>
                                                            <li><label><input type="checkbox" name="filter-cate" value="<?php echo $value2['id'] ?>" <?php if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) { if(in_array($value2['id'], $filter_cate_data_array)) {echo 'checked';} } ?>> <?php echo $value2['shopcate_name'] ?></label></li>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="filter-brand filter-list">
                        <div class="filter-title">
                            <h5 class="mb-0">Thương hiệu</h5>
                        </div>
                        <div class="filter-content">
                            <form id="filter-brand-form">
                                <?php foreach ($product_brand as $key => $value) { ?>
                                    <label><input type="checkbox" name="filter-brand" value="<?php echo $value['id'] ?>" <?php if(isset($_GET['filter_brand']) && !empty($_GET['filter_brand'])) { if(in_array($value['id'], $filter_brand_data_array)) {echo 'checked';} } ?>> <?php echo $value['brand_name'] ?></label>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <div class="filter-price filter-list">
                        <div class="filter-title">
                            <h5 class="mb-0">Mức giá</h5>
                        </div>
                        <div class="filter-content">
                            <form id="filter-price-form">
                                <label><input type="radio" name="filter-price" value="1" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 1) {echo 'checked';}} else {echo 'checked';} ?>> Tất cả mức giá</label>
                                <label><input type="radio" name="filter-price" value="2" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 2) {echo 'checked';}} ?>> Dưới 100.000đ</label>
                                <label><input type="radio" name="filter-price" value="3" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 3) {echo 'checked';}} ?>> 100.000đ - 200.000đ</label>
                                <label><input type="radio" name="filter-price" value="4" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 4) {echo 'checked';}} ?>> 200.000đ - 300.000đ</label>
                                <label><input type="radio" name="filter-price" value="5" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 5) {echo 'checked';}} ?>> 300.000đ - 500.000đ</label>
                                <label><input type="radio" name="filter-price" value="6" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 6) {echo 'checked';}} ?>> 500.000đ - 1.000.000đ</label>
                                <label><input type="radio" name="filter-price" value="7" <?php if(isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {if($filter_price_data == 7) {echo 'checked';}} ?>> Trên 1.000.000đ</label>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="filter-products col-lg-9 col-12">
                    <div id="collection-product">
                        <div class="row">
                            <?php
                                if(count($product_page) == 0) {
                            ?>
                                <div class="w-100 text-center" style="font-size: 1.5rem;">Rất tiếc, không tìm thấy sản phẩm phù hợp!</div>
                            <?php
                                }
                                else {
                                foreach ($product_page as $key => $value) {
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
                                            <div class="addcart-btn"><a href="" data-id="<?php echo $value['id'] ?>">THÊM VÀO GIỎ</a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php }} ?>
                        </div>
                    </div>
                    <div class="product-page mt-5 d-flex justify-content-center w-100">
                        <form id="collection-page-form" class="d-flex">
                            <?php if($page_number>0) { 
                                if($page>1 && $page_number>1) { ?>
                                    <label><input type="radio" name="page" value="<?php echo ($page-1) ?>"><i class="fal fa-chevron-left"></i></label>
                                <?php } 
                                if($page>3) { ?>
                                    <label><input type="radio" name="page" value="1">1</label>
                                    <span>...</span>
                                <?php } 
                                if($page-2 > 0 ) { ?>
                                    <label><input type="radio" name="page" value="<?php echo ($page-2) ?>"><?php echo ($page-2) ?></label>
                                <?php } 
                                if($page-1 > 0 ) { ?>
                                    <label><input type="radio" name="page" value="<?php echo ($page-1) ?>"><?php echo ($page-1) ?></label>
                                <?php } ?>
                                    <label class="current-page"><input type="radio" name="page" value="<?php echo ($page) ?>"><?php echo $page ?></label>
                                <?php if($page+1 < $page_number+1 ) { ?>
                                    <label><input type="radio" name="page" value="<?php echo ($page+1) ?>"><?php echo ($page+1) ?></label>
                                <?php } 
                                if($page+2 < $page_number+1 ) { ?>
                                    <label><input type="radio" name="page" value="<?php echo ($page+2) ?>"><?php echo ($page+2) ?></label>
                                <?php } 
                                if($page < $page_number-2 ) { ?>
                                    <span>...</span>
                                    <label><input type="radio" name="page" value="<?php echo $page_number ?>"><?php echo $page_number ?></label>
                                <?php } 
                                if($page<$page_number && $page_number > 1) { ?>
                                    <label><input type="radio" name="page" value="<?php echo ($page+1) ?>"><i class="fal fa-chevron-right"></i></label>
                                <?php }
                            } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="addcart-response">
        <div class="addcart-response-box d-flex justify-content-center align-items-center h-100"></div>
    </div>
</div>

<?php include_once('footer.php'); ?>