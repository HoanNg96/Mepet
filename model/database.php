<?php
    function connect() {
        $servername = "localhost:3306";
        $username = "root";
        $password = "";
        $databasename = "mepet";

        $conn = mysqli_connect($servername,$username,$password,$databasename);
        if (!$conn) {
            echo "Ket noi that bai" . mysqli_connect_error();
        }
        /* else {
            echo "Ket noi thanh cong";
        } */
        return $conn;
    }
    /* connect(); //kiem tra ket noi database */

    /* function get($table, $condition = array()) {
        $conn = connect();
        $sql = "select * from $table";
        if (!empty($condition)) {
            $sql .= " where";
            foreach ($condition as $key => $value) {
            $sql .= " $key = '$value' and";
            }
            $sql = trim($sql, "and");
        }
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    } */
    function get ($table, $table_select_column = array(), $compare_condition = array(),$search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
        $conn = connect();
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
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    /* function getfilter ($table, $table_select_column = array(), $compare_condition = array(), $search_in, $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
        $conn = connect();
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
        if (!empty($search_in)) {
            if (empty($compare_condition)) {
                $sql .= " where";
            }
            else {
                $sql .= "and";
            }
            $sql .= " $search_in";
        }
        if (!empty($search_condition)) {
            if (empty($compare_condition && empty($search_in))) {
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
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    } */
    function getjoin2 ($table1, $table1_select_column = array(), $table2, $table2_select_column = array(), $jointype, $table1_join_column, $table2_join_column, $compare_condition = array(), $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
        $conn = connect();
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
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    /* function getjoin2filter ($table1, $table1_select_column = array(), $table2, $table2_select_column = array(), $jointype, $table1_join_column, $table2_join_column, $compare_condition = array(), $search_in, $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
        $conn = connect();
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
        if (!empty($search_in)) {
            if (empty($compare_condition)) {
                $sql .= " where";
            }
            else {
                $sql .= "and";
            }
            $sql .= " $search_in";
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
        if (!empty($ordercolumn)) {
            $sql .= " order by $ordercolumn";
        }
        if (!empty($ordertype)) {
            $sql .= " $ordertype";
        }
        if (!empty($limitnumber)) {
            $sql .= " limit $limitnumber";
        }
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    } */
    function getjoin3 ($table1, $table1_select_column = array(), $table2, $table2_select_column = array(), $jointype1v2, $table1_join_column, $table2_join_column, $table3, $table3_select_column = array(), $tb1or2_join3, $tb1or2_join3_join_column, $jointype3, $table3_join_column, $compare_condition = array(), $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
        $conn = connect();
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
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function getjoin3filter ($table1, $table1_select_column = array(), $table2, $table2_select_column = array(), $jointype1v2, $table1_join_column, $table2_join_column, $table3, $table3_select_column = array(), $tb1or2_join3, $tb1or2_join3_join_column, $jointype3, $table3_join_column, $compare_condition = array(), $search_in, $search_condition = array(), $ordercolumn, $ordertype, $limitnumber, $selecttype) {
        $conn = connect();
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
        if (!empty($search_in)) {
            if (empty($compare_condition)) {
                $sql .= " where";
            }
            else {
                $sql .= "and";
            }
            $sql .= " $search_in ";
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
        if (!empty($ordercolumn)) {
            $sql .= "order by $ordercolumn";
        }
        if (!empty($ordertype)) {
            $sql .= " $ordertype";
        }
        if (!empty($limitnumber)) {
            $sql .= " limit $limitnumber";
        }
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }
    function insert($table, $data = array()) {
        $conn = connect();
        $key = array_keys($data);
        $fields = implode(",", $key);
        $value_str = '';
        foreach ($data as $key => $value) {
            $value_str .= "'$value',";
        }
        $value_str = trim($value_str,',');
        $sql = "insert into $table ($fields) values ($value_str)";
        $query = mysqli_query($conn,$sql);
        return $query;
    }
    function update($table, $data = array(), $condition = array()) {
        $conn = connect();
        $str = '';
        foreach ($data as $key => $value) {
            $str .= "$key = '$value',";
        }
        $str = trim($str, ",");
        $sql = "update $table set $str where ";
        foreach ($condition as $key => $value) {
            $sql .= "$key = '$value' and";
        }
        $sql = trim($sql, 'and');
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    function delete($table, $condition=array()) {
        $conn = connect();
        $sql = " delete from $table where ";
        foreach ($condition as $key => $value) {
            $sql .= "$key = '$value' and";
        }
        $sql = trim($sql, 'and');
        $query = mysqli_query($conn, $sql);
        return $query;
    }
    function myget ($sql1, $compare_condition = array(), $search_in,$search_condition = array(), $sql2) {
        $conn = connect();
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
        $query = mysqli_query($conn, $sql);
        $result = array();
        if ($query) {
            while ($row = mysqli_fetch_assoc($query)) {
                $result[] = $row;
            }
        }
        return $result;
    }

    /* SELECT pro.*, proimg.img_link FROM products pro LEFT JOIN product_image proimg ON pro.id = proimg.product_id WHERE proimg.img_link like '%-1.%' ORDER BY pro.id ASC, proimg.img_link DESC */

    /* $test = update('adminlogin', array('user'=>'test4', 'pass'=>'12345'),array('id'=>10)); */

    /* $test = getorderby('product_image',array('product_id'=>2),'img_link','asc','');
    var_dump($test); */
?>