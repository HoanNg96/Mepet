<?php

    if( isset($_POST['caemail']) && isset($_POST['caname']) && isset($_POST['caphone']) && isset($_POST['caaddress']) && isset($_SESSION['user']) ) {
        $new_email = $_POST['caemail'];
        $new_name = $_POST['caname'];
        $new_phone = $_POST['caphone'];
        $new_address = $_POST['caaddress'];
        $user_id = $_SESSION['user'];

        if ($new_email == '') {
            echo 'Email không được để trống';
        }
        elseif ( !filter_var($new_email, FILTER_VALIDATE_EMAIL) ) {
            echo 'Địa chỉ email không hợp lệ, VD: abc@def.ghi';
        }
        else {
            $check_email = get('user', array('*'), array('email =' => $new_email, 'id !=' => $user_id),array(), '', '', '', '');
            if( !empty($check_email) ) {
                echo 'Địa chỉ email đã được sử dụng';
            }
            elseif ($new_name == '') {
                echo 'Họ và tên không được để trống';
            }
            elseif ($new_phone == '') {
                echo 'Số điện thoại không được để trống';
            }
            elseif ( !preg_match('/^[0][0-9]{9,12}$/', $new_phone) ) {
                echo 'Số điện thoại không hợp lệ, VD: 0xxxx, 9-12 số';
            }
            else {
                $check_phone = get('user', array('*'), array('phone =' => $new_phone, 'id !=' => $user_id),array(), '', '', '', '');
                if ( !empty($check_phone) ) {
                    echo 'Số điện thoại đã được sử dụng';
                }
                elseif ($new_address == '') {
                    echo 'Địa chỉ không được để trống';
                }
                elseif ( preg_match('/[0-9]/', $new_address) && !preg_match('/[a-z]/i', $new_address) ) {
                    echo 'Địa chỉ không hợp lệ';
                }
                else {
                    update('user', array('full_name' => $new_name, 'phone' => $new_phone, 'email' => $new_email, 'address' => $new_address), array('id' => $user_id));

                    echo 'success';
                }
            }
        }
    }
    else {
        require_once('./view/v_error.php');
    }

?>