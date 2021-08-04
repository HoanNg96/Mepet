<?php

    if(isset($_POST['cnew_quantity'])) {
        $new_quantity = $_POST['cnew_quantity'];
        $cart_item = $_POST['citem'];
        $_SESSION['cart'][$cart_item]['sl'] = $new_quantity;
        echo 'success';

        /* $response = '';
        $total_cart = 0;
        $i = 0; */
        /* foreach($_SESSION['cart'] as $key => $value) {
            $i = $i + 1;
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'weight', 'option_value_id =' => $value['weight']), array(), '', '', '', '');
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'size', 'option_value_id =' => $value['size']), array(), '', '', '', '');
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'color', 'option_value_id =' => $value['color']), array(), '', '', '', '');

            $response .= '<tr class="cart-item">';
            $response .= '<td class="cart-no">'.$i.'.</td>';
            $response .= '<td scope="row" class="cart-image" data-label="Tên Sản Phẩm"><a href="?controller=productdetail&id='.$value['id'].'"><img src="./image/'.$value['img_link'].'" alt="" style="width: 100px"></a></td>';
            $response .= '<td class="text-left">';
            $response .= '<div class="cart-product-name"><a href="?controller=productdetail&id='.$value['id'].'">'.$value['name'].'</a></div>';
            $response .= '<div class="cart-product-option">';
            if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}) == 1 ) {
                $response .= '<div><span>Cân nặng: </span>'.${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}[0]['option_value'].'</div>';
            }
            if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}) == 1 ) {
                $response .= '<div><span>Kích cỡ: </span>'.${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}[0]['option_value'].'</div>';
            }
            if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}) == 1 ) {
                $response .= '<div><span>Màu sắc: </span>'.${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}[0]['option_value'].'</div>';
            }
            $response .= '</div>';
            $response .= '</td>';
            $response .= '<td data-label="Giá">'.number_format ($value['price'],0,",",".").'đ</td>';
            $response .= '<td data-label="Số Lượng">';
            $response .= '<div class="change-cart-quantity">';
            $response .= '<a href="" class="inc-quantity"><i class="fal fa-plus"></i></a>';
            $response .= '<input type="number" min="1" max="99" value="'.$value['sl'].'" step="1" class="change-cart-quantity-number" id="'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'">';
            $response .= '<a href="" class="dec-quantity"><i class="fal fa-minus"></i></a>';
            $response .= '</div>';
            $response .= '</td>';
            $response .= '<td data-label="Tổng">'.number_format($value['price']*$value['sl'],0,",",".").'đ</td>';
            $response .= '<td>';
            $response .= '<a href="?controller=delcart&id='.$value['id'].'&weight='.$value['weight'].'&color='.$value['color'].'&size='.$value['size'].'" class="del-cart"><i class="fal fa-times"></i></a>';
            $response .= '</td>';
            $response .= '</tr>';
            $total_cart .= $value['sl']*$value['price'];

        } */

        /* echo json_encode( array('response' => $response, 'total' => number_format ($total_cart,0,",",".") ) ); */
    }

?>