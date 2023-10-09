<?php
include "header.php";
include "class/size_class.php";

$size = new size;
if(!isset($_GET['size_id']) || $_GET['size_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
    echo "Tài khoản không tồn tại";
} else {
    $size_id = $_GET['size_id'];
}
    $delete_size = $size-> delete_size($size_id );
?>
