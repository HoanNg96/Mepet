<?php

    $products_sold = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', array('product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1), array('product_image.img_link' => '%-1.%'), 'products.total_sold', 'DESC', '8','');
    $products_rate = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', array('product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1), array('product_image.img_link' => '%-1.%'), 'products.rate', 'DESC', '8','');
    $products_new = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', array('product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1), array('product_image.img_link' => '%-1.%'), 'products.addtime', 'DESC', '8','');
    $products_slide = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', array('product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1), array('product_image.img_link' => '%-1.%'), 'products.id', 'ASC', '6','');

    require_once('./view/v_home.php');
?>