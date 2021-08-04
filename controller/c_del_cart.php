<?php
    $id=$_GET['id'];
    $weight_id = $_GET['weight'];
    $color_id = $_GET['color'];
    $size_id = $_GET['size'];

    unset($_SESSION['cart'][$id.'c'.$color_id.'w'.$weight_id.'s'.$size_id]);

    header('location: ?controller=cart');
?>