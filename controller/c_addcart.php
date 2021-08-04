<?php

    if(isset($_POST['cid'])) {
        $id = $_POST['cid'];

        if(isset($_POST['cquantity'])) {
            $add_quantity = $_POST['cquantity'];
        }
        else {
            $add_quantity = 1;
        }

        if ( (isset($_POST['cweight'])) && (isset($_POST['csize'])) && (isset($_POST['ccolor'])) ) {
            $weight_id = $_POST['cweight'];
            $color_id = $_POST['ccolor'];
            $size_id = $_POST['csize'];
        }
        else {
            $default = get('product_price', array('*'), array('option_weight_value_order =' => 1,'option_size_value_order =' => 1,'option_color_value_order =' => 1), array(), '', '', '', '');
            $weight_id = $default[0]['option_weight_value_id'];
            $size_id = $default[0]['option_size_value_id'];
            $color_id = $default[0]['option_color_value_id'];
        }

        $condition = array('product_price.option_weight_value_id =' => $weight_id,'product_price.option_size_value_id =' => $size_id,'product_price.option_color_value_order =' => $color_id, 'products.id =' => $id);

        $product = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('*'), 'products', 'id', 'left', 'product_id', $condition, array('product_image.img_link' => '%-1.%'), '', '', '','');

        if(isset($_SESSION['cart'])) {
            if(isset($_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id])) {
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['sl']+=$add_quantity;
            }
            else {
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['sl'] = $add_quantity;
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['name'] = $product[0]['name'];
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['weight'] = $product[0]['option_weight_value_id'];
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['color'] = $product[0]['option_color_value_id'];
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['size'] = $product[0]['option_size_value_id'];
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['price'] = $product[0]['price'];
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['img_link'] = $product[0]['img_link'];
                $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['id'] = $id;
            }
        }
        else {
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['sl'] = $add_quantity;
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['name'] = $product[0]['name'];
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['weight'] = $product[0]['option_weight_value_id'];
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['color'] = $product[0]['option_color_value_id'];
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['size'] = $product[0]['option_size_value_id'];
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['price'] = $product[0]['price'];
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['img_link'] = $product[0]['img_link'];
            $_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]['id'] = $id;
        }

        $cart_num = count($_SESSION['cart']);
        echo json_encode( array('status' => 'success', 'cart_num' => $cart_num) );
    }
    else {
        if(isset($_SESSION['cart'])) {
            $cart_num = count($_SESSION['cart']);
        }
        else {
            $cart_num = 0;
        }
        echo json_encode( array('status' => 'fail', 'cart_num' => $cart_num) );
    }

?>