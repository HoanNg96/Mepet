<?php 
	//Tạo đối tượng database
	class database
	{	
		//Khởi tạo biến 
		protected $conn = null;
		protected $host = 'localhost:3306';
		protected $user = 'root';
		protected $pass = '';
		protected $name = 'mepet';
		
		public function __construct()
		{
			//connect mysql
			$this->connect();
        }

        //Viết hàm kết nối với cơ sở dữ liệu
		public function connect()
		{
			$this->conn= new mysqli(
				$this->host,
				$this->user,
				$this->pass,
				$this->name
			);
			if (!$this->conn) {
				echo "Kết nối thất bại";
				exit();
			}
		}
		//Hàm lấy dữ liệu có hoặc không có điều kiện theo bảng
		public function get($table,$condition=array())
		{	
			//Bước 1 : Khởi tạo cấu trúc câu lệnh truy vấn
			$sql = "SELECT * from $table";
			//Bước 2: Kiểm tra xem có điều kiện không và cộng chuỗi tương ứng 
			if (!empty($condition)) {
				$sql.=" WHERE";
				foreach ($condition as $key => $value) {
					$sql.= " $key = '$value' AND";
				}
				$sql = trim($sql, "AND");
			}
			//Bước 3: Chạy câu lệnh
			$query = mysqli_query($this->conn,$sql);
			//Bước 4: Khởi tạo 1 biến mảng và lặp hết dữ liệu lấy được từ câu truy vấn ở trên cho vào mảng đó
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			//Bước 5: Cho hàm trả về giá trị 
			return $result;
		}

		//hàm thêm dữ liệu vào Bảng
		public function insert($table,$data=array())
		{
			//Bước 1:Lấy giá trị của key cho vòa 1 mảng
			$keys = array_keys($data);
			//Bước 2: xử lí chuỗi với mảng ở trên
			$fields =  implode(",", $keys);

			//Bước 3: xử lí giá trị value
			$value_str ='';
			foreach ($data as $key => $value) {
				$value_str .="'$value',"; 
			}
			//Bước 4: xóa dấu phẩy ở cuối đi
			$value_str = trim($value_str, ",");
			//Bước 5: Lên cấu trúc câu lệnh sql
			$sql = "INSERT INTO $table ($fields) VALUES ($value_str)";
			//Bước 6: Chạy câu lệnh sql
			$query = mysqli_query($this->conn,$sql);
			//Bước 7: Trả về giá trị boolean true/false
			return $query;
		}

		//Hàm update dữ liệu vào 1 bảng theo điều kiện
		public function update($table,$data=array(),$condition=array())
		{	
			//Bước 1: Xử lí chuỗi giá trị
			$str = '';
			foreach ($data as $key => $value) {
				$str .="$key = '$value',"; 
			}
			//Bước 2: Xóa dấu phẩy ở cuối
			$str = trim($str,",");
			//Bước 3: Viết cấu trúc câu lênh sql
			$sql = "UPDATE $table SET $str WHERE ";
			foreach ($condition as $key => $value) {
				$sql.= "$key = '$value' AND";
			}
			$sql = trim($sql,'AND');
			//Bước 4: chạy câu lệnh sql
			$query = mysqli_query($this->conn,$sql);
			//Bước 5: trả về giá trị boolean true/false
			return $query;
		}

		//hàm xóa dữ liệu
		public function delete($table,$condition=array())
		{
			//Bước 1: lên cấu trúc câu lệnh sql
			$sql = " DELETE FROM $table WHERE ";
			//Bước 2: Cộng chuỗi theo điều kiện
			foreach ($condition as $key => $value) {
				$sql.= "$key = '$value' AND";
			}
			$sql = trim($sql,'AND');
			//Bước 3: Chạy câu lệnh sql
			$query = mysqli_query($this->conn,$sql);
			//Bước 4: Trả về giá trị boolean
			return $query;
		}
		
		//Hàm lấy dữ liệu ảnh và giá cho sản phẩm
		public function getimg($table,$condition=array(),$search=array())
		{	
			
			//Bước 1 : Khởi tạo cấu trúc câu lệnh truy vấn
			$sql = "SELECT distinct *,product_image.*,product_price.* from $table INNER JOIN product_image ON products.id = product_image.product_id RIGHT JOIN product_price ON products.id = product_price.product_id";

					// $sql = "SELECT *,product_price.quantity from $table INNER JOIN product_price ON products.id = product_price.product_id";
			
			if (!empty($condition)) {
				$sql.=" WHERE";
				foreach ($condition as $key => $value) {
					$sql.= " $key = '$value' AND";
				}
				$sql = trim($sql, "AND");
			}
			if(!empty($search)) {
				if(empty($condition)){
					$sql.= " WHERE";
				}
				else{
					$sql.= "AND";
				}
				foreach ($search as $key => $value) {
					$sql.= " $key like '$value' AND";
				}
				$sql = trim($sql, "AND");
			}
			// echo $sql;
			//Bước 3: Chạy câu lệnh
			$query = mysqli_query($this->conn,$sql);
			//Bước 4: Khởi tạo 1 biến mảng và lặp hết dữ liệu lấy được từ câu truy vấn ở trên cho vào mảng đó
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			//Bước 5: Cho hàm trả về giá trị 
			return $result;
		}

		public function getdetail($table,$condition=array())
		{
			//Bước 1 : Khởi tạo cấu trúc câu lệnh truy vấn
			$sql = "SELECT shop_cate.shopcate_name from $table LEFT JOIN shop_cate ON product_cate.shopcate_id = shop_cate.id";


			if (!empty($condition)) {
				$sql.=" WHERE";
				foreach ($condition as $key => $value) {
					$sql.= " $key = '$value' AND";
				}
				$sql = trim($sql, "AND");
			}
			// echo $sql;
			//Bước 3: Chạy câu lệnh
			$query = mysqli_query($this->conn,$sql);
			//Bước 4: Khởi tạo 1 biến mảng và lặp hết dữ liệu lấy được từ câu truy vấn ở trên cho vào mảng đó
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			//Bước 5: Cho hàm trả về giá trị 
			return $result;
		}
		function get2 ($table, $table_select_column = array(), $compare_condition = array(),$search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
			if (!empty($selecttype)) {
				$sql = "select $selecttype";
			}
			else {
				$sql = "select";
			}
			if(!empty($table_select_column)) {
				foreach ($table_select_column as $value) {
					$sql .= " $value,";
				}
				$sql = trim($sql, ",");
			}
			$sql .= " from $table";
			if (!empty($compare_condition)) {
				$sql .= " where";
				foreach ($compare_condition as $key => $value) {
					$sql .= " $key '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($search_condition)) {
				if (empty($compare_condition)) {
					$sql .= " where";
				}
				else {
					$sql .= "and";
				}
				foreach ($search_condition as $key => $value) {
					$sql .= " $key like '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($ordercolumn)) {
				$sql .= " order by $ordercolumn";
			}
			if (!empty($ordertype)) {
				$sql .= " $ordertype";
			}
			if (!empty($limitnumber)) {
				$sql .= " limit $limitnumber";
			}
			$query = mysqli_query($this->conn, $sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}
		function getjoin2 ($table1, $table1_select_column = array(), $table2, $table2_select_column = array(), $jointype, $table1_join_column, $table2_join_column, $compare_condition = array(), $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
			if (!empty($selecttype)) {
				$sql = "select $selecttype";
			}
			else {
				$sql = "select";
			}
			if(!empty($table1_select_column)) {
				foreach ($table1_select_column as $value) {
					$sql .= " $table1.$value,";
				}
			}
			if(!empty($table2_select_column)) {
				foreach ($table2_select_column as $value) {
					$sql .= " $table2.$value,";
				}
				$sql = trim($sql, ",");
			}
			$sql .= " from $table1 $table1 $jointype join $table2 $table2 on $table1.$table1_join_column = $table2.$table2_join_column";
			if (!empty($compare_condition)) {
				$sql .= " where";
				foreach ($compare_condition as $key => $value) {
					$sql .= " $key '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($search_condition)) {
				if (empty($compare_condition)) {
					$sql .= " where";
				}
				else {
					$sql .= "and";
				}
				foreach ($search_condition as $key => $value) {
					$sql .= " $key like '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($ordercolumn)) {
				$sql .= " order by $ordercolumn";
			}
			if (!empty($ordertype)) {
				$sql .= " $ordertype";
			}
			if (!empty($limitnumber)) {
				$sql .= " limit $limitnumber";
			}
			echo $sql;
			$query = mysqli_query($this->conn, $sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}
		function getjoin3 ($table1, $table1_select_column = array(), $table2, $table2_select_column = array(), $jointype1v2, $table1_join_column, $table2_join_column, $table3, $table3_select_column = array(), $tb1or2_join3, $tb1or2_join3_join_column, $jointype3, $table3_join_column, $compare_condition = array(), $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
			if (!empty($selecttype)) {
				$sql = "select $selecttype";
			}
			else {
				$sql = "select";
			}
			if(!empty($table1_select_column)) {
				foreach ($table1_select_column as $value) {
					$sql .= " $table1.$value,";
				}
			}
			if(!empty($table2_select_column)) {
				foreach ($table2_select_column as $value) {
					$sql .= " $table2.$value,";
				}
			}
			if(!empty($table3_select_column)) {
				foreach ($table3_select_column as $value) {
					$sql .= " $table3.$value,";
				}
				$sql = trim($sql, ",");
			}
			$sql .= " from $table1 $table1 $jointype1v2 join $table2 $table2 on $table1.$table1_join_column = $table2.$table2_join_column $jointype3 join $table3 $table3 on $table3.$table3_join_column = $tb1or2_join3.$tb1or2_join3_join_column";
	
			if (!empty($compare_condition)) {
				$sql .= " where";
				foreach ($compare_condition as $key => $value) {
					$sql .= " $key '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($search_condition)) {
				if (empty($compare_condition)) {
					$sql .= " where";
				}
				else {
					$sql .= "and";
				}
				foreach ($search_condition as $key => $value) {
					$sql .= " $key like '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($ordercolumn)) {
				$sql .= "order by $ordercolumn";
			}
			if (!empty($ordertype)) {
				$sql .= " $ordertype";
			}
			if (!empty($limitnumber)) {
				$sql .= " limit $limitnumber";
			}
			$query = mysqli_query($this->conn, $sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}
		function myget ($sql1, $compare_condition = array(), $search_in,$search_condition = array(), $sql2) {
			$sql = $sql1;
			if (!empty($compare_condition)) {
				$sql .= " where";
				foreach ($compare_condition as $key => $value) {
					$sql .= " $key '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($search_in)) {
				if (empty($compare_condition)) {
					$sql .= " where";
				}
				else {
					$sql .= "and";
				}
				$sql .= "$search_in";
			}
			if (!empty($search_condition)) {
				if (empty($compare_condition) && empty($search_in)) {
					$sql .= " where";
				}
				else {
					$sql .= "and";
				}
				foreach ($search_condition as $key => $value) {
					$sql .= " $key like '$value' and";
				}
				$sql = trim($sql, "and");
			}
			if (!empty($sql2)) {
				$sql .= " $sql2";
			}
			$query = mysqli_query($this->conn, $sql);
			$result = array();
			if ($query) {
				while ($row = mysqli_fetch_assoc($query)) {
					$result[] = $row;
				}
			}
			return $result;
		}
	}
?>