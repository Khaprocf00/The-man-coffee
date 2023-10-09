<?php
include "header.php";

include "class/user_class.php";
?>

<?php
    $user = new user;
    if(!isset($_GET['user_id']) || $_GET['user_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
        echo "Tài khoản không tồn tại";
    } else {
        $user_id = $_GET['user_id'];
    }
    $get_user = $user ->get_user($user_id);
    if($get_user) {
        $result = $get_user->fetch_assoc();
    }
?>

<?php
 $user = new user;
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $update_user = $user->update_user($username, $password, $status, $user_id);

}
?>

<div class="admin-content-right">
            <div class="admin-content-user_add">
              <h1>Cập nhật tài khoản</h1>
              <div class="form">
                  <form action="" method="POST">
                  <p>Username<span>*</span></p>
                    <input name="username" type="text" value="<?php echo $result['username']?>"/>
                    <p>Password<span>*</span></p>
                    <input name="password" type="text" value="<?php echo $result['password']?>"/>
                    <p>Status<span>*</span></p>
                    <input name="status" type="text"  value="<?php echo $result['status']?>"/><br/>
                    <div class="bg-input">
                        <button class="button" type="submit">Lưu</button>
                        <a class="button" href="user_list.php">Thoát</a>
                    </div>
                </form> 
              </div>
            </div>
        </div>
    </section>
</body>
</html>