<?php
include "header.php";
// include "header.php";
// include "slider.php";
include "class/product_class.php";

$product = new product;
if(!isset($_GET['product_id']) || $_GET['product_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
    echo "error";
} else {
    $product_id = $_GET['product_id'];
}
    $delete_product = $product -> delete_product($product_id);

?>
