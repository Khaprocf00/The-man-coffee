<?php
include "header.php";


include "class/user_class.php";

$user = new user;
if(!isset($_GET['user_id']) || $_GET['user_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
    echo "Tài khoản không tồn tại";
} else {
    $user_id = $_GET['user_id'];
}
    $delete_user = $user-> delete_user($user_id );
?>
