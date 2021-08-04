<?php

    if(isset($_POST['cloguser'])) {
        $loguser = $_POST['cloguser'];
        if($loguser == '') {
            echo 'Tên đăng nhập không được để trống';
        }
        elseif (isset($_POST['clogpass'])) {
            $logpass = $_POST['clogpass'];
            if ($logpass == '') {
                echo 'Mật khẩu không được để trống';
            }
            else {
                $user = get ('user', array('*'), array('username =' => $loguser, 'password =' => $logpass), array(), '', '', '', '');
                if( empty($user) || ($loguser == 'guests') ) {
                    echo 'Sai tên đăng nhập hoặc mật khẩu';
                }
                else {
                    $_SESSION['user'] = $user[0]['id'];
                    echo 'login success';
                }
            }
        }
    }

?>