<?php
include "header.php";
include "class/user_class.php";
?>

<?php
$user = new user;
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $insert_user = $user->insert_user($username,$password,$status);
}
?>

<div class="admin-content-right">
            <div class="admin-content-user_add">
                <h1 >Thêm tài khoản</h1>
                <div class="form">
                <form action="" method="POST">
                <p>Username<span>*</span></p>
                <input required name="username" type="text" />
                <p>Password<span>*</span></p>
                <input required name="password" type="text" />
                <p>Status<span>*</span></p>
                <input required name="status" type="text"  /><br>
                <div class="bg-input"><input class="button" type="submit" value="Thêm"></div>
            </form> 
                </div>
            </div>
        </div>
    </section>
</body>
</html>