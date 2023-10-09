<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/product_class.php";
?>

<?php
    $product = new product;
    if(!isset($_GET['product_id']) || $_GET['product_id'] ==NULL){ //Nếu không tồn tại id hoặc id rỗng
        echo "error";
    } else {
        $product_id = $_GET['product_id'];
    }
    $get_product = $product ->get_product($product_id);
    if($get_product) {
        $resultA = $get_product ->fetch_assoc();
    }
?>

<?php
$product= new product;
if ($_SERVER['REQUEST_METHOD'] ==='POST'){
    $category_id = $_POST['category_id'];
    $product_name= $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_img = $_FILES['product_img']['name'];
    $update_product = $product->update_product($category_id,$product_name, $product_id, $product_price, $product_desc, $product_img);

}
?>

<div class="admin-content-right">
<div class="admin-content-right-product_add">
              <h1>Chỉnh sửa thông tin sản Phẩm</h1>
              <form action="" method="POST" enctype="multipart/form-data"> <!--Thuộc tính giúp tải up file lên-->
                <label for="">Nhập tên sản phẩm<span style="color: red;">*</span> </label>
                <input name="product_name" required type="text" value="<?php echo $resultA['product_name'] ?>"/>
                <label for="">Chọn danh mục<span style="color: red;">*</span> </label>
                <select name="category_id" id="">
                    <option value="#">--Chọn--</option>
                    <?php
                        $show_category = $product->show_category();
                        if($show_category){
                            while($result = $show_category->fetch_assoc()){
                    ?>
                    <option <?php if($resultA['category_id']==$result['category_id']){echo "SELECTED";} ?> value="<?php echo $result['category_id']?>"><?php echo $result['category_name']?></option>
                    <?php       
                            }
                        }
                    ?>
                </select>
                <label for="">Giá sản phẩm<span style="color: red;">*</span> </label>
                <input name="product_price" required type="text" value="<?php echo $resultA['product_price'] ?>"/>
                <label for="">Mô tả sản phẩm<span style="color: red;">*</span> </label>
                <textarea required name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm" value="<?php echo $resultA['product_desc'] ?>"></textarea>
                <label for="">Ảnh sản phẩm<span style="color: red;">*</span> </label>
                <input name="product_img" required type="file" value="<?php echo $resultA['product_img'] ?>"/>
                <button type="submit">Sửa</button>
            </form> 
            </div>
    </section>
</body>
</html>

