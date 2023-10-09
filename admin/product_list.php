<?php

include "header.php";

// include "header.php";
// include "slider.php";
include "class/product_class.php";
?>

<?php
$product = new product;
$show_product = $product ->show_product();
?>

<div class="admin-content-right">
<div class="admin-content-right-product_list">
                <h1 style="text-align: center; font-size: 30px; text-transform: uppercase;">Danh sách sản phẩm</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Mô tả sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php
                    if($show_product){ $i=0;
                        while($result = $show_product->fetch_assoc()){
                            $i++;
                    ?>           
                  
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><img src="uploads/<?php echo $result['product_img']?>" style="width:200px;height:150px;"/></td>
                        <td><?php echo $result['product_name'] ?></td>
                        <td><?php echo $result['product_price'] ?></td>
                        <td><?php echo $result['product_desc'] ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td>
                            <a href="product_update.php?product_id=<?php echo $result['product_id'] ?>"><span class='fa fa-pencil'></a>
                            <a href="product_delete.php?product_id=<?php echo $result['product_id'] ?>"><span class='fa fa-trash'></a>
                        </td>
                    </tr>
                    <?php
                          }
                        }
                        ?>
                </table>
            </div>
        </div>

    </section>
</body>
</html>