<?php
session_start();


if (isset($_SESSION['login'])) {
    include 'inc/link.php';
    if (isset($_POST['submit'])) {
        $select = $conn->select("select * from cart");
        if ($select != false) {
            $k = 1;
            while ($row_cart = mysqli_fetch_assoc($select)) {
                $delete_cart = $conn->delete("delete from cart where id_cart = " . $row_cart['id_cart']);
            }
        }
?>

    <?php
    }
    ?>
    <link rel="stylesheet" href="assets/css/cart.css">
    <?php


    if (isset($_GET['cat'])) {
        $cat = $_GET['cat'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['name-size']))
                $namesize = $_POST['name-size'];
            if (isset($_POST['name-toping']))
                $nametoping = $_POST['name-toping'];
            $select_product = $conn->select("select * from product where product_id = " . $cat);
            $row = mysqli_fetch_assoc($select_product);
            $insert = $conn->insert("INSERT INTO cart( img_product, name_product, name_size, name_toping, price_product, amount) 
    VALUES ('" . "admin/uploads/" . $row['product_img'] . "','" . $row['product_name'] . "','" . $namesize . "','" . $nametoping . "','" . $row['product_price'] . "','1')");
            header("Location:cart.php");
        }
    }

    ?>


    <?php
    include 'inc/header.php';
    ?>
    <form action="" method="POST">
        <div id="container-cart">
            <div class="bgcontainer-cart">
                <h1><i class="icon-file fa-solid fa-file"></i>Xác nhận đơn hàng</h1>
                <div class="container-cart-item">
                    <div class="item container-cart-left">
                        <div class="left1">
                            <div class="left1-item left1-item1">Giao hàng</div>
                            <div class="left1-item left1-item2">Đổi phương thức</div>
                        </div>

                        <div class="left2">
                            <div class="left2-item">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ1kG5010B81gxEYD05rk3_TGiIlwkTZaMP5-0eTPcWkxbN5iUObUMC&usqp=CAU" alt="">
                                <div class="content">
                                    <p>Địa chỉ nhận hàng</p>
                                    <textarea  class="ip" width="100%" type="text"></textarea>
                                </div>
                            </div>
                            <div class="left2-item">
                                <input  class="ip" width="100%" type="text" placeholder="Tên người nhận">
                            </div>
                            <div class="left2-item">
                                <input  class="ip" type="text" placeholder="Số điện thoại">
                            </div>
                            <div class="left2-item">
                                <input  class="ip" type="text" placeholder="Thêm hướng dẫn giao hàng">
                            </div>
                        </div>


                        <div class="left3">
                            <div class="left3-item">Phương thức thanh toán</div>
                        </div>
                        <div class="left4">
                            <div class="left4-item">
                                <input  type="radio" name="check">
                                <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/1000_photo_2021-04-06_11-17-08.jpg" alt="">
                                <p>Tiền mặt</p>
                            </div>
                            <div class="left4-item">
                                <input  type="radio" name="check">
                                <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/386_ic_momo@3x.png" alt="">
                                <p>MoMo</p>
                            </div>
                            <div class="left4-item">
                                <input  type="radio" name="check">
                                <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/388_ic_zalo@3x.png" alt="">
                                <p>ZaloPay</p>
                            </div>
                            <div class="left4-item">
                                <input  type="radio" name="check">
                                <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/1120_1119_ShopeePay-Horizontal2_O.png" alt="">
                                <p>ShopeePay</p>
                            </div>
                            <div class="left4-item">
                                <input  type="radio" name="check">
                                <img src="https://minio.thecoffeehouse.com/image/tchmobileapp/385_ic_atm@3x.png" alt="">
                                <p>Thẻ ngân hàng</p>
                            </div>

                        </div>
                        <div class="left5">
                            <input  type="checkbox">
                            <p>Đồng ý với các <b class="span">điều khoản và điều kiện</b> mua hàng của THE MAN COFFEE
                            </p>
                        </div>

                    </div>
                    <div class="item container-cart-right">
                        <div class="right1">
                            <div class="item1">Các món đã chọn</div>
                            <a href="index.php#menu" class="item2">Thêm món</a>
                        </div>
                        <?php
                        $thanhtien = 0;
                        $select_cart = $conn->select("select * from cart");
                        if ($select_cart != false) {

                            while ($row = mysqli_fetch_assoc($select_cart)) {
                        ?>
                                <div class="right2">
                                    <div class="right2-left">
                                        <div class="right2-item">
                                            <img src="<?= $row['img_product'] ?>" alt="">
                                        </div>
                                        <div class="right2-item">
                                            <div class="info-product name-product"><?= $row['name_product'] ?></div>
                                            <?php
                                            $price_size = 0;

                                            if ($row['name_size'] != '') {
                                                $select  = $conn->select("select * from option_size where name = '" . $row['name_size'] . "'");
                                                if ($select != false) {
                                                    $roww = mysqli_fetch_assoc($select);
                                                    $price_size = $roww['price'];

                                            ?>
                                                    <div class="info-product size-product">Size : <?= $row['name_size'] ?></div>
                                                <?php
                                                }
                                            }
                                            $price_toping = 0;
                                            if ($row['name_toping'] != '') {
                                                $select  = $conn->select("select * from option_toping where name = '" . $row['name_toping'] . "'");
                                                if ($select != false) {
                                                    $roww = mysqli_fetch_assoc($select);
                                                    $price_toping = $roww['price'];
                                                ?>
                                                    <div class="info-product toping-product">Topping : <?= $row['name_toping'] ?></div>
                                            <?php }
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="right2-left">
                                        <div class="right2-item">
                                            <?php
                                            $price_cart = $row['price_product'];
                                            if (isset($price_size)) {
                                                $price_cart += $price_size;
                                            }
                                            if (isset($price_toping)) {
                                                $price_cart += $price_toping;
                                            }
                                            $thanhtien += $price_cart;
                                            ?>
                                            <div class="price-product"><?= $price_cart / 1000 ?><span>.000đ</span></div>
                                        </div>
                                        <div class="right2-item">
                                            <a href="delete_cart.php?deletecart= <?= $row['id_cart'] ?>"><i class="icon-delete-product fa-solid fa-circle-xmark"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            ?>
                            <img width="100%" style="scale: .7;" src="https://uptoaltar.github.io/TeaHouse/assets/img/empty-cart.webp" alt="">
                        <?php
                        }




                        ?>

                        <div class="right3">
                            Tổng cộng
                        </div>
                        <div class="right5">
                            <p>Thành tiền</p>
                            <div class="price"><?= $thanhtien / 1000 ?>.000đ</div>
                        </div>
                        <div class="right4">
                            <?php
                            if (isset($_POST['submit'])) {
                                echo "Đặng hàng thành công";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="buy-product">
                        <div class="buy-product-item-left">
                            <p>Thành tiền</p>
                            <div class="price"><b><?= $thanhtien / 1000 ?>.000đ</b></div>
                        </div>
                        <div class="buy-product-item-right">
                            <input style="border: none;" class="btn" name="submit" type="submit" value="Đặt hàng">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php
    include 'inc/footer.php';
} else {
    header('Location:login.php');
}
// $select = $conn->select('select * from cart');
if (isset($_POST['submit'])) {
    if (isset($k)) {
    ?>
        <script>
            alert("Đã đặt hàng");
        </script>

    <?php

    } else {
    ?>
        <script>
            alert("Chưa có sản phẩm");
        </script>

<?php
    }
}
?>