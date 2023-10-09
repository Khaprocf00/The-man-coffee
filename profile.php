<?php
session_start();
include 'inc/link.php';

?>
<link rel="stylesheet" href="assets/css/profile.css">

<?php
include 'inc/header.php';
?>

<?php
    $select = $conn->select("select * from user_login where email ='".$_SESSION['login']['user']."'");
    $row = mysqli_fetch_assoc($select);
?>
<div id="profile">
    <div  class="bg">
        <div class="profile-header">
            <div class="title">Hồ sơ của tôi</div>
            <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        </div>
        <div class="profile-body">
            <form action="" method="post">
                <div>
                    <span class="label">Email</span> <input disabled class="input-text" type="email" value="<?=$row['email']?>">
                </div>
                <div>
                    <span class="label">Tên đăng nhập</span> <input disabled class="input-text" type="text" value="<?=$row['name']?>">
                </div>
                <div>
                    <span class="label">Số điện thoại</span> <input disabled class="input-text" type="text" value="<?=$row['phone_number']?>">
                </div>
                <div>
                    <span class="label">Mật khẩu</span> <input disabled class="input-text input-pass" type="password" value="<?=$row['pass']?>">
                </div>
                <div>
                    <span class="label">Giới tính
                        <div class="bg-radio">
                            <input disabled <?php if($row['gender'] == 'Nam'){ echo 'checked';};?> class="gioitinh" name="gioitinh" type="radio" value="Nam"> Nam
                            <input disabled <?php if($row['gender'] == 'Nữ'){ echo 'checked';};?> class="gioitinh" name="gioitinh" type="radio" value="Nữ"> Nữ
                            <input disabled <?php if($row['gender'] == 'Khác'){ echo 'checked';};?> class="gioitinh" name="gioitinh" type="radio" value="Khác"> Khác
                        </div>
                    </span>
                </div>
                <div>
                    <span class="label">Ngày sinh<input disabled class="date" type="date" value="<?=$row['birthday']?>" ></span>
                </div>
            </form>
        </div>


    </div>
</div>

<?php
include 'inc/footer.php'
?>