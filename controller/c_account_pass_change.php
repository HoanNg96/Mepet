<?php

    if( isset($_POST['cconfirmpass']) && isset($_POST['cnewpass']) && isset($_POST['cretypenewpass']) && isset($_SESSION['user']) ) {
        $confirm_pass = $_POST['cconfirmpass'];
        $new_pass = $_POST['cnewpass'];
        $retype_new_pass = $_POST['cretypenewpass'];
        $user_id = $_SESSION['user'];

        if( $confirm_pass =='' ) {
            echo 'Mật khẩu hiện tại không được để trống';
        }
        else {
            $check_pass = get('user', array('*'), array('password =' => $confirm_pass, 'id =' => $user_id),array(), '', '', '', '');

            if( empty($check_pass) ) {
                echo 'Mật khẩu hiện tại không chính xác';
            }
            elseif ($new_pass == '') {
                echo "Vui lòng nhập mật khẩu mới";
            }
            elseif ( (strlen($new_pass) < 6) || (strlen($new_pass) > 20) ) {
                echo 'Mật khẩu mới phải từ 6-20 kí tự';
            }
            elseif ($retype_new_pass != $new_pass) {
                echo 'Xác nhận mật khẩu mới không trùng khớp';
            }
            else {
                update('user', array('password' => $new_pass), array('id' => $user_id));

                echo 'success';
            }
        }
    }
    else {
        require_once('./view/v_error.php');
    }

?>