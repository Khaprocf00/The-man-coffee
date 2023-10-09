<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/category_class.php";

$category = new category;
if(!isset($_GET['category_id']) || $_GET['category_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
    echo "error";
} else {
    $category_id = $_GET['category_id'];
}
    $delete_category = $category -> delete_category($category_id);

?>
