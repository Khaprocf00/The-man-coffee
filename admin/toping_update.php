<?php
include "header.php";

include "class/toping_class.php";
?>

<?php
    $toping = new toping;
    if(!isset($_GET['toping_id']) || $_GET['toping_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
        echo "Tài khoản không tồn tại";
    } else {
        $toping_id = $_GET['toping_id'];
    
    $get_toping = $toping ->get_toping($toping_id);
    if($get_toping) {
        $result = $get_toping->fetch_assoc();
    }
?>

<?php
 $toping = new toping;
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $update_toping = $toping->update_toping($toping_id);
}
?>

<div class="admin-content-right">
  <div class="admin-content-user_add">
              <h1>Cập nhật topping</h1>
              <div class="form">
                  <form action="" method="POST">
                    <p>Name Topping<span>*</span></p>
                    <input name="name" type="text" value="<?php echo $result['name']?>"/>
                    <p>Price Topping<span>*</span></p>
                    <input name="price" type="text" value="<?php echo $result['price']?>"/>
                    <div class="bg-input">
                    <button class="button"  type="submit">Lưu</button><br/>
                    <a  class="button" href="toping_list.php">Thoát</a>
                    </div>
                </form> 
              </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php

}?>