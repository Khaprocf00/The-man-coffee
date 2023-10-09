<?php
session_start();
include 'inc/link.php';
?>

<?php
include 'inc/header.php';
include 'inc/slider.php';
?>
<!-- 
<?php
if (isset($_GET['buy'])) {
    $select = $conn->select("select * from cart");
    if ($select != false) {
        while ($row_cart = mysqli_fetch_assoc($select)) {
            $delete_cart = $conn->delete("delete from cart where id_cart = " . $row_cart['id_cart']);
        }
    }
    header('Location:index.php');
}
?> -->

<!--CONTAINER-->
<div id="container">
<!--Menu-->
    <div id="menu">
        <div class="grid wide">
            <div class="row menu-bg">
                <img src="./assets/img/logoo.webp" alt="">
                <div class="menu-title">Menu Hôm Nay</div>
                <div class="row menu-nav">
<!-- Danh mục -->
                    <?php
                    $select_category = $conn->select("select * from category");
                    $index = 0;
                    while ($row_category = mysqli_fetch_assoc($select_category)) {
                        $index++;
                        $style = "style='background-color: var(--main-color);
                        color: var(--white-color);'"
                    ?>

                        <a class="button" href="?cat=<?= $row_category['category_id'] ?>#menu"
                        <?php
                         if (isset($_GET['cat'])) {
                            if($_GET['cat']== $row_category['category_id']){
                                echo $style;
                            }
                         }
                        ?>
                        ><?= $row_category['category_name'] ?></a>
                    <?php
                    }
                    ?>
<!-- Sản phẩm -->
                </div>
                <div class="row menu-product">
                    <?php
                    if (isset($_GET['cat'])) {
                        $cat = $_GET['cat'];
                        if ($_GET['cat'] == $cat) {
                            $select_category = $conn->select("select * from category where category_id =".$cat);
                            $row_category = mysqli_fetch_assoc($select_category);
                            $query = "SELECT * FROM product where category_id =  '".$row_category['category_name']."'";
                            $products = $conn->select($query);
                            if ($products != false) {
                                while ($row = mysqli_fetch_array($products)) {
                                    ?>
                                    <a href="product.php?cat=<?php echo $row['product_id']; ?>" class="row c-3 bg-product">
                                        <div class="img"><img src="<?php echo "./admin/uploads/" . $row['product_img']; ?>" alt=""></div>
                                        <div class="title"><b><?php echo $row['product_name']; ?></b></div>
                                        <div class="price">Giá: <b><?php echo $row['product_price'] / 1000; ?>.000đ</b></div>
                                    </a>
                                <?php
                                }
                            } else {
                                ?>
                                <h1 style="font-size: 50px; margin: 100px 0;">Chưa có sản phẩm</h1>
                            <?php
                            }
                        }
                    } else {
                        $products = $conn->select("SELECT * FROM product");
                        while ($row = mysqli_fetch_array($products)) {
                            ?>
                            <a href="product.php?cat=<?php echo $row['product_id']; ?>" class="row c-3 bg-product">
                                <div class="img"><img src="<?php echo "./admin/uploads/" . $row['product_img']; ?>" alt=""></div>
                                <div class="title"><b><?php echo $row['product_name']; ?></b></div>
                                <div class="price">Giá: <b><?php echo $row['product_price'] / 1000; ?>.000đ</b></div>
                            </a>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
<!--Giờ mở cửa && đặt bàn-->
        <div id="time-open">
            <div class="row time-open-bg">
                <div class="row time-open-item time-open-left">
                    <img class="img-title" src="https://uptoaltar.github.io/TeaHouse./assets/img/title_base_2.webp" alt="">
                    <div class="title">Thời gian mở cửa</div>
                    <div class="text">“Cà phê nhé" - Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để
                        mình ngồi lại bên nhau và sẻ chia câu chuyện của riêng mình. THE MAN COFFEE hẹn gặp bạn chốn quen
                        thuộc.</div>
                    <div class="time">T2 - T6: 8h30 - 21h30</div>
                    <div class="time">T7 - CN: 8h00 - 22h00</div>
                    <a href="" class="button">Đặt bàn ngay</a>
                    <img class="time-logo" src="./assets/img/body__time-logo.webp" alt="">
                </div>
                <div class="time-open-item time-open-right">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'inc/footer.php'
?>
