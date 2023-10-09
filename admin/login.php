<?php
include "class/user_class.php";
$user = new user;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà Cà phê</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div id="bg-login">
        <div class="admin-content-user_add">
                <h1 style="font-size: 30px; text-transform: uppercase;">Thông tin đăng nhập</h1>
                <div class="form">
                <form action="" method="POST">
                <p>Username<span style="color:red;">*</span></p>
                <input required name="username" type="text" />
                <p>Password<span style="color:red;">*</span></p>
                <input required name="password" type="password" />
                <div class="bg-input"><input class="button" type="submit" value="Đăng nhập"></div>
            </form> 
                </div>
            </div>
        <div class="thongbao">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $login_user = $user->login_user($username, $password);
            }
            ?>
        </div>

    </div>
</body>

</html>