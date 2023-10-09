<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/category_class.php";
?>

<?php
    $category = new category;
    if(!isset($_GET['category_id']) || $_GET['category_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
        echo "error";
    } else {
        $category_id = $_GET['category_id'];
    }
    $get_category = $category ->get_category($category_id);
    if($get_category) {
        $result = $get_category ->fetch_assoc();
    }
?>

<?php
$category = new category;
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
  $category_name = $_POST['category_name'];
  $update_category = $category->update_category($category_name, $category_id);

}
?>

<div class="admin-content-right">
  <div class="admin-content-user_add">
              <h1>Thay đổi tên danh mục</h1>
              <div class="form">
                  <form action="" method="POST">
                    <p>Tên danh mục<span>*</span></p>
                    <input name="category_name" type="text" placeholder="Nhập tên danh mục" value="<?php echo $result['category_name']?>"/>
                    <div class="bg-input">
                        <button class="button" type="submit">Lưu</button>
                        <a class="button" href="category_list.php">Thoát</a>
                    </div>
                </form> 

              </div>
            </div>
        </div>

    </section>
</body>
</html>