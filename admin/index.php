<?php 
	//Bắt đầu session
	session_start();
	//require fle database.php vào
	require('./model/database.php');
	//Tạo dối tượng $db
	$db = new database();
	//kiểm tra xem trên đường link có controller= chưa
	if (isset($_GET['controller'])) {
		//Nếu có thì lấy giá trị đó
		$controller = $_GET['controller'];
	}else{
		//nếu không thì mặc định là login
		$controller = 'login';
	}
	//Kiểm tra biến $controller bằng gì để require file tương ứng
	switch ($controller) {
		case 'login':
			require_once('./controller/C_login.php');
			break;
		case 'user':
			require_once('./controller/C_user.php');
			break;
		case 'trangchu':
			require_once('./controller/C_trangchu.php');
			break;
		case 'log_out':
			require_once('./controller/C_log_out.php');
			break;
		case 'products':
			require_once('./controller/C_products.php');
			break;
		case 'chitiet':
			require_once('./controller/C_product_detail.php');
			break;
		case 'add_product':
			require_once('./controller/C_add_product.php');
			break;
		case 'change_product':
			require_once('./controller/C_change_product.php');
			break;
		case 'delpd':
			require_once('./controller/C_delete_product.php');
			break;
		case 'xuli_product':
			require_once('./controller/C_xuli_product.php');
			break;
		case 'nhanvien':
			require_once('./controller/C_nhanvien.php');
			break;
		case 'add_nhanvien':
			require_once('./controller/C_add_nhanvien.php');
			break;
		case 'xuli_nhanvien':
			require_once('./controller/C_xuli_nhanvien.php');
			break;
		default:
			echo "lỗi trang";
			break;
	}
?>