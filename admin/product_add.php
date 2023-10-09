<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/product_class.php";
?>

<?php
    $product = new product();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $insert_product = $product -> insert_product();
    }
?>

<div class="admin-content-right">
<div class="admin-content-right-product_add">
              <h1 style=" font-size: 30px; text-transform: uppercase;">Thêm Sản Phẩm</h1>
              <form action="" method="POST" enctype="multipart/form-data"> <!--Thuộc tính giúp tải up file lên-->
                <label for="">Nhập tên sản phẩm<span style="color: red;">*</span> </label>
                <input name="product_name" required type="text"/>
                <label for="">Chọn danh mục<span style="color: red;">*</span> </label>
                <select name="category_name" id="">
                    <option value="#">--Chọn--</option>
                    <?php
                        $show_category = $product->show_category();
                        if($show_category){
                            while($result = $show_category->fetch_assoc()){
                    ?>
                    <option value="<?php echo $result['category_name']?>"><?php echo $result['category_name']?></option>
                    <?php       
                            }
                        }
                    ?>
                </select>
                <label for="">Giá sản phẩm<span style="color: red;">*</span> </label>
                <input  name="product_price" required type="text"/>
                <label for="">Mô tả sản phẩm<span style="color: red;">*</span> </label>
                <textarea  required name="product_desc" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
                <label for="">Ảnh sản phẩm<span style="color: red;">*</span> </label>
                <input  name="product_img" required type="file"/>
                <i ><span style="color: red; margin-left:10px;" ><?php if(isset($insert_product )) {echo ($insert_product);}?></span></i>
                <button type="submit">Thêm</button>
            </form> 
            </div>
    </section>
</body>
</html>


