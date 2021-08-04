<?php

    if( isset($_POST['corderid']) ) {
        $order_id = $_POST['corderid'];
        $user_order = get ('shop_order', array('*'), array('id =' => $order_id), array(), '', '', '', '');
        $user_order_detail = get ('shop_order_detail', array('*'), array('order_id =' => $order_id), array(), '', '', '', '');
        $datetime = $user_order[0]['create_time'];
        $newdatetime = new DateTime($datetime);
        foreach ($user_order_detail as $key => $value) {
            ${'product_img'.$value['product_id']} = get ('product_image', array('*'), array('product_id =' => $value['product_id']), array('product_image.img_link' => '%-1.%'), '', '', '', '');
            ${'product_name'.$value['product_id']} = get ('products', array('*'), array('id =' => $value['product_id']), array(), '', '', '', '');
        }

        $status = '';
        switch ($user_order[0]['status']) {
            case '0':
                $status = "Đang xử lý";
                break;
            case '1':
                $status = "Đang vận chuyển";
                break;
            case '2':
                $status = "Đã hoàn thành";
                break;
            default:
                $status = 'Lỗi hệ thống';
            break;
        }

        $result = '';
        $result .= '<div style="font-size: 1.2rem">Chi tiết đơn hàng #'.str_pad($user_order[0]['id'], 8, '0', STR_PAD_LEFT).' - <b>'.$status.'</b></div>';
        $result .= '<div class="order-detail-info mt-3">';
        $result .= '<div><b>Thời gian đặt hàng:</b> '.$newdatetime->format('H:i d-m-Y').'</div>';
        $result .= '<div><b>Người nhận:</b> '.$user_order[0]['full_name'].'</div>';
        $result .= '<div><b>Số điện thoại:</b> '.$user_order[0]['phone'].'</div>';
        $result .= '<div><b>Email:</b> '.$user_order[0]['email'].'</div>';
        $result .= '<div><b>Địa chỉ giao hàng:</b> '.$user_order[0]['address'].'</div>';
        $result .= '</div>';
        $result .= '<table class="table mt-4" id="detail-order-table">';
        $result .= '<thead class="thead-light">';
        $result .= '<tr>';
        $result .= '<th scope="col" colspan="2" class="text-center">Sản phẩm</th>';
        $result .= '<th scope="col" class="text-center">Giá</th>';
        $result .= '<th scope="col" class="text-center">Số lượng</th>';
        $result .= '<th scope="col" class="text-center">Thành tiền</th>';
        $result .= '</tr>';
        $result .= '</thead>';
        $result .= '<tbody>';
        foreach($user_order_detail as $key => $value) {
            $result .= '<tr>';
            $result .= '<td class="cart-image"><a href="?controller=productdetail&id='.$value['product_id'].'"><img src="./image/'.${'product_img'.$value['product_id']}[0]['img_link'].'" alt="" style="width: 100px"></a></td>';
            $result .= '<td><div><a href="?controller=productdetail&id='.$value['product_id'].'">'.${'product_name'.$value['product_id']}[0]['name'].'</a></div><div>'.$value['product_option'].'</div></td>';
            $result .= '<td class="text-center">'.number_format ($value['price'],0,",",".").'đ</td>';
            $result .= '<td class="text-center">'.$value['quantity'].'</td>';
            $result .= '<td class="text-center">'.number_format ($value['total_price'],0,",",".").'đ</td>';
            $result .= '</tr>';
        }
        $result .= '</tbody>';
        $result .= '</table>';
        $result .= '<div class="text-right"><b>Tổng cộng: '.number_format ($user_order[0]['total_order'],0,",",".").'đ</b></div>';

        echo ($result);
    }

?>