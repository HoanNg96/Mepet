<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MePet - Pet is love</title>
    <link href = "image/web-icon.png" rel="icon" type="image/gif">
    <link rel="stylesheet" href="Bootstrap-jquery/bootstrap-4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-pro-5.13.0-web/css/all.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.css">
    <link rel="stylesheet" href="slick-1.8.1/slick/slick.css">
    <link rel="stylesheet" href="slick-1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="content">
        <div class="container-fluid">
            <div class="content-main row">
                <div class="text-slogan text-slogan1">Mepet - Pet is love</div>
                <div class="order-info col-lg-6 col-12 order-lg-0 order-1">
                    <div class="text-slogan text-slogan2">Mepet - Pet is love</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Giỏ hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
                        </ol>
                    </nav>
                    <div class="orderinfo-tittle">Thông tin khách hàng</div>
                    <form id="orderinfo">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Nhập Email" id="order-email" <?php if(isset($_SESSION['user'])) { echo 'value="'.$user_info[0]['email'].'"'; } ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập Họ và Tên" id="order-fullname" <?php if(isset($_SESSION['user'])) { echo 'value="'.$user_info[0]['full_name'].'"'; } ?>>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Nhập Số Điện Thoại" id="order-phone" <?php if(isset($_SESSION['user'])) { echo 'value="'.$user_info[0]['phone'].'"'; } ?>>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập Địa Chỉ Giao Hàng" id="order-address" <?php if(isset($_SESSION['user'])) { echo 'value="'.$user_info[0]['address'].'"'; } ?>>
                    </div>
                    </form>
                    <div class="nav-form d-flex justify-content-center align-items-center">
                        <div><a href="?controller=cart" style="color: tomato"><i class="far fa-chevron-left"></i> Quay lại giỏ hàng</a></div>
                        <div class="text-right"><button type="button" class="btn" id="confirm-order-btn">Đặt Hàng</button></div>
                    </div>
                    <div id="orderinfo-error">
                    </div>
                </div>
                <div class="cart-review col-lg-6 col-12 order-lg-1 order-0">
                    <table class="product-table table text-center">
                        <thead>
                            <?php   
                                $total_cart = 0;
                                foreach ($_SESSION['cart'] as $key => $value) {
                            ?>
                                <tr>
                                    <td scope="row" class="cart-image">
                                        <a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><img src="./image/<?php echo $value['img_link'] ?>" alt=""></a>
                                        <span class="dot d-flex justify-content-center align-items-center"><?php echo $value['sl'] ?></span>
                                    </td>
                                    <td class="text-left cart-name">
                                        <div class="cart-product-name"><a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><?php echo $value['name'] ?></a></div>
                                        <div class="cart-product-option">
                                            <?php
                                                if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}) == 1 ) {
                                            ?>
                                                <div><span>Cân nặng: </span><?php echo ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'weight_value'}[0]['option_value'] ?></div>
                                            <?php
                                                }
                                                if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}) == 1 ) {
                                            ?>
                                                <div><span>Kích cỡ: </span><?php echo ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'size_value'}[0]['option_value'] ?></div>
                                            <?php
                                                }
                                                if ( count(${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}) == 1 ) {
                                            ?>
                                                <div><span>Màu sắc: </span><?php echo ${'cart_item'.$value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'].'color_value'}[0]['option_value'] ?></div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-right"><?php echo number_format($value['price']*$value['sl'],0,",",".") ?>đ</td>
                                </tr>
                            <?php
                                $total_cart += $value['sl']*$value['price'];
                            } ?>
                        </thead>
                        <tbody>
                            <tr style="font-weight: 600; font-size: 18px;">
                                <td class="text-left cart-image">Tổng</td>
                                <td></td>
                                <td class="text-right"><?php echo number_format ($total_cart,0,",",".") ?>đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="order-response">
            <div class="order-response-box d-flex justify-content-center align-items-center h-100">
                <div class="order-success">
                    <div>
                        <div class="text-center mb-3">Đặt hàng thành công, quay lại trang chủ để tiếp tục mua sắm</div>
                        <div class="text-center"><a href="?controller=home" class="btn">Về trang chủ</a></div>
                    </div>
                </div>
                <div class="order-fail">
                    <div>
                        <div class="text-center mb-3">Đặt hàng thất bại, vui lòng thử lại</div>
                        <div class="text-center"><a href="?controller=orderinfo" class="btn">Quay lại</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Bootstrap-jquery/jquery-3.5.1.min.js"></script>
    <script src="Bootstrap-jquery/popper.min.js"></script>
    <script src="Bootstrap-jquery/bootstrap-4.5.2/js/bootstrap.min.js"></script>
    <script src="OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script src="slick-1.8.1/slick/slick.min.js"></script>
    <script src="js.js"></script>
</body>
</html>