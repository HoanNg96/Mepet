<?php

    if(isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $product_image = $db->get('product_image', array('product_id' => $product_id));

        // xoa trong product_price
            $db->delete('product_price', array('product_id' => $product_id));
        // xoa trong product_option
            $db->delete('product_option', array('product_id' => $product_id));
        // xoa trong product_image
            foreach ($product_image as $key => $value) {
                unlink('../image/'.$value['img_link'].'');
            }
            $db->delete('product_image', array('product_id' => $product_id));
        // xoa trong product_cate
            $db->delete('product_cate', array('product_id' => $product_id));
        // xoa trong products
            $db->delete('products', array('id' => $product_id));
            
        header('location: ?controller=products');
    }

?>