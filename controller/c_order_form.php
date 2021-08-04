<?php

    if( isset($_POST['comail']) && isset($_POST['coname']) && isset($_POST['cophone']) && isset($_POST['coaddress']) ) {
        $omail = $_POST['comail'];
        $oname = $_POST['coname'];
        $ophone = $_POST['cophone'];
        $oaddress = $_POST['coaddress'];

        if ($omail == '') {
            echo 'Email không được để trống';
        }
        elseif ( !filter_var($omail, FILTER_VALIDATE_EMAIL) ) {
            echo 'Địa chỉ email không hợp lệ, VD: abc@def.ghi';
        }
        elseif ($oname == '') {
            echo 'Họ và tên không được để trống';
        }
        elseif ($ophone == '') {
            echo 'Số điện thoại không được để trống';
        }
        elseif ( !preg_match('/^[0][0-9]{9,12}$/', $ophone) ) {
            echo 'Số điện thoại không hợp lệ, VD: 0xxxx, 9-12 số';
        }
        elseif ($oaddress == '') {
            echo 'Địa chỉ không được để trống';
        }
        elseif ( preg_match('/[0-9]/', $oaddress) && !preg_match('/[a-z]/i', $oaddress) ) {
            echo 'Địa chỉ không hợp lệ';
        }
        else {
            echo 'success';
        }
    }

?>