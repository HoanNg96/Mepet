<?php

    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $user_info = get ('user', array('*'), array('id =' => $user), array(), '', '', '', '');
        $user_order = get ('shop_order', array('*'), array('user_id =' => $user), array(), '', '', '', '');

        $order_all_num = count($user_order);
        $order_num_per_page = 5;
        $page_number = ceil($order_all_num/$order_num_per_page);
        $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
        if($page>$page_number) {
            $page = $page_number;
        }
        else if ($page < 1) {
            $page = 1;
        }

        $user_order_page = array_slice ($user_order, ($page-1)*$order_num_per_page, $order_num_per_page);

        foreach ($user_order_page as $key => $value) {
            ${'user_order_detail'.$value['id']} = getjoin2 ('products', array('*'), 'shop_order_detail', array('*'), 'left', 'id', 'product_id', array('order_id =' => $value['id']), array(), '', '', '', '');

            ${'order_id'.$value['id']} = str_pad($value['id'], 8, '0', STR_PAD_LEFT);
            ${'datetime'.$value['id']} = $value['create_time'];
            ${'date'.$value['id']} = new DateTime(${'datetime'.$value['id']});
            ${'status'.$value['id']} = '';
            switch ($value['status']) {
                case '0':
                    ${'status'.$value['id']} = "Đang xử lý";
                    break;
                case '1':
                    ${'status'.$value['id']} = "Đang vận chuyển";
                    break;
                case '2':
                    ${'status'.$value['id']} = "Đã hoàn thành";
                    break;
                default:
                    ${'status'.$value['id']} = 'Lỗi hệ thống';
                break;
            }
        }

        require_once('./view/v_account.php');
    }
    else {
        require_once('./view/v_error.php');
    }

?>