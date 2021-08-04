<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
	 	$user = $db->get('admin',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Kiểm tra có phải là admin không
	 	if ($user[0]['level']==1) {
	 		//Kiểm tra người dùng có ấn nút xác nhận không
	 		if (isset($_POST['btn_create'])) {
	 			//Lấy dữ liệu người dùng nhập vào
	 			$username = $_POST['username'];
	 			$password = $_POST['password'];
	 			$email = $_POST['email'];
	 			//Kiểm tra dữ liệu người dùng nhập
				//Bước 1: Tạo 1 biến lỗi cho nó là mảng
				$error= array();
				//Bước 2: Kiểm tra xem tài khoản có trống không
				if ($email=='') {
					$error['email']="Email không được để trống";
				}
				//Bước 3: Kiểm tra xem mật khẩu có rỗng không 
				if ($password=='') {
					$error['password']="Mật khẩu không được để trống";
				}
				//Bước 4: Kiểm tra xem họ tên có trống không
				if ($username=='') {
					$error['username']="Tên nhân viên không được để trống";
				}
				//Bước 5: kiểm tra xem tên đăng nhập có trùng không
				if (!$error) {
					$nhanvien_create = $db->get('admin',array('email'=>$email));
					if (!empty($nhanvien_create)) {
						$error['email']="Tài khoản đã được sử dụng";
					}
				}
				//Bước 6: insert vào cơ sở dữ liệu
				if (!$error) {
					$db->insert('admin',array(
						'email'=>$email,
						'password'=>$password,
						'username'=>$username,
						'level'=>2
					));
					//CHuyển về trang nhân viên
					header('location: ?controller=nhanvien');
				}
				
	 		}
	 	}else{
	 		//Nếu không phải admin thì cho về trang nhan viên
	 		header('location: ?controller=nhanvien');
	 	}
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	require_once('./view/V_add_nhanvien.php');
?>