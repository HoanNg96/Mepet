<?php
    if( isset($_SESSION['cart']) ) {
        foreach ($_SESSION['cart'] as $key => $value){

            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'weight', 'option_value_id =' => $value['weight']), array(), '', '', '', '');
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'size', 'option_value_id =' => $value['size']), array(), '', '', '', '');
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'color', 'option_value_id =' => $value['color']), array(), '', '', '', '');
            
        }
    }
    require_once('./view/v_cart.php');
?>