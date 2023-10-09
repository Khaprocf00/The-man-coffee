<?php
include 'inc/connect.php';
$con = new Database;

if(!isset($_GET['deletecart']) || $_GET['deletecart'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
    echo "error";
} else {
    ?>
    <script>
        alert("xxx");
    </script>
    <?php
    $id_cart = $_GET['deletecart'];
    $delete_cart = $con->delete("delete from cart where id_cart =".$id_cart);
    header('Location:cart.php');
}

?>
