<?php
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin',array('id'=>$_SESSION['ss_admin_nhanvien']));
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	//Lấy dữ liệu ở trong bảng product
	
	if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
		//Nếu có tồn tại thì mình sẽ lấy dữ liệu theo tên người dùng tìm kiếm
		$product = $db->getimg('products',array( "option_weight_value_order"=>1, "option_size_value_order"=>1, "option_color_value_order"=>1),array('img_link'=> "%-1.%",'name'=> "%".$keyword."%"));
	}else{
		//Nếu không tồn tại thì sẽ lấy tất cả dữ liệu trong bảng product
		$product = $db->getimg('products',array( "option_weight_value_order"=>1, "option_size_value_order"=>1, "option_color_value_order"=>1),array('img_link'=> "%-1.%"));
	}
	
	require_once('./view/V_products.php');
?>  