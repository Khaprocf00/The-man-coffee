<?php session_start();
if (isset($_GET['logout'])) {
    unset($_SESSION['login']);
    header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/base1.css">
    <link rel="stylesheet" href="./assets/css/gird.css">
    <link rel="stylesheet" href="./assets/css/loginnn.css">
</head>

<body>
    <div class="bg-title" style="min-width: 80%; margin: 0 auto; ">
        <div class="img"> <a href="index.php"><img width="200px" src="./assets/img/logoo.webp" alt=""></a></div>
        <span>Đăng nhập</span>
    </div>
    <div id="bao-bg">
        <div id="bg">
        <img width="100%" height="100%" style="position: absolute; z-index: 0;" src="assets/img/login_picture.png" alt="">
            <form action="index.php" method="post">
                <div class="title">Đăng nhập <img width="150px" src="./assets/img/logoo.webp" alt=""></div>
                <div>
                    <input required class="input-text" name="user" type="email" value="<?php if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
                                                                                            echo $_COOKIE['user'];
                                                                                        } else {
                                                                                            echo '';
                                                                                        } ?>">
                </div>
                <div>
                    <input required class="input-text" name="pass" type="password" value="<?php if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
                                                                                                echo $_COOKIE['pass'];
                                                                                            } ?>">
                </div>
                <div class="bg-checkbox"><input class="checkbox" <?php if (isset($_COOKIE['pass']) && isset($_COOKIE['user'])) {
                                                                        echo "checked";
                                                                    } ?> name="checkbox" type="checkbox"> Lưu thông tin đăng nhập</div>
                <input class="submit" name="login" type="submit" value="Đăng nhập">
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <div class="notify"><?= $_SESSION['error'] ?></div>
                <?php
                }
                ?>
                <div style="flex: 1; justify-content: center; margin: 20px 0 0;">Bạn mới biết đến THE MAN COFFEE?
                    <a href="register.php" style="color: var(--main-color); font-weight: 600; margin-left: 5px;">Đăng ký</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>