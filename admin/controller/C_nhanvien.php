<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Lấy dữ liệu nhân viên
	 	$data_nhanvien = $db->get('admin',array('level'=>2));
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	require_once('./view/V_nhanvien.php');
?>