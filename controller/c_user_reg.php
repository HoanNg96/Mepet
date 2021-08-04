<?php

    if( isset($_POST['creguser']) ) {
        $reguser = $_POST['creguser'];
        if ($reguser == '') {
            echo 'Tên đăng nhập không được để trống';
        }
        elseif ( !preg_match('/^[a-z\d_]{6,20}$/i', $reguser) ) {
            echo 'Tên đăng nhập có thể gồm chữ cái, chữ số, dấu "_", dài từ 6-20 kí tự';
        }
        else {
            $checkuser = get ('user', array('*'), array('username =' => $reguser), array(), '', '', '', '');
            if( count($checkuser) != 0 ) {
                echo 'Tên đăng nhập đã tồn tại';
            }
            elseif ( isset($_POST['cregemail']) ) {
                $regemail = $_POST['cregemail'];
                if ($regemail == '') {
                    echo 'Email không được để trống';
                }
                elseif (!filter_var($regemail, FILTER_VALIDATE_EMAIL)) {
                    echo 'Địa chỉ email không hợp lệ, VD: abc@def.ghi';
                }
                else {
                    $checkemail = get ('user', array('*'), array('email =' => $regemail), array(), '', '', '', '');
                    if( count($checkemail) != 0) {
                        echo 'Email đã được sử dụng';
                    }
                    elseif ( isset($_POST['cregpass']) ) {
                        $regpass = $_POST['cregpass'];
                        if ($regpass == '') {
                            echo 'Mật khẩu không được để trống';
                        }
                        elseif ( (strlen($regpass) < 6) || (strlen($regpass) > 20) ) {
                            echo 'Mật khẩu phải từ 6-20 kí tự';
                        }
                        elseif ( isset($_POST['cretyperegpass']) ) {
                            $retyperegpass = $_POST['cretyperegpass'];
                            if ( ($regpass != $retyperegpass) || ($retyperegpass == '')) {
                                echo 'Mật khẩu xác nhận không trùng khớp';
                            }
                            else {
                                $last_userid = get ('user', array('*'), array(), array(), 'id', 'desc', '1', '');
                                if(empty($last_userid)) {
                                    $new_userid = 1;
                                }
                                else {
                                    $new_userid = $last_userid[0]['id'] + 1;
                                }
                                $createuser_time = date("Y-m-d H:i:s");
                                insert('user', array('id' => $new_userid, 'username' => $reguser, 'password' => $regpass, 'full_name' => '', 'phone' => '', 'email' => $regemail, 'address' => '', 'create_time' => $createuser_time));
                                echo "Đăng ký thành công, vui lòng quay lại đăng nhập";
                            }
                        }
                    }
                }
            }
        }
    }

?>