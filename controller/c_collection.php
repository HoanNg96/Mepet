<?php 

    $product_brand = get ('brand', array('*'), array(), array(), '', '', '', 'distinct');

    $first_cate = get ('shop_cate', array('*'), array('parentcate_id =' => 0),array(), 'id', 'asc', '', '');
    foreach ($first_cate as $key => $value) {
        ${'second_cate'.$value['id']}= get ('shop_cate', array('*'), array('parentcate_id =' => $value['id']),array(), 'id', 'asc', '', '');
        foreach (${'second_cate'.$value['id']} as $key => $value1) {
            ${'third_cate'.$value1['id']}= get ('shop_cate', array('*'), array('parentcate_id =' => $value1['id']),array(), 'id', 'asc', '', '');
        }
    }

    $search_in = '';
    $where_pa = array('product_price.option_weight_value_order =' => 1,'product_price.option_size_value_order =' => 1,'product_price.option_color_value_order =' => 1);
    $like_pa = array('product_image.img_link' => '%-1.%');

    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        $like_pa['products.name'] = '%'.$keyword.'%';
    }

    if (isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) {
        $filter_cate_data = $_GET['filter_cate'];
        $filter_cate_data_array = explode(",", $filter_cate_data);
        $search_in .= ' pdca.shopcate_id in ('.$filter_cate_data.')';
    }

    if (isset($_GET['filter_brand']) && !empty($_GET['filter_brand'])) {
        $filter_brand_data = $_GET['filter_brand'];
        $filter_brand_data_array = explode(",", $filter_brand_data);
        if(isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) {
            $search_in .= ' and pd.brand_id in ('.$filter_brand_data.')';
        }
        else {
            $search_in = ' pd.brand_id in ('.$filter_brand_data.')';
        }
    }

    if (isset($_GET['filter_price']) && !empty($_GET['filter_price'])) {
        $filter_price_data = $_GET['filter_price'];
        switch ($filter_price_data) {
            case 2:
                $price_range = ' < 100000';
                break;
            case 3:
                $price_range = ' between 100000 and 200000';
                break;
            case 4:
                $price_range = ' between 200000 and 300000';
                break;
            case 5:
                $price_range = ' between 300000 and 500000';
                break;
            case 6:
                $price_range = ' between 500000 and 1000000';
                break;
            case 7:
                $price_range = ' > 1000000';
                break;
            default:
                $price_range = '';
            }
        if (!empty($price_range)) {
            if((isset($_GET['filter_brand']) && !empty($_GET['filter_brand'])) || (isset($_GET['filter_cate']) && !empty($_GET['filter_cate']))) {
                $search_in .= ' and pdpr.price'.$price_range;
            }
            else {
                $search_in .= ' pdpr.price'.$price_range;
            }
        }
    }
    
    $filter_product = myget ('select distinct pd.id from products pd left join product_cate pdca on pd.id = pdca.product_id left join product_price pdpr on pd.id = pdpr.product_id', array(), $search_in, array(), '');

    if( (isset($_GET['filter_brand']) && !empty($_GET['filter_brand'])) || (isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) || (isset($_GET['filter_price']) && !empty($_GET['filter_price']) && !empty($price_range)) ) {

        $filter_product_in = '';
        foreach ($filter_product as $key => $value) {
            $filter_product_in .= ''.$value['id'].',';
        }
        $filter_product_in = trim($filter_product_in, ",");

        $product_all = getjoin3filter ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', $where_pa, 'products.id in ('.$filter_product_in.')', $like_pa, 'products.id', 'ASC', '','DISTINCT');

    }
    else {
        $product_all = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', $where_pa, $like_pa, 'products.id', 'ASC', '','DISTINCT');
    }

    $product_all_num = count($product_all);

    $product_num_per_page = 16;

    $page_number = ceil($product_all_num/$product_num_per_page);

    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

    if($page>$page_number) {
        $page = $page_number;
    }
    else if ($page < 1) {
        $page = 1;
    }

        if( (isset($_GET['filter_brand']) && !empty($_GET['filter_brand'])) || (isset($_GET['filter_cate']) && !empty($_GET['filter_cate'])) || (isset($_GET['filter_price']) && !empty($_GET['filter_price']) && !empty($price_range)) ) {

            $product_page = getjoin3filter ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', $where_pa,  'products.id in ('.$filter_product_in.')', $like_pa , 'products.id', 'ASC', '','');
            
            $product_page = array_slice($product_page, ($page-1)*$product_num_per_page, $product_num_per_page);
        }
        else {
            $product_page = getjoin3 ('products', array('*'), 'product_image', array('img_link'), 'left', 'id', 'product_id', 'product_price', array('price'), 'products', 'id', 'left', 'product_id', $where_pa, $like_pa , 'products.id', 'ASC', '','');

            $product_page = array_slice($product_page, ($page-1)*$product_num_per_page, $product_num_per_page);
        }

    require_once('./view/v_collection.php');

?>