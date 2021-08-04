<?php include_once('header.php'); ?>

    <div class="content">
        <div class="content-header"></div>
        <div class="content-main container-fluid account">
            <nav aria-label="breadcrumb" class="mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tài khoản</li>
                </ol>
            </nav>
            <div class="main-account container-fluid">
                <div class="row">
                    <div class="account-control col-lg-3 col-12">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="#account-info" data-toggle="tab" class="nav-link active">Thông Tin Tài Khoản</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-order" data-toggle="tab" class="nav-link">Đơn Hàng Của Tôi</a>
                            </li>
                            <li class="nav-item">
                                <a href="#account-password" data-toggle="tab" class="nav-link">Đổi Mật Khẩu</a>
                            </li>
                        </ul>
                    </div>
                    <div class="account-content col-lg-9 col-12 tab-content py-2">
                        <div id="account-info" class="tab-pane active">
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Tên đăng nhập:</div>
                                    <div class="col-lg-8 col-12"><input type="text" name="" size="30" disabled value="<?php echo $user_info[0]['username'] ?>"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Họ tên:</div>
                                    <div class="col-lg-8 col-12"><input type="text" name="" id="account-fullname" size="30" value="<?php echo $user_info[0]['full_name'] ?>"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Số điện thoại:</div>
                                    <div class="col-lg-8 col-12"><input type="number" name="" id="account-phone" size="30" value="<?php echo $user_info[0]['phone'] ?>"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Email:</div>
                                    <div class="col-lg-8 col-12"><input type="text" name="" id="account-email" size="30" value="<?php echo $user_info[0]['email'] ?>"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Địa chỉ:</div>
                                    <div class="col-lg-8 col-12"><input type="text" name="" id="account-address" size="30" value="<?php echo $user_info[0]['address'] ?>"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2 justify-content-center align-items-center">
                                <a href="" class="mr-2 btn btn-danger" id="confirm-update-account">Cập nhật thông tin</a>
                                <a href="" class="ml-2 btn btn-secondary">Hủy</a>
                            </div>
                            <div id="update-account-info-error" class=""></div>
                        </div>
                        <div id="account-order" class="tab-pane">
                            <table class="table cart-table text-center mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Mã đơn hàng</th>
                                        <th scope="col">Ngày mua</th>
                                        <th scope="col">Sản phẩm</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col">Trạng thái đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if( empty($user_order) ) { ?>
                                            <td colspan="7" class="text-center blank-cart">
                                                <div class="text-center mt-2" style="font-weight: 500; font-size: 1.5rem;">Bạn chưa có đơn hàng nào!</div>
                                            </td>
                                    <?php } else { foreach ($user_order_page as $key => $value) {?>
                                        <tr class="order-item">
                                            <td><a href="" style="color: tomato;" data-id="<?php echo $value['id'] ?>" class="detail-order"><?php echo ${'order_id'.$value['id']} ?></a></td>
                                            <td><?php echo ${'date'.$value['id']}->format('d-m-Y') ?></td>
                                            <td><?php echo ${'user_order_detail'.$value['id']}[0]['name'] ?></td>
                                            <td><?php echo number_format ($value['total_order'],0,",",".") ?>đ</td>
                                            <td><?php echo ${'status'.$value['id']} ?></td>
                                        </tr>
                                    <?php }} ?>
                                </tbody>
                            </table>
                            <div class="product-page mt-5 d-flex justify-content-center w-100">
                                <form id="collection-page-form" class="d-flex">
                                    <?php if($page_number>0) { 
                                        if($page>1 && $page_number>1) { ?>
                                            <label><input type="radio" name="page" value="<?php echo ($page-1) ?>"><i class="fal fa-chevron-left"></i></label>
                                        <?php } 
                                        if($page>3) { ?>
                                            <label><input type="radio" name="page" value="1">1</label>
                                            <span>...</span>
                                        <?php } 
                                        if($page-2 > 0 ) { ?>
                                            <label><input type="radio" name="page" value="<?php echo ($page-2) ?>"><?php echo ($page-2) ?></label>
                                        <?php } 
                                        if($page-1 > 0 ) { ?>
                                            <label><input type="radio" name="page" value="<?php echo ($page-1) ?>"><?php echo ($page-1) ?></label>
                                        <?php } ?>
                                            <label class="current-page"><input type="radio" name="page" value="<?php echo ($page) ?>"><?php echo $page ?></label>
                                        <?php if($page+1 < $page_number+1 ) { ?>
                                            <label><input type="radio" name="page" value="<?php echo ($page+1) ?>"><?php echo ($page+1) ?></label>
                                        <?php } 
                                        if($page+2 < $page_number+1 ) { ?>
                                            <label><input type="radio" name="page" value="<?php echo ($page+2) ?>"><?php echo ($page+2) ?></label>
                                        <?php } 
                                        if($page < $page_number-2 ) { ?>
                                            <span>...</span>
                                            <label><input type="radio" name="page" value="<?php echo $page_number ?>"><?php echo $page_number ?></label>
                                        <?php } 
                                        if($page<$page_number && $page_number > 1) { ?>
                                            <label><input type="radio" name="page" value="<?php echo ($page+1) ?>"><i class="fal fa-chevron-right"></i></label>
                                        <?php }
                                    } ?>
                                </form>
                            </div>
                            <div class="show-order-detail"></div>
                            <div class="mb-3 back-order"><a href="">Quay lại đơn hàng</a></div>
                        </div>
                        <div id="account-password" class="tab-pane">
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Mật khẩu hiện tại:</div>
                                    <div class="col-lg-8 col-12"><input type="password" name="" id="confirm-pass" size="30"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Mật khẩu mới:</div>
                                    <div class="col-lg-8 col-12"><input type="password" name="" id="new-pass" size="30"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2">
                                <div class="row">
                                    <div class="col-lg-4 col-12 input-name">Xác nhận mật khẩu mới:</div>
                                    <div class="col-lg-8 col-12"><input type="password" name="" id="retype-new-pass" size="30"></div>
                                </div>
                            </div>
                            <div class="d-flex py-2 justify-content-center align-items-center">
                                <a href="" class="mr-2 btn btn-danger" id="confirm-change-pass">Đổi mật khẩu</a>
                                <a href="" class="ml-2 btn btn-secondary">Hủy</a>
                            </div>
                            <div id="update-account-pass-error"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="addcart-response">
            <div class="addcart-response-box d-flex justify-content-center align-items-center h-100"></div>
        </div>
    </div>

<?php include_once('footer.php'); ?>