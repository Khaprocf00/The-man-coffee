<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/size_class.php";
?>

<?php
$size = new size;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $insert_size = $size->insert_size();
}
?>

<div class="admin-content-right">
    <div class="admin-content-user_add">
        <h1 style="font-size: 30px; text-transform: uppercase;">Thêm size</h1>
        <div class="form">
            <form action="" method="POST">
                <p>Name size<span>*</span></p>
                <input required name="name" type="text" />
                <p>Price size<span>*</span></p>
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