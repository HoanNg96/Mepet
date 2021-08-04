<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
    <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
							<?php echo $user[0]['username'] ?>
                        </span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="mx-3">
                <a href="?controller=products" class="col-md-2 btn btn-dark">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
                </div>
    <form action="?controller=change_product&id=<?php echo $product_id ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="d-flex justify-content-around">

                <div class="form-group w-50 mr-2">
                    <div><label> Name </label>
                    <input type="text" name="name" id="modpd-name" class="form-control col-md-11" value="<?php echo $product_info[0]['name'] ?>"></div>
                    <div class="mt-1"><?php if (isset($error['name'])) {?>
                        <p class="text-danger"><?php echo $error['name'] ?></p>			
                    <?php } ?></div>
                </div>
                
                <div class="form-group w-50 mr-2 form-addpr">
                    <div><label>Thương hiệu</label>
                    <input id="input-new-brand" type="text" name="brand" id="newpd-brand" class="form-control col-md-12" list="defined-brand" value="<?php echo $brand_info[0]['brand_name'] ?>">
                    <datalist id="defined-brand">
                        <?php foreach($brand_list as $key => $value) { ?>
                            <option value="<?php echo $value['brand_name'] ?>"></option>
                        <?php } ?>
                    </datalist></div>
                    <div class="mt-1"><?php if (isset($error['brand'])) {?>
                        <p class="text-danger"><?php echo $error['brand'] ?></p>			
                    <?php } ?></div>
                </div>
            </div>
            <div class="form-group">
                <div><label class="w-100">Description</label>
                <textarea name="description" id="newpd-des" cols="100" rows="10" class="w-100"><?php echo $product_info[0]['content'] ?></textarea></div>
                <div class="mt-1"><?php if (isset($error['description'])) {?>
                        <p class="text-danger"><?php echo $error['description'] ?></p>			
                    <?php } ?></div>
            </div>
            
            <div class="d-flex justify-content-between">
            
                <div class="form-group w-50 mr-2">
                    <div>
                        <label>Image</label>
                        <input type="file" name="image[]" id="newpd-img" class="form-control border-0 bg-light" multiple>
                        <div class="d-flex mt-2">
                            <div class="row">
                                <?php foreach($image_info as $key => $value) {?>
                                    <div class="col-md-4 col-12">
                                        <div class="modpd-img">
                                            <div><?php echo $value['img_link'] ?></div>
                                            <img src="../image/<?php echo $value['img_link'] ?>" alt="">
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="mt-1"><?php if (isset($error['image'])) {?>
                            <p class="text-danger"><?php echo $error['image'] ?></p>			
                        <?php } ?></div>
                </div>
                <div class="form-group w-50 ml-2">
                    <label>Phân Loại</label>
                    <div>
                        <div><select class="form-control form-group select-cate" name="newpd-cate[]" multiple>
                            <?php foreach($cate_list as $key => $value) { ?>
                                <option value="<?php echo $value['id'] ?>" <?php foreach ($cate_info as $key => $value1) { if($value1['shopcate_id'] == $value['id']) { echo 'selected'; } } ?>><?php echo $value['shopcate_name'] ?></option>
                            <?php } ?>
                        </select></div>
                        <div><?php if (isset($error['cate'])) {?>
                        <p class="text-danger"><?php echo $error['cate'] ?></p>			
                    <?php } ?></div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div>
                    <?php
                        if ( !empty($option_info) ) {
                            switch ($option_info[0]['option_type_id']) {
                                case 1:
                                    echo '  <div class="form-group w-100 weight-mod">
                                                <label>Cân nặng:</label>';
                                                foreach ($option_info as $key => $value) {
                                                    echo '<div class="d-flex mt-2">
                                                    <input type="text" name="" id="" class="d-none" value="">
                                                    <input type="text" name="weight-option-value[]" class="input-weight-option form-control col-4" value="'.${'option_detail'.$value['option_value_id']}[0]['option_value'].'">
                                                    <input type="number" name="weight-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="weight-option-quantity form-control col-1 ml-2" value="'.${'option_detail'.$value['option_value_id']}[0]['quantity'].'">
                                                    <input type="number" name="weight-option-price[]" data-toggle="tooltip" title="Giá" class="weight-option-price form-control col-2 ml-2" value="'.${'option_detail'.$value['option_value_id']}[0]['price'].'">
                                                    <button type="button" class="addweight col-1 btn btn-primary ml-2">+</button>
                                                    <button type="button" class="delweight col-1 btn btn-primary ml-2">-</button>
                                                </div>'; }
                                    echo    '</div>';
                                    break;
                                case 2:
                                    echo '  <div class="form-group w-100 color-mod">
                                                <label>Màu sắc:</label>';
                                                foreach ($option_info as $key => $value) {
                                                    echo '<div class="d-flex mt-2">
                                                    <input type="text" name="color-option-value[]" class="input-color-option form-control col-4" value="'.${'option_detail'.$value['option_value_id']}[0]['option_value'].'">
                                                    <input type="color" name="color-option-code[]" value="'.${'option_detail'.$value['option_value_id']}[0]['color_code'].'" data-toggle="tooltip" title="Mã màu" class="col-1 ml-2 form-control p-1">
                                                    <input type="number" name="color-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="color-option-quantity form-control col-1 ml-2" value="'.${'option_detail'.$value['option_value_id']}[0]['quantity'].'">
                                                    <input type="number" name="color-option-price[]" data-toggle="tooltip" title="Giá" class="color-option-price form-control col-2 ml-2" value="'.${'option_detail'.$value['option_value_id']}[0]['price'].'">
                                                    <button type="button" class="addcolor col-1 btn btn-primary ml-2">+</button>
                                                    <button type="button" class="delcolor col-1 btn btn-primary ml-2">-</button>
                                                </div>'; }
                                    echo    '</div>';
                                    break;
                                case 3:
                                    echo '  <div class="form-group w-100 size-mod">
                                                <label>Kích thước:</label>';
                                                foreach ($option_info as $key => $value) {
                                                    echo '<div class="d-flex mt-2">
                                                    <input type="text" name="size-option-value[]" class="input-size-option form-control col-4" value="'.${'option_detail'.$value['option_value_id']}[0]['option_value'].'">
                                                    <input type="number" name="size-option-order[]" 
                                                    <input type="number" name="size-option-quantity[]" data-toggle="tooltip" title="Số lượng" class="size-option-quantity form-control col-1 ml-2" value="'.${'option_detail'.$value['option_value_id']}[0]['quantity'].'">
                                                    <input type="number" name="size-option-price[]" data-toggle="tooltip" title="Giá" class="size-option-price form-control col-2 ml-2" value="'.${'option_detail'.$value['option_value_id']}[0]['price'].'">
                                                    <button type="button" class="addsize col-1 btn btn-primary ml-2">+</button>
                                                    <button type="button" class="delsize col-1 btn btn-primary ml-2">-</button>
                                                </div>'; }
                                    echo    '</div>';
                                    break;
                                default:
                                    break;
                            }
                        }
                        else {
                            echo    '<div class="form-group w-100 no-mod">
                                        <div class="d-flex">
                                            <input type="number" name="no-option-quantity" data-toggle="tooltip" title="Số lượng" class="no-option-quantity form-control col-2" value="'.$no_option_info[0]['quantity'].'">
                                            <input type="number" name="no-option-price" data-toggle="tooltip" title="Giá" class="no-option-price form-control col-3 ml-2" value="'.$no_option_info[0]['price'].'">
                                        </div>
                                    </div>';
                        }
                    ?>
                </div>
                <div><?php if (isset($error['option'])) {?>
                    <p class="text-danger"><?php echo $error['option'] ?></p>			
                <?php } ?></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" id="modpd-btn" class="col-md-1 btn btn-success" name="btn_modify">Cập nhật</button>
            <a href="?controller=products" class="btn btn-secondary">Hủy</a>
        </div>
    </form>


</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>