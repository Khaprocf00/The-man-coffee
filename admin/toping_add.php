<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/toping_class.php";
?>

<?php
$toping = new toping;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_toping = $toping->insert_toping();
}
?>

<div class="admin-content-right">
    <div class="admin-content-user_add">
        <h1>Thêm topping</h1>
        <div class="form">
            <form action="" method="POST">
                <p>Name Topping<span>*</span></p>
                <input required name="name" type="text" />
                <p>Price Topping<span>*</span></p>
                <input required name="price" type="text" />
                <br>
                <div class="bg-input"><input class="button" type="submit" value="Thêm"></div>
            </form>
        </div>
    </div>
</div>
</section>
</body>

</html>