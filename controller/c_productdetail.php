<?php
  $id = $_GET['id'];
  $cart_quantity = 1;
  
  if (isset($_POST['color'])||isset($_POST['weight'])||isset($_POST['size'])) {
    if(isset($_POST['color'])) {
      $option_color_value_id = ($_POST['color']);
    }
    else {
      $option_color_value_id = 1;
    }
    if(isset($_POST['weight'])) {
      $option_weight_value_id = ($_POST['weight']);
    }
    else {
      $option_weight_value_id = 1;
    }
    if(isset($_POST['size'])) {
      $option_size_value_id = ($_POST['size']);
    }
    else {
      $option_size_value_id = 1;
    }
    $where_pd = array('products.id =' => $id,'product_price.option_weight_value_id =' => $option_weight_value_id,'product_price.option_color_value_id =' => $option_color_value_id,'product_price.option_size_value_id =' => $option_size_value_id);

    
  }
  else {
    $where_pd = array('products.id =' => $id,'product_price.option_weight_value_order =' => 1,'product_price.option_color_value_order =' => 1,'product_price.option_size_value_order =' => 1);
  }

  /* $product_detail = getjoin2 ('products', array('*'), 'product_price', array('*'), 'left', 'id', 'product_id', $where_pd , '', '', '', '',''); */
  $product_detail = getjoin3 ('products', array('*'), 'product_price', array('*'), 'left', 'id', 'product_id', 'brand', array('brand_name'), 'products', 'brand_id', 'left', 'id', $where_pd, array(), '', '', '', '');

  $product_img = get('product_image', array('*'),array('product_id ='=>$id),'','img_link','asc','','');

  $product_option_type = getjoin2 ('product_option', array('product_id','option_type_id'), 'option_type', array('option_name','option_describe'), 'left', 'option_type_id', 'option_id', array('product_option.product_id =' => $id), '', 'product_option.option_type_id', 'asc', '','distinct');

  foreach ($product_option_type as $key => $value2) {
    ${'option'.$value2['option_type_id']} = get('product_option', array('*'),array('product_id ='=>$id,'option_type_id =' => $value2['option_type_id']),'','option_value_order','asc','','');
  }

  $product_cate = getjoin2 ('product_cate', array('*'), 'shop_cate', array('shopcate_name','parentcate_id'), 'left', 'shopcate_id', 'id', array('product_cate.product_id =' => $id), '', '', '', '', '');

  foreach($product_cate as $key => $value10) {
    ${'product_id_cate'.$value10['shopcate_id']} = get('product_cate', array('*'), array('shopcate_id =' => $value10['shopcate_id']),array(), '', '', '', '');
    foreach(${'product_id_cate'.$value10['shopcate_id']} as $key => $value11) {
      if ($value11['product_id'] != $id) {
        ${'relate_product_cate'.$value11['product_id']} = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', array('products.id =' => $value11['product_id'], 'product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1), array('product_image.img_link' => '%-1.%'), 'products.id', 'ASC', '','');
      }
    }
  }

  require_once('./view/v_productdetail.php');
?>