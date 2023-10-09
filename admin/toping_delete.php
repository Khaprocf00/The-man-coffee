<?php
include "header.php";
include "class/toping_class.php";

$toping = new toping;
if(!isset($_GET['toping_id']) || $_GET['toping_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
    echo "Tài khoản không tồn tại";
} else {
    $toping_id = $_GET['toping_id'];
}
    $delete_toping = $toping-> delete_toping($toping_id );
?>
