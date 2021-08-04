<?php

    if(isset($_POST['ckeyword']) && !empty($_POST['ckeyword'])) {
        $keyword = $_POST['ckeyword'];
        $search_result = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', array('product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1), array('product_image.img_link' => '%-1.%', 'products.name' => '%'.$keyword.'%'), '', '', '','');
        if (empty($search_result)) {
            echo '
                <div class="col-12 text-center" style="font-size: 1.2rem;">
                    Không tìm thấy sản phẩm phù hợp
                </div>
                ';
        }
        else {
            foreach ($search_result as $key => $value) {
                echo '
                <div class="col-lg-4 col-sm-6">
                    <div class="search-product-info d-flex">
                        <div class="search-product-info-img">
                            <a href="?controller=productdetail&id='.$value['id'].'">
                                <img src="./image/'.$value['img_link'].'" alt="">
                            </a>
                        </div>
                        <div class="w-100">
                            <div class="search-product-info-name">
                                <a href="?controller=productdetail&id='.$value['id'].'">'.$value['name'].'</a>
                            </div>
                            <div class="search-product-info-price">'.$value['price'].'</div>
                        </div>
                    </div>
                </div>
                ';
            }
        }
    }

?>