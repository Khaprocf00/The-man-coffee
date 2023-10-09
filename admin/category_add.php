<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/category_class.php";
?>

<?php
$category = new category;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category_name = $_POST['category_name'];
  $insert_category = $category->insert_category($category_name);
}
?>

<div class="admin-content-right">
  <div class="admin-content-user_add">
    <h1>Thêm Danh Mục</h1>
    <div class="form">
      <form action="" method="POST">
        <p>Tên danh mục<span>*</span></p>
        <input required name="category_name" type="text" />
        <div class="bg-input"><input class="button" type="submit" value="Thêm"></div>
      </form>
    </div>
  </div>
</div>
</section>
</body>

</html>