<?php

    if(isset($_POST['creguser'])) {
        $reguser = $_POST['creguser'];
    }
    if(isset($_POST['cregemail'])) {
        $regemail = $_POST['cregemail'];
    }
    if(isset($_POST['cregpass'])) {
        $regpass = $_POST['cregpass'];
    }
    if(isset($_POST['cretyperegpass'])) {
        $retyperegpass = $_POST['cretyperegpass'];
    }

    if(isset($_POST['cid'])) {
        $typeid = $_POST['cid'];
        switch ($typeid) {
            case 'reguser':
                $case = '1';
                break;
            case 'regemail':
                $case = '2';
                break;
            case 'regpass':
                $case = '3';
                break;
            case 'retyperegpass':
                $case = '4';
                break;
        }

        switch ($case) {
            case '1':
                if ( !preg_match('/^[a-z\d_]{6,20}$/i', $reguser) ) {
                    echo 'Tên đăng nhập có thể gồm chữ cái, chữ số, dấu "_", dài từ 6-20 kí tự';
                }
                else {
                    $checkuser = get ('user', array('*'), array('username =' => $reguser), array(), '', '', '', '');
                    if( count($checkuser) != 0 ) {
                        echo 'Tên đăng nhập đã tồn tại';
                    }
                }
                break;
            case '2':
                if (!filter_var($regemail, FILTER_VALIDATE_EMAIL)) {
                    echo 'Địa chỉ email không hợp lệ, VD: abc@def.ghi';
                }
                else {
                    $checkemail = get ('user', array('*'), array('email =' => $regemail), array(), '', '', '', '');
                    if( count($checkemail) != 0) {
                        echo 'Email đã được sử dụng';
                    }
                }
                break;
            case '3':
                if ( (strlen($regpass) < 6) || (strlen($regpass) > 20) ) {
                    echo 'Mật khẩu phải từ 6-20 kí tự';
                }
                else {
                    echo '';
                }
                break;
            case '4':
                if ( ($regpass != $retyperegpass) || ($retyperegpass == '')) {
                    echo 'Mật khẩu xác nhận không trùng khớp';
                }
                break;
        }
    }


?>