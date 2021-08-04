<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin',array('id'=>$_SESSION['ss_admin_nhanvien']));
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	//Lấy id trên thanh url
	$id = $_GET['id'];

	$product = $db->getimg('products',array('id'=>$id, "option_weight_value_order"=>1, "option_size_value_order"=>1, "option_color_value_order"=>1),array('img_link'=> "%-1.%"));


	$product_cate = $db->getdetail('product_cate',array('product_id'=>$id));
// var_dump($product_cate);
	//Lấy dữ liệu catalog của product đó
	// $product_cate1 = $db->get('product_cate',array('product_id'=>$product_cate[0]['product_id']));

    // $shopcate = $db->get('shop_cate',array('product_id'=>$product_cate[0]['shopcate_id']));
	//lấy dữ liệu những sản phẩm liên quan theo catalog_id của sản phẩm đó chỉ lấy 4 sản phẩm 
	// $product_lienquan = $db->get_limit('product',array('catalog_id'=>$product[0]['catalog_id']),4);
	require_once('./view/V_product_detail.php');
?>