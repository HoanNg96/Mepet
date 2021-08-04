<?php

    if(isset($_POST['cfilcate'])) {
        $filter_cate = json_decode( stripslashes($_POST['cfilcate']) );
    }
    if(isset($_POST['cfilbrand'])) {
        $filter_brand = json_decode( stripslashes($_POST['cfilbrand']) );
    }
    if(isset($_POST['cfilprice'])) {
        $filter_price = json_decode( stripslashes($_POST['cfilprice']) );
    }

    echo json_encode( array('cate' => '&filter_cate='.implode(',',$filter_cate), 'brand' => '&filter_brand='.implode(',',$filter_brand), 'price' => '&filter_price='.implode(',',$filter_price) ) );

?>