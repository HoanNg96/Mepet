<?php

	include "./PHPMailer-master/src/PHPMailer.php";
	include "./PHPMailer-master/src/Exception.php";
	include "./PHPMailer-master/src/OAuth.php";
	include "./PHPMailer-master/src/POP3.php";
	include "./PHPMailer-master/src/SMTP.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once('./model/database.php');
    session_start();
    if(isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    }
    else {
        $controller = 'home';
    }

    switch ($controller) {
        case 'home':
            require_once('./controller/c_home.php');
            break;
        case 'cart':
            require_once('./controller/c_cart.php');
            break;
        case 'addcart':
            require_once('./controller/c_addcart.php');
            break;
        case 'delcart':
            require_once('./controller/c_del_cart.php');
            break;
        case 'delallcart':
            require_once('./controller/c_del_allcart.php');
            break;
        case 'orderinfo':
            require_once('./controller/c_orderinfo.php');
            break;
        case 'checkout':
            require_once('./controller/c_checkout.php');
            break;
        case 'productdetail':
            require_once('./controller/c_productdetail.php');
            break;
        case 'collection':
            require_once('./controller/c_collection.php');
            break;
        case 'login': 
            require_once('./controller/c_login.php');
            break;
        case 'logout': 
            require_once('./controller/c_logout.php');
            break;
        case 'userreg':
            require_once('./controller/c_user_reg.php');
            break;
        case 'checkuserreg':
            require_once('./controller/c_check_user_reg.php');
            break;
        case 'search':
            require_once('./controller/c_search.php');
            break;
        case 'previewsearch':
            require_once('./controller/c_preview_search.php');
            break;
        /* case 'filter':
            require_once('./controller/c_filter.php');
            break; */
        case 'filterurl':
            require_once('./controller/c_filter_url.php');
            break;
        case 'pageurl':
            require_once('./controller/c_page_url.php');
            break;
        case 'changecart':
            require_once('./controller/c_change_cart.php');
            break;
        case 'orderform':
            require_once('./controller/c_order_form.php');
            break;
        case 'account':
            require_once('./controller/c_account.php');
            break;
        case 'orderdetail':
            require_once('./controller/c_orderdetail.php');
            break;
        case 'accountchange':
            require_once('./controller/c_account_change.php');
            break;
        case 'acpasschg':
            require_once('./controller/c_account_pass_change.php');
            break;
        default:
            require_once('./controller/c_error.php');
        break;
    }
?>