<?php
session_start();
if(isset($_SESSION['login']))
{
include 'inc/link.php';
?>

<link rel="stylesheet" href="./assets/css/product.css">
<?php
include 'inc/header.php';
?>
<div id="container-product">
    <div class="grid wide">
        <h1 style="margin:20px 0; font-size: 2.6rem;">Sản Phẩm</h1>
        <div class="row bg-container-product">
            <?php
            $price = 0;
            $name = '';
            $option_size = '';
            $option_toping = '';
            if (isset($_GET['cat'])) {
                $catt = $_GET['cat'];
                if ($_GET['cat'] == $catt) {
                    $query = "SELECT * FROM product where product_id = " . $catt;
                    $products = $conn->select($query);
                    $row = mysqli_fetch_array($products)
            ?>
                    <form action="cart.php?cat=<?=$catt ?>" method="POST">

                        <div class="item item-left">
                            <img src="<?php echo "./admin/uploads/" . $row['product_img'] ?>" alt="">
                        </div>
                        <div class="item item-right">
                            <h1 class="product-title"><?= $row['product_name'] ?></h1>
                            <p class="price"><span id="price"><?= $row['product_price'] ?></span><b>đ</b></p>
                            <p class="desc"><?= $row['product_desc'] ?></p>
                            <div class="choose-size">Chọn size(bắt buộc)</div>
                            <div class="row size">
                                <?php
                                $product_option_size = $conn->select("SELECT * FROM option_size ");
                                while ($roww = mysqli_fetch_array($product_option_size)) {
                                ?>

                                    <input id="<?= $roww['name'] ?>" name="name-size" type="radio" value="<?= $roww['name'] ?>">
                                    <label class="button buttonsize" for="<?= $roww['name'] ?>"><?= $roww['name'] ?> + <span class="addprice-size"><?= $roww['price'] ?></span>đ</label>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="choose-size">Topping</div>
                            <div class="row size">
                                <?php
                                $product_option_toping = $conn->select("SELECT * FROM option_toping ");
                                while ($roww = mysqli_fetch_array($product_option_toping)) {
                                ?>

                                    <input id="<?= $roww['name'] ?>" name="name-toping" type="radio" value="<?= $roww['name'] ?>">
                                    <label class="button button-toping" for="<?= $roww['name'] ?>"><?= $roww['name'] ?> + <span class="addprice-toping"><?= $roww['price'] ?></span>đ</label>

                                <?php
                                }
                                ?>
                            </div>
                            <a href="">
                                <div class="buy">
                                    <input type="submit" value="Thêm vào giỏ hàng">
                                </div>
                            </a>
                        </div>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- link -->
<script src="./js/product.js"></script>

<?php
    include 'inc/footer.php';
        }
        else{
            header('Location:login.php');
        }
?>