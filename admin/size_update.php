<?php
include "header.php";

include "class/size_class.php";
?>

<?php
$size = new size;
if (!isset($_GET['size_id']) || $_GET['size_id'] == NULL) { //Nếu không tồn tại id hoặc id rỗng
    echo "Tài khoản không tồn tại";
} else {
    $size_id = $_GET['size_id'];

    $get_size = $size->get_size($size_id);
    if ($get_size) {
        $result = $get_size->fetch_assoc();
    }
?>

    <?php
    $size = new size;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $update_size = $size->update_size($size_id);
    }
    ?>

    <div class="admin-content-right">
        <div class="admin-content-user_add">
            <h1>Cập nhật size</h1>
            <div class="form">
                <form action="" method="POST">
                    <p>Name Size<span>*</span></p>
                    <input name="name" type="text" value="<?php echo $result['name'] ?>" />
                    <p>Price Size<span>*</span></p>
                    <input name="price" type="text" value="<?php echo $result['price'] ?>" />
                    <div class="bg-input">
                        <button class="button" type="submit">Lưu</button><br />
                        <a class="button" href="size_list.php">Thoát</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>
    </body>

    </html>
<?php

} ?>