<?php

    if( isset($_POST['comail']) && isset($_POST['coname']) && isset($_POST['cophone']) && isset($_POST['coaddress']) ) {
        $full_name = $_POST['coname'];
        $address = $_POST['coaddress'];
        $phone = $_POST['cophone'];
        $email = $_POST['comail'];
        $order_id = 1;
        $data_order = get('shop_order', array('*'),array(),'','id','desc','1','');
        foreach ($data_order as $key => $value) {
            $order_id += $value['id'];
        }
        if( isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        else {
            $user = 1;
        }
        $order_time = date("Y-m-d H:i:s");
        insert('shop_order',array(
            'id' => $order_id,
            'user_id' => $user,
            'full_name' => '',
            'address' => '',
            'phone' => '',
            'email' => '',
            'total_order' => 0,
            'create_time' => $order_time,
            'status' => 0
        ));

        foreach ($_SESSION['cart'] as $key => $value) {
            $option = '';
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'weight', 'option_value_id =' => $value['weight']), array(), '', '', '', '');
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'size', 'option_value_id =' => $value['size']), array(), '', '', '', '');
            ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'} = getjoin2 ('product_option', array('*'), 'option_type', array('option_name'), 'left', 'option_type_id', 'option_id', array('product_id =' => $value['id'], 'option_name =' => 'color', 'option_value_id =' => $value['color']), array(), '', '', '', '');

            if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}) == 1 ) {
                $option .= "C??n n???ng:".${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}[0]['option_value']." ";
            }
            if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}) == 1 ) {
                $option .= "K??ch c???:".${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}[0]['option_value']." ";
            }
            if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}) == 1 ) {
                $option .= "M??u s???c:".${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}[0]['option_value']." ";
            }

            insert('shop_order_detail',array(
                'order_id' => $order_id,
                'product_id' => $value['id'],
                'product_option' => $option,
                'quantity' => $value['sl'],
                'price' => $value['price'],
                'total_price' => $value['sl']*$value['price']
            ));
        }

        $order_detail = get('shop_order_detail', array('*'),array('order_id =' => $order_id),'','','','','');

        $amount = 0;
        foreach ($order_detail as $key => $value) {
            $amount += $value['total_price'];
        }
        update('shop_order', array('full_name' => $full_name, 'address' => $address, 'phone' => $phone, 'email' => $email, 'total_order' => $amount, 'status' => 0), array('id' => $order_id));

        //G???i email cho ng?????i d??ng
		//Chu???n b??? c???u tr??c th?? g???i cho ng?????i mua
		//B?????c 1: chu???n b??? ph???n th??ng tin ng?????i nh???n
		/* $content= '<p>Ng?????i nh???n :'.$full_name.'</p>';
		$content.= '<p>S??? ??i???n tho???i :'.$phone.'</p>';
		$content.= '<p>?????a ch??? ng?????i nh???n :'.$address.'</p>';
		$content.= '<p>T???ng ti???n :'.number_format($amount,0,",",".").'??</p>';
		$content.= '<table class="table cart-table text-center" id="cart-table">
        <thead>
            <tr>
                <th scope="col" colspan="2">S???N PH???M</th>
                <th scope="col">GI??</th>
                <th scope="col">S??? L?????NG</th>
                <th scope="col">T???NG</th>
                <td scope="col"><a href="?controller=delallcart" class="del-cart">
                <i class="fal fa-times"></i></a></td>
            </tr>
        </thead>
        <tbody>';
		//B?????c 2: L???p c??c s???n ph???m ng?????i d??ng mua ra
		foreach ($_SESSION['cart'] as $key => $value) {
			$content.= '<tr class="cart-item">
            <td scope="row" class="cart-image" data-label="T??n S???n Ph???m"><a href="?controller=productdetail&id='.$value['id'].'"><img src="./image/'.$value['img_link'].'" alt="" style="width: 100px"></a></td>
            <td class="text-left">
                <div class="cart-product-name"><a href="?controller=productdetail&id='.$value['id'].'">'.$value['name'].'</a></div>
                <div class="cart-product-option">';
        if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}) == 1 ) {
            $content .= '<div><span>C??n n???ng: </span>'.${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}[0]['option_value'].'</div>';
        }
        if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}) == 1 ) {
            $content .= '<div><span>K??ch c???: </span><'.${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}[0]['option_value'].'</div>';
        }
        if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}) == 1 ) {
            $content .= '<div><span>M??u s???c: </span>'.${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}[0]['option_value'].'</div>';
        }
                $content .= '</div>
            </td>
            <td data-label="Gi??">'.number_format ($value['price'],0,",",".").'??</td>
            <td data-label="S??? L?????ng">
                <div class="change-cart-quantity">
                    <a href="" class="inc-quantity"><i class="fal fa-plus"></i></a>
                    <input type="number" min="1" max="99" value="'.$value['sl'].'" step="1" class="change-cart-quantity-number" id="'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'">
                    <a href="" class="dec-quantity"><i class="fal fa-minus"></i></a>
                </div>
            </td>
            <td data-label="T???ng">'.number_format($value['price']*$value['sl'],0,",",".").'>??</td>
            <td>
                <a href="?controller=delcart&id='.$value['id'].'&weight='.$value['weight'].'&color='.$value['color'].'&size='.$value['size'].'" class="del-cart"><i class="fal fa-times"></i></a>
            </td>
        </tr>';
		}
		//B?????c 3:????ng th??? table
		$content.='</tbody>
		</table>';

		//B???t ?????u g???i th?? cho ng?????i mua
		try {
			    //Server settings
                $mail->SMTPDebug = 0;
			    $mail->CharSet = 'UTF-8'; // Enable verbose debug output
			    $mail->isSMTP(); // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
			    $mail->SMTPAuth   = true; // Enable SMTP authentication
			    $mail->Username   = 'mepetshop2021@gmail.com'; // SMTP username
			    $mail->Password   = '12345679mepet'; // SMTP password
			    $mail->SMTPSecure = 'tls'; // Enable TLS encryption;`PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 465; 

                $mail->setFrom('petcare@xxx.com', 'PETCARE');
                $mail->addAddress($email,$full_name);
			    // Content
			    $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'C??m ??n b???n ???? mua h??ng t???i Mepet Shop';
                $mail->Body    = $content;

                $mail->send();
                unset($_SESSION['cart']);
                header('location: ?controller=info_payment');
			}
        catch (Exception $e) {
			} */

        $check_order_detail = get('shop_order_detail', array('*'),array('order_id =' => $order_id),'','','','','');
        $check_order = get('shop_order', array('*'),array('id =' => $order_id),'','','','','');

        if ( count($check_order_detail) != 0 && count($check_order) != 0 ) {
            unset($_SESSION['cart']);
            echo "success";
        }
        else {
            echo "fail";
        }
    }
    else {
        echo "fail";
    }

?>