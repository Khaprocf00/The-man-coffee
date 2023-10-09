<?php 
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['user'])) {
    $user = $_POST['user'];
}
if (isset($_POST['phone_number'])) {
    $phone_number = $_POST['phone_number'];
}
if (isset($_POST['pass'])) {
    $pass = $_POST['pass'];
}
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}
if (isset($_POST['date'])) {
    $date = $_POST['date'];
}
?>
<?php
include 'inc/connect.php';
?>
<?php
$conn = new Database();
$index = 0;
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
    <link rel="stylesheet" href="./assets/css/registerr.css">
</head>

<body>
    <div class="bg-title" style="min-width: 80%; margin: 0 auto; ">
        <div class="img"> <img width="200px" src="./assets/img/logoo.webp" alt=""></div>
        <span>Đăng ký</span>
    </div>
    <div id="bao-bg">
        <div id="bg">
            <img width="100%" height="100%" style="position: absolute; z-index: 0;" src="assets/img/login_picture.png" alt="">
            <form action="" method="post">
                <div class="title">Đăng ký <img width="150px" src="./assets/img/logoo.webp" alt=""></div>
                <div class="bg-if-error">
                    <input style="flex: 1; width: 100%;" required class="input-text" name="email" type="email" placeholder="Email" value="<?php if (isset($_POST['email'])) {
                                                                                                                                                echo $email;
                                                                                                                                            } ?>">
                    <?php
                    if (isset($_POST['email'])) {
                        $email = $_POST['email'];
                        $select = $conn->select("select * from user_login where email = '" . $email . "'");
                        if ($select != false) {
                            echo "<div style='color : red; margin-top: 5px;'>Email này đã tồn tại</div>";
                        } else {
                            $index++;
                        }
                    }
                    ?>
                </div>
                <div>
                    <input required class="input-text" name="user" type="text" placeholder="Tên đăng nhập" value="<?php if (isset($_POST['user'])) {
                                                                                                                        echo $user;
                                                                                                                    } ?>">
                </div>
                <div class="bg-if-error">
                    <input style="flex: 1; width: 100%;" required class="input-text" name="phone_number" type="text" placeholder="Số điện thoại" value="<?php if (isset($_POST['phone_number'])) {
                                                                                                                                                            echo $phone_number;
                                                                                                                                                        } ?>">
                    <?php
                    if (isset($_POST['phone_number'])) {
                        $phone_number = $_POST['phone_number'];
                        if ($phone_number[0] == '0' && strlen($phone_number) == 10) {
                            $k = (int)$phone_number;
                            $k = (string)$k;
                            if (strlen($k) != 9) {
                                echo "<div style='color : red; margin-top: 5px;'>Số điện thoại không hợp lệ</div>";
                            } else {
                                $index++;
                            }
                        } else {
                            echo "<div style='color : red; margin-top: 5px;'>Số điện thoại không hợp lệ</div>";
                        }
                    }
                    ?>
                </div>
                <div class="bg-if-error">
                    <input style="flex: 1; width: 100%;" required class="input-text" name="pass" type="password" placeholder="Password" value="<?php if (isset($_POST['pass'])) {
                                                                                                                                                    echo $pass;
                                                                                                                                                } ?>">
                    <?php
                    if (isset($_POST['pass'])) {
                        $pass = $_POST['pass'];
                        if (strlen($pass) > 6) {
                            echo "<div style='color : red; margin-top: 5px;'>Mật khẩ ít hơn 6 kí tự</div>";
                        } else {
                            $index++;
                        }
                    }
                    ?>
                </div>
                <div>
                    <div>Giới tính:</div>
                    <input required <?php if (isset($_POST['gender'])) {
                                        if ($gender == 'Nam') {
                                            echo 'checked';
                                        };
                                    } ?> class="radio" name="gender" type="radio" value="Nam"><span>Nam</span>
                    <input required <?php if (isset($_POST['gender'])) {
                                        if ($gender == 'Nữ') {
                                            echo 'checked';
                                        };
                                    } ?> class="radio" name="gender" type="radio" value="Nữ"><span>Nữ</span>
                    <input required <?php if (isset($_POST['gender'])) {
                                        if ($gender == 'Khác') {
                                            echo 'checked';
                                        };
                                    } ?> class="radio" name="gender" type="radio" value="Khác"><span>Khác</span>
                </div>
                <div>
                    <div>Ngày sinh:</div><input required class="date" name="date" type="date" value="<?php if (isset($_POST['date'])) {
                                                                                                            echo $date;
                                                                                                        } ?>">
                </div>
                <input class="submit" name="login" type="submit" value="Đăng ký">
                <?php
                if ($index == 3) {
                    $insert = $conn->insert("insert into user_login(email,name,phone_number,pass,gender,birthday) values('$email','$user','$phone_number','$pass','$gender','$date')");
                    echo "<div style='flex: 1; justify-content: center; margin: 20px 0 0; color: rgb(16, 122, 16);'>Đăng ký thành công
                    
                </div>";
                    $_POST['email'] = '';
                    $_POST['user'] = '';
                    $_POST['phone_number'] = '';
                    $_POST['pass'] = '';
                    $_POST['gender'] = '';
                    $_POST['date'] = '';
                }
                ?>
                <div style="flex: 1; justify-content: center; margin: 20px 0 0;">Bạn đã có tài khoản?
                    <a href="login.php" style="color: var(--main-color); font-weight: 600; margin-left: 5px;">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>