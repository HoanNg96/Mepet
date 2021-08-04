<?php 
	//Kiểm tra xem người dùng đã đăng nhập chưua
	if (isset($_SESSION['ss_admin_nhanvien'])) {
	 	//Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
		$user = $db->get('admin',array('id'=>$_SESSION['ss_admin_nhanvien']));
	 	//Kiểm tra có phải là admin không
		if ($user[0]['level']>=0) {
			if(isset($_GET['id'])) {
				$product_id = $_GET['id'];
			}
			$brand_list = $db->get('brand', array());
			$cate_list = $db->get2('shop_cate', array('*'), array('id >=' => 11), array(), '', '', '', '');

			$product_info = $db->get('products', array('id' => $product_id));
			$option_info = $db->get('product_option', array('product_id' => $product_id));
			if ( !empty($option_info) ) {
				switch ($option_info[0]['option_type_id']) {
					case 1:
						$option = 'weight';
						foreach ( $option_info as $key => $value ) {
							${'option_detail'.$value['option_value_id']} = $db->myget ('Select product_option.*, product_price.* FROM product_option left JOIN product_price on ( product_option.product_id = product_price.product_id) AND ( product_option.option_value_id = product_price.option_weight_value_id)', array('product_option.product_id =' => $product_id, 'product_price.option_weight_value_id =' => $value['option_value_id']), '', $search_condition = array(), '');
						}
						break;
					case 2:
						$option = 'color';
						foreach ( $option_info as $key => $value ) {
							${'option_detail'.$value['option_value_id']} = $db->myget ('Select product_option.*, product_price.* FROM product_option left JOIN product_price on ( product_option.product_id = product_price.product_id) AND ( product_option.option_value_id = product_price.option_color_value_id)', array('product_option.product_id =' => $product_id, 'product_price.option_color_value_id =' => $value['option_value_id']), '', $search_condition = array(), '');
						}
						break;
					case 3:
						$option = 'size';
						foreach ( $option_info as $key => $value ) {
							${'option_detail'.$value['option_value_id']} = $db->myget ('Select product_option.*, product_price.* FROM product_option left JOIN product_price on ( product_option.product_id = product_price.product_id) AND ( product_option.option_value_id = product_price.option_size_value_id)', array('product_option.product_id =' => $product_id, 'product_price.option_size_value_id =' => $value['option_value_id']), '', $search_condition = array(), '');
						}
						break;
					default:
						$option = 'none';
						break;;
				}
			}
			else {
				$no_option_info = $db->get('product_price', array('product_id' => $product_id));
			}
			$brand_info = $db->get('brand', array('id' => $product_info[0]['brand_id']));
			$cate_info = $db->get('product_cate', array('product_id' => $product_id));
			$image_info = $db->get('product_image', array('product_id' => $product_id));

			/* var_dump($image_info); */

	 		//Kiểm tra người dùng có ấn nút xác nhận không
			if (isset($_POST['btn_modify'])) {
				$error= array();
	 			//Lấy dữ liệu người dùng nhập vào
				$name = $_POST['name'];
				$brand = $_POST['brand'];
				$description = $_POST['description'];

				$cate = '';
				if(isset($_POST['newpd-cate']) && !empty($_POST['newpd-cate'])) {
					$cate = $_POST['newpd-cate'];
				}
				if ($cate == '') {
					$error['cate'] = "Phân loại không được để trống";
				}
				
				if ($option == 'none') {
					$quantity = $_POST['no-option-quantity'];
					$price = $_POST['no-option-price'];
					if($quantity == '' || $price == '') {
						$error_text = "Mục không được để trống";
						$sub_error_text = '';
						if ($quantity == '')  {
							$sub_error_text .= ' số lượng,';
						}
						if ($price == '')  {
							$sub_error_text .= ' giá,';
						}
						$sub_error_text = trim($sub_error_text,',');
						$error['option'] = substr_replace($error_text, $sub_error_text, 5, 0);
					}
				}
				if ($option == 'weight') {
					$weight_option_value = $_POST['weight-option-value'];
					$weight_option_quantity = $_POST['weight-option-quantity'];
					$weight_option_price = $_POST['weight-option-price'];
					foreach($weight_option_value as $x => $x_value) {
						${'weight_option_array'.$x}['value'] = $x_value;
					}
					foreach($weight_option_quantity as $x => $x_value) {
						${'weight_option_array'.$x}['quantity'] = $x_value;
					}
					foreach($weight_option_price as $x => $x_value) {
						${'weight_option_array'.$x}['price'] = $x_value;
					}
				}
				if ($option == 'size') {
					$size_option_value = $_POST['size-option-value'];
					$size_option_quantity = $_POST['size-option-quantity'];
					$size_option_price = $_POST['size-option-price'];
					foreach($size_option_value as $x => $x_value) {
						${'size_option_array'.$x}['value'] = $x_value;
					}
					foreach($size_option_quantity as $x => $x_value) {
						${'size_option_array'.$x}['quantity'] = $x_value;
					}
					foreach($size_option_price as $x => $x_value) {
						${'size_option_array'.$x}['price'] = $x_value;
					}
				}
				if ($option == 'color') {
					$color_option_value = $_POST['color-option-value'];
					$color_option_code = $_POST['color-option-code'];
					$color_option_quantity = $_POST['color-option-quantity'];
					$color_option_price = $_POST['color-option-price'];
					foreach($color_option_value as $x => $x_value) {
						${'color_option_array'.$x}['value'] = $x_value;
					}
					foreach($color_option_code as $x => $x_value) {
						${'color_option_array'.$x}['code'] = $x_value;
					}
					foreach($color_option_quantity as $x => $x_value) {
						${'color_option_array'.$x}['quantity'] = $x_value;
					}
					foreach($color_option_price as $x => $x_value) {
						${'color_option_array'.$x}['price'] = $x_value;
					}
				}

				$files = $_FILES['image'];
				$total = count($files['name']);
				$names      = $files['name'];
				$types      = $files['type'];
				$tmp_names  = $files['tmp_name'];
				$errors     = $files['error'];
				$sizes      = $files['size'];


				if ($names[0] != '') {
					// Loop through each file
					$blank = 0;
					$img_error = '';
					$numfiles = 0;

					for( $i=0 ; $i < $total ; $i++ ) {
						if ($sizes[$i] == 0) {
							$blank += 1;
						}
						elseif ($errors[$i] != 0) {
							$img_error .= ''.($i+1).',';
						}
						else {
							$numfiles++;
						}
						//Get the temp file path
						$tmpFilePath = $tmp_names[$i];
						//Make sure we have a file path
						if ($tmpFilePath == "") {
							$error['image'] = "Không thể lưu vào temp";
						}
					}

					$img_error = trim($img_error, ",");
					if($blank == $total) {
						$error['image'] = "Ảnh không được để trống";
					}
					elseif ($img_error != '') {
						$error['image'] .= "File ảnh số ".$img_error." upload không thành công";
					}
				}
				
				if ($name == '') {
					$error['name'] = "Tên sản phẩm không được để trống";
				}
				elseif ($name != $product_info[0]['name']) {
					$check_name = $db->get('products', array('name' => $name));
					if (!empty($check_name)) {
						$error['name'] = "Tên sản phẩm đã tồn tại";
					}
				}
				if ($brand == '') {
					$error['brand'] = "Tên thương hiệu không được để trống";
				}
				else {
					$check_brand = $db->get('brand', array('brand_name' => $brand));
					if (empty($check_brand)) {
						$lastbrand_id = $db->get2('brand', array('*'), array(), array(), 'id', 'desc', '1', '');
						$newbrand_id = 1;
						$newbrand_id += $lastbrand_id[0]['id'];
						$db->insert('brand',array('id'=>$newbrand_id, 'brand_name'=>$brand));
						$brand_id = $newbrand_id;
					}
					else {
						$brand_id = $check_brand[0]['id'];
					}
				}
				if ($description == '') {
					$error['description'] = "Mô tả không được để trống";
				}
				
				$check_option_error = 0;
				if ($option == 'weight') {
					foreach($weight_option_value as $x => $x_value) {
						if(count(array_filter(${'weight_option_array'.$x})) != count(${'weight_option_array'.$x})) {
							$check_option_error = 1;
						}
					}
				}
				elseif ($option == 'size') {
					foreach($size_option_value as $x => $x_value) {
						if(count(array_filter(${'size_option_array'.$x})) != count(${'size_option_array'.$x})) {
							$check_option_error = 1;
						}
					}
				}
				elseif ($option == 'color') {
					foreach($color_option_value as $x => $x_value) {
						if(count(array_filter(${'color_option_array'.$x})) != count(${'color_option_array'.$x})) {
							$check_option_error = 1;
						}
					}
				}
				if($check_option_error == 1) {
					$error['option'] = "Các trường không được để trống";
				}

				//Kiểm tra xem còn lỗi không
				if (!$error) {
					//update ảnh vào thư mục img
					// move_uploaded_file($img_link['tmp_name'], $target_file);
					//insert vào cơ sở dữ liệu thông tin người dùng nhập
					$updatepd_time = date("Y-m-d H:i:s");
					$db->update('products',array(
						'name' => $name,
						'brand_id' => $brand_id,
						'content' => $description,
						'last_update_time' => $updatepd_time
					), array('id' => $product_id));

					if($names[0] != '') {
						$db->delete('product_image', array('product_id' => $product_id));
						foreach ($image_info as $key => $value) {
							unlink('../image/'.$value['img_link'].'');
						}

						for( $i=0 ; $i < $numfiles ; $i++ ) {
							$path = $names[$i];
							$ext = pathinfo($path, PATHINFO_EXTENSION);
							$tmpFilePath = $tmp_names[$i];
							//Setup our new file path
							$newFilePath = "../image/" . 'product'.$product_id.'-'.($i+1).'.'.$ext;
							//Upload the file into the temp dir
							move_uploaded_file($tmpFilePath, $newFilePath);

							$img_link = 'product'.$product_id.'-'.($i+1).'.'.$ext;
							$db->insert('product_image',array(
								'product_id' => $product_id,
								'img_link' => $img_link
							));
						}
					}

					$db->delete('product_cate', array('product_id' => $product_id));
					foreach($cate as $x => $cate_value) {
						$db->insert('product_cate',array(
							'product_id' => $product_id,
							'shopcate_id' => $cate_value
						));
					}

					if ($option == 'none') {
						$db->update('product_price',array(
							'price' => $price,
							'quantity' => $quantity,
						), array('product_id' => $product_id));
					}
					elseif ($option == 'weight') {
						$db->delete('product_option', array('product_id' => $product_id));
						$db->delete('product_price', array('product_id' => $product_id));

						foreach($weight_option_value as $x => $x_value) {
							$db->insert('product_option',array(
								'product_id' => $product_id,
								'option_type_id' => 1,
								'option_value' => ${'weight_option_array'.$x}['value'],
								'option_value_id' => ($x+1),
								'color_code' => '',
								'option_value_order' => ($x+1)
							));
							$db->insert('product_price',array(
								'product_id' => $product_id,
								'option_weight_value_id' => ($x+1),
								'option_weight_value_order' => ($x+1),
								'option_size_value_id' => 1,
								'option_size_value_order' => 1,
								'option_color_value_id' => 1,
								'option_color_value_order' => 1,
								'price' => ${'weight_option_array'.$x}['price'],
								'sale_price' => 0,
								'quantity' => ${'weight_option_array'.$x}['quantity'],
								'sold' => 0
							));
						}
					}
					elseif ($option == 'size') {
						$db->delete('product_option', array('product_id' => $product_id));
						$db->delete('product_price', array('product_id' => $product_id));

						foreach($size_option_value as $x => $x_value) {
							$db->insert('product_option',array(
								'product_id' => $product_id,
								'option_type_id' => 3,
								'option_value' => ${'size_option_array'.$x}['value'],
								'option_value_id' => ($x+1),
								'color_code' => '',
								'option_value_order' => ($x+1)
							));
							$db->insert('product_price',array(
								'product_id' => $product_id,
								'option_weight_value_id' => 1,
								'option_weight_value_order' => 1,
								'option_size_value_id' => ($x+1),
								'option_size_value_order' => ($x+1),
								'option_color_value_id' => 1,
								'option_color_value_order' => 1,
								'price' => ${'size_option_array'.$x}['price'],
								'sale_price' => 0,
								'quantity' => ${'size_option_array'.$x}['quantity'],
								'sold' => 0
							));
						}
					}
					elseif ($option == 'color') {
						$db->delete('product_option', array('product_id' => $product_id));
						$db->delete('product_price', array('product_id' => $product_id));

						foreach($color_option_value as $x => $x_value) {
							$db->insert('product_option',array(
								'product_id' => $product_id,
								'option_type_id' => 2,
								'option_value' => ${'color_option_array'.$x}['value'],
								'option_value_id' => ($x+1),
								'color_code' => ${'color_option_array'.$x}['code'],
								'option_value_order' => ($x+1)
							));
							$db->insert('product_price',array(
								'product_id' => $product_id,
								'option_weight_value_id' => 1,
								'option_weight_value_order' => 1,
								'option_size_value_id' => 1,
								'option_size_value_order' => 1,
								'option_color_value_id' => ($x+1),
								'option_color_value_order' => ($x+1),
								'price' => ${'color_option_array'.$x}['price'],
								'sale_price' => 0,
								'quantity' => ${'color_option_array'.$x}['quantity'],
								'sold' => 0
							));
						}
					}
					//Chuyển về trang sản phẩm
					header('location: ?controller=products');	
				}
				var_dump($files,$total,$names[0]);
			}
		}
		else{
	 		//Nếu không phải admin thì cho về trang nhan viên
			header('location: ?controller=products');
		}
	}else{
		//Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
		header('location: ?controller=login');
	} 
	require_once('./view/V_change_product.php');
?>