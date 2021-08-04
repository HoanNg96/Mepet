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
    <header id="myHeader">
        <div class="container-fluid">
            <div class="row">
                <div class="page-logo col-2 order-lg-0 order-1 d-flex align-items-center">
                    <a href="index.php"><img src="image/logo.png" alt=""></a>
                </div>
                <div class="col-lg-8 col-5 nav-menu order-lg-1 order-0">
                    <div class="m-menu d-none align-items-center">
                        <a href="" id="m-menu-btn"><i class="far fa-bars"></i></a>
                    </div>
                    <nav class="d-flex justify-content-center align-items-center h-100">
                        <a href="?controller=home" class="nav-link1">TRANG CHỦ</a>
                        <div class="multi-menu nav-link1">
                            <a href="?controller=collection">SẢN PHẨM</a>
                            <ul class="first-menu">
                                <li>
                                    <i class="fal fa-dog"></i>
                                    <a href="?controller=collection&filter_cate=1,3,11,12,13,14,15,4,16,17,18,5,19,20,21,6,22,23,24,25">Sản phẩm cho Chó</a>
                                    <ul class='second-menu'>
                                        <li>
                                            <i class="fal fa-meat"></i>
                                            <a href="?controller=collection&filter_cate=3,11,12,13,14,15">Thức ăn cho chó</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=11">Thức ăn khô cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=12">Thức ăn ướt cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=13">Pate cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=14">Snack - Xương - Bánh cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=15">Sữa cho chó</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fal fa-tshirt"></i>
                                            <a href="?controller=collection&filter_cate=4,16,17,18">Trang phục cho chó</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=16">Quần áo cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=17">Váy cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=18">Giày, tất cho chó</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fal fa-syringe"></i>
                                            <a href="?controller=collection&filter_cate=5,19,20,21">Y tế & Thuốc cho chó</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=19">Canxi & Vitamins cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=20">Thuốc trị ve, rận cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=21">Vệ sinh tai, mắt, miệng cho chó</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fal fa-list"></i>
                                            <a href="?controller=collection&filter_cate=6,22,23,24,25">Đồ dùng cho chó</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=22">Đồ chơi cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=23">Túi, lồng vận chuyển cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=24,">Bát ăn, uống cho chó</a></li>
                                                <li><a href="?controller=collection&filter_cate=25">Đồ huấn luyện cho chó</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <i class="fal fa-cat"></i>
                                    <a href="">Sản phẩm cho Mèo</a>
                                    <ul class='second-menu'>
                                        <li>
                                            <i class="fal fa-meat"></i>
                                            <a href="?controller=collection&filter_cate=2,7,26,27,28,29,30,8,31,32,33,9,34,35,36,10,37,38,39,40">Thức ăn cho mèo</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=26">Thức ăn khô cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=27">Thức ăn ướt cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=28">Pate cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=29">Snack - Xương - Bánh cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=30">Sữa cho mèo</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fal fa-tshirt"></i>
                                            <a href="?controller=collection&filter_cate=8,31,32,33">Trang phục cho mèo</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=31">Quần áo cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=32">Váy cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=33">Giày, tất cho mèo</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fal fa-syringe"></i>
                                            <a href="?controller=collection&filter_cate=9,34,35,36">Y tế & Thuốc cho mèo</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=34">Canxi & Vitamins cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=35">Thuốc trị ve, rận cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=36">Vệ sinh tai, mắt, miệng cho mèo</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <i class="fal fa-list"></i>
                                            <a href="?controller=collection&filter_cate=10,37,38,39,40">Đồ dùng cho mèo</a>
                                            <ul class="third-menu">
                                                <li><a href="?controller=collection&filter_cate=37">Đồ chơi cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=38">Túi, lồng vận chuyển cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=39">Bát ăn, uống cho mèo</a></li>
                                                <li><a href="?controller=collection&filter_cate=40">Đồ huấn luyện cho mèo</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <a href="" class="nav-link1">TIN TỨC</a>
                        <a href="" class="nav-link1">BLOGS</a>
                        <a href="" class="nav-link1 nav-link1-last">GIỚI THIỆU</a>
                    </nav>
                </div>
                <div class="right-header col-lg-2 col-5 d-flex justify-content-end align-items-center order-2">
                    <a href="" id="show-search"><i class="fal fa-search"></i></a>
                    <a href="" id="wishlist"><i class="fal fa-heart"></i></a>
                    <?php
                        if (isset($_SESSION['cart']) && $_SESSION['cart'] != null) {
                    ?>
                        <a href="?controller=cart" id="cart-btn">
                            <i class="fal fa-shopping-cart"></i>
                            <span><?php echo count($_SESSION['cart']) ?></span>
                        </a>
                    <?php
                        } else {
                    ?>
                        <a href="?controller=cart" id="cart-btn">
                            <i class="fal fa-shopping-cart"></i>
                            <span>0</span>
                        </a>
                    <?php
                        }
                    ?>
                    <?php
                        if (isset($_SESSION['user']) && $_SESSION['user'] != null) {
                    ?>
                        <div id="useraccount">
                            <i class="fal fa-user"></i>
                            <span></span>
                            <ul>
                                <li><a href="?controller=account">Tài khoản</a></li>
                                <li><a href="?controller=logout">Đăng xuất</a></li>
                            </ul>
                        </div>
                    <?php
                        } else {
                    ?>
                        <a href="" id="userlogin">
                            <i class="fal fa-user"></i>
                        </a>
                    <?php
                        }
                    ?>
                    <div id="userform">
                        <div class="userform-container">
                            <a href="" id="closelogin"><i class="fal fa-times"></i></a>
                            <img src="image/logo.png" alt="">
                            <form action="" method="post" name="loginform" id="loginform">
                                <input type="text" name="loguser" placeholder="Tên đăng nhập" class="user-input" id="loguser">
                                <input type="password" name="logpass" placeholder="Mật khẩu" class="user-input" id="logpass">
                                <a href="" id="forpass-btn">Bạn quên mật khẩu ?</a>
                                <input type="button" value="ĐĂNG NHẬP" class="btn-submit" name="btn-logsubmit" id="btn-logform">
                                <div class="regdiv d-block">
                                    <p>Bạn chưa có tài khoản ?</p>
                                    <a href="" id="reg-btn">Đăng ký ngay</a>
                                </div>
                                <div id="login-error" class="d-block">
                                </div>
                            </form>
                            <form action="" method="post" name="regform" id="regform">
                                    <p>ĐĂNG KÝ</p>
                                    <input type="text" name="reguser" placeholder="Tên đăng nhập" class="user-input" id="reguser">
                                    <input type="text" name="regemail" placeholder="Email" class="user-input" id="regemail">
                                    <input type="password" name="regpass" placeholder="Mật khẩu" class="user-input" id="regpass">
                                    <input type="password" name="retyperegpass" class="user-input" placeholder="Xác nhận mật khẩu" id="retyperegpass">
                                    <input type="button" class="btn-submit" value="ĐĂNG KÝ" name="btn-regsubmit" id="btn-regform">
                                    <div class="backlog d-block">
                                        <a href="" id="backlogreg-btn">Quay lại đăng nhập</a>
                                    </div>
                                    <div id="reg-error" class="d-block">
                                    </div>
                                </form>
                            <form action="" method="post" name="forpassform" id="forpassform">
                                <p>ĐẶT LẠI MẬT KHẨU</p>
                                <input type="email" name="forpassmail" placeholder="Email" class="user-input">
                                <input type="button" class="btn-submit" value="XÁC NHẬN" id="btn-forpassform">
                                <div class="backlog d-block">
                                    <a href="" id="backlogforpass-btn">Hủy</a>
                                </div>
                                <div id="forpass-error" class="d-block"></div>
                            </form>
                        </div>
                        <div class="close-blank" id="close-login"></div>
                    </div>
                    <div id="search">
                        <a href="" id="closesearch"><i class="fal fa-times"></i></a>
                        <div id="searchform-container">
                            <div class="search-title text-center">GÕ VÀ NHẤN ENTER ĐỂ TÌM KIẾM</div>
                            <form name="search" id="searchform">
                                <input type="text" placeholder="Hãy gõ gì đó" name="keyword" id="searchinput" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" autofocus class="search-input">
                            </form>
                            <div id="search-result" class="d-flex">
                                <div class="row d-flex w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="m-menu">
                    <div id="m-main-menu">
                        <div class="m-nav-menu">
                            <ul class="clearfix nav">
                                <li class="nav-item">
                                    <a href="#m-nav-menu" data-toggle="tab" class="nav-link text-center active">
                                        <i class="far fa-bars"></i>
                                        <span class="ml-2">MENU</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#m-user" data-toggle="tab" class="nav-link text-center">
                                        <i class="far fa-user"></i>
                                        <span class="ml-2">LOGIN</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="m-nav-content tab-content">
                            <div id="m-nav-menu" class="tab-pane active">
                                <ul>
                                    <li><a href="?controller=home" class="m-nav-link">TRANH CHỦ</a></li>
                                    <li>
                                        <a href="?controller=collection" class="m-nav-link">SẢN PHẨM</a>
                                        <div class="m-expand-menu">
                                            <a href="" id="m-open-first-menu"><i class="far fa-chevron-right"></i></a>
                                        </div>
                                    </li>
                                    <li><a href="" class="m-nav-link">TIN TỨC</a></li>
                                    <li><a href="" class="m-nav-link">BLOGS</a></li>
                                    <li><a href="" class="m-nav-link">GIỚI THIỆU</a></li>
                                </ul>
                                <div id="m-first-menu">
                                    <a href="" id="m-close-first-menu" class="m-back-menu">
                                        <i class="far fa-chevron-left"></i>
                                        <span class="ml-2">SẢN PHẨM</span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="" class="m-nav-link">SẢN PHẨM CHO CHÓ</a>
                                            <div class="m-expand-menu">
                                                <a href="javascript:void(0)" class=" accordion"><i class="far fa-chevron-right"></i></a>
                                            </div>
                                        </li>
                                        <ul class="panel m-second-menu">
                                            <li>
                                                <a href="">Thức ăn cho chó</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Thức ăn khô cho chó</a></li>
                                                <li><a href="">Thức ăn ướt cho chó</a></li>
                                                <li><a href="">Pate cho chó</a></li>
                                                <li><a href="">Snack - Xương - Bánh cho chó</a></li>
                                                <li><a href="">Sữa cho chó</a></li>
                                            </ul>
                                            <li>
                                                <a href="">Trang phục cho chó</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Quần áo cho chó</a></li>
                                                <li><a href="">Váy cho chó</a></li>
                                                <li><a href="">Giày, tất cho chó</a></li>
                                            </ul>
                                            <li>
                                                <a href="">Y tế & Thuốc cho chó</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Canxi và Vitamins cho chó</a></li>
                                                <li><a href="">Thuốc trị ve, rận cho chó</a></li>
                                                <li><a href="">Vệ sinh tai, mắt, miệng cho chó</a></li>
                                            </ul>
                                            <li>
                                                <a href="">Đồ dùng cho chó</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Đồ chơi cho chó</a></li>
                                                <li><a href="">Túi, lồng vận chuyển cho chó</a></li>
                                                <li><a href="">Bát ăn, uống cho chó</a></li>
                                                <li><a href="">Đồ huấn luyện cho chó</a></li>
                                            </ul>
                                        </ul>
                                        <li>
                                            <a href="" class="m-nav-link">SẢN PHẨM CHO MÈO</a>
                                            <div class="m-expand-menu">
                                                <a href="javascript:void(0)" class=" accordion"><i class="far fa-chevron-right"></i></a>
                                            </div>
                                        </li>
                                        <ul class="panel m-second-menu">
                                            <li>
                                                <a href="">Thức ăn cho mèo</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Thức ăn khô cho mèo</a></li>
                                                <li><a href="">Thức ăn ướt cho mèo</a></li>
                                                <li><a href="">Pate cho mèo</a></li>
                                                <li><a href="">Snack - Xương - Bánh cho mèo</a></li>
                                                <li><a href="">Sữa cho mèo</a></li>
                                            </ul>
                                            <li>
                                                <a href="">Trang phục cho mèo</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Quần áo cho mèo</a></li>
                                                <li><a href="">Váy cho mèo</a></li>
                                                <li><a href="">Giày, tất cho mèo</a></li>
                                            </ul>
                                            <li>
                                                <a href="">Y tế & Thuốc cho mèo</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Canxi và Vitamins cho mèo</a></li>
                                                <li><a href="">Thuốc trị ve, rận cho mèo</a></li>
                                                <li><a href="">Vệ sinh tai, mắt, miệng cho mèo</a></li>
                                            </ul>
                                            <li>
                                                <a href="">Đồ dùng cho mèo</a>
                                                <div class="m-expand-menu">
                                                    <a href="javascript:void(0)" class="accordion"><i class="far fa-chevron-right"></i></a>
                                                </div>
                                            </li>
                                            <ul class="panel m-third-menu">
                                                <li><a href="">Đồ chơi cho mèo</a></li>
                                                <li><a href="">Túi, lồng vận chuyển cho mèo</a></li>
                                                <li><a href="">Bát ăn, uống cho mèo</a></li>
                                                <li><a href="">Đồ huấn luyện cho mèo</a></li>
                                            </ul>
                                        </ul>
                                    </ul>
                                </div>
                            </div>
                            <div id="m-user" class="tab-pane">
                                <form action="" method="post" onsubmit="return loginvalidate()" name="mloginform" id="mloginform">
                                    <input type="text" name="mloguser" placeholder="Tên đăng nhập" class="user-input">
                                    <input type="password" name="mlogpass" placeholder="Mật khẩu" class="user-input">
                                    <a href="" id="mforpass-btn">Bạn quên mật khẩu ?</a>
                                    <input type="submit" value="ĐĂNG NHẬP" class="btn-submit" name="mbtn-logsubmit">
                                    <div class="m-or text-center mb-4">
                                        <span>HOẶC</span>
                                    </div>
                                    <div class="mregdiv d-block text-center mb-3">
                                        <a href="" id="mreg-btn">Đăng ký ngay</a>
                                    </div>
                                    <div id="mlogin-error" class="d-block">
                                    </div>
                                </form>
                                <form action="" method="post" onsubmit="return regvalidate()" name="mregform" id="mregform">
                                    <p class="text-center">ĐĂNG KÝ</p>
                                    <input type="text" name="mreguser" placeholder="Tên đăng nhập" class="user-input">
                                    <input type="email" name="mregemail" placeholder="Email" class="user-input">
                                    <input type="password" name="mregpass" placeholder="Mật khẩu" class="user-input">
                                    <input type="password" name="mretyperegpass" class="user-input" placeholder="Nhập lại mật khẩu">
                                    <input type="submit" class="btn-submit" value="ĐĂNG KÝ" name="mbtn-regsubmit">
                                    <div class="m-or text-center mb-4">
                                        <span>HOẶC</span>
                                    </div>
                                    <div class="mbacklog text-center d-block mb-3">
                                        <a href="" id="mbacklogreg-btn">Quay lại đăng nhập</a>
                                    </div>
                                    <div id="mreg-error" class="d-block">
                                    </div>
                                </form>
                                <form action="" method="post" name="mforpassform" id="mforpassform">
                                    <p class="text-center">ĐẶT LẠI MẬT KHẨU</p>
                                    <input type="email" name="mforpassmail" placeholder="Email" class="user-input mb-0">
                                    <input type="submit" class="btn-submit" value="XÁC NHẬN">
                                    <div class="mbacklog d-block mb-3 text-center">
                                        <a href="" id="mbacklogforpass-btn">Hủy</a>
                                    </div>
                                    <div id="mforpass-error" class="d-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="close-m-menu">
                            <a href="" id="close-m-menu" class="text-center">
                                <i class="fal fa-times"></i>
                                <span class="ml-2">CLOSE</span>
                            </a>
                        </div>
                    </div>
                    <div id="m-menu-close" class="close-blank"></div>
                </div>
            </div>
        </div>
    </header>
