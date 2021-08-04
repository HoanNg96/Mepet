<?php include_once('header.php'); ?>

    <div class="content">
        <div class="container-fluid products">
            <div class="content-header"></div>
            <div class="content-main">
                <form action="" method="post" name="cart-control">
                    <div class="cart-body" id="ajax-cart">
                        <table class="table cart-table text-center" id="cart-table">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col" colspan="2">SẢN PHẨM</th>
                                    <th scope="col">GIÁ</th>
                                    <th scope="col">SỐ LƯỢNG</th>
                                    <th scope="col">THÀNH TIỀN</th>
                                    <td scope="col"><a href="?controller=delallcart" class="del-cart">
                                    <i class="fal fa-times"></i></a></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php   
                                        $total_cart = 0;
                                        if(!isset($_SESSION['cart'])) { ?>
                                        <td colspan="7" class="text-center blank-cart"><?php echo "Giỏ hàng hiện đang trống !" ?></td>
                                <?php }
                                    else {  if (empty($_SESSION['cart'])) { ?>
                                            <td colspan="7" class="text-center blank-cart"><?php echo "Giỏ hàng hiện đang trống !" ?></td>
                                        <?php  } else {
                                            $i=0;
                                            foreach ($_SESSION['cart'] as $key => $value) {
                                            $i += 1;
                                        ?>
                                        <tr class="cart-item">
                                            <td class="cart-no"><?php echo $i ?>.</td>
                                            <td scope="row" class="cart-image" data-label="Tên Sản Phẩm"><a href="?controller=productdetail&id=<?php echo $value['id'] ?>"><img src="./image/<?php echo $value['img_link'] ?>" alt="" style="width: 100px"></a></td>
                                            <td class="text-left">
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
                                            <td data-label="Giá"><?php echo number_format ($value['price'],0,",",".") ?>đ</td>
                                            <td data-label="Số Lượng">
                                                <div class="change-cart-quantity">
                                                    <a href="" class="inc-quantity"><i class="fal fa-plus"></i></a>
                                                    <input type="number" min="1" max="99" value="<?php echo $value['sl'] ?>" step="1" class="change-cart-quantity-number" id="<?php echo $value['id'].'c'.$value['color'].'w'.$value['weight'].'s'.$value['size'] ?>">
                                                    <a href="" class="dec-quantity"><i class="fal fa-minus"></i></a>
                                                </div>
                                            </td>
                                            <td data-label="Tổng"><?php echo number_format($value['price']*$value['sl'],0,",",".") ?>đ</td>
                                            <td>
                                                <a href="?controller=delcart&id=<?php echo $value['id'] ?>&weight=<?php echo $value['weight'] ?>&color=<?php echo $value['color'] ?>&size=<?php echo $value['size'] ?>" class="del-cart"><i class="fal fa-times"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                            $total_cart += $value['sl']*$value['price'];
                                            }
                                        }
                                } ?>
                            </tbody>
                        </table>
                        <div class="total-cart d-flex justify-content-end">
                            Tổng: <span><?php echo number_format ($total_cart,0,",",".") ?>đ</span>
                        </div>
                        <div class="check-out d-flex justify-content-end" id="checkout-btn">
                            <?php
                                if(isset($_SESSION['cart'])) { ?>
                                    <a href="?controller=orderinfo" class="enable">THANH TOÁN</a>
                            <?php   }
                                else { ?>
                                    <a class="disabled">THANH TOÁN</a> 
                            <?php
                                }
                            ?>
                        </div>
                        <div class="m-del-cart justify-content-end">
                            <?php
                                if(isset($_SESSION['cart'])) { 
                            ?>
                                <a href="javascript:void(0)" class="enable" id="m-del-all-cart">XÓA GIỎ HÀNG</a>
                            <?php   
                                } else { 
                            ?>
                                <a class="disabled">XÓA GIỎ HÀNG</a> 
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once('footer.php'); ?>