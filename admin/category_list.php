<?php
include "header.php";

// include "header.php";
// include "slider.php";
include "class/category_class.php";
?>

<?php
$category = new category;
$show_category = $category ->show_category();
?>

<div class="admin-content-right">
<div class="admin-content-right-category_list">
                <h1>Danh sách danh mục</h1>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>Danh mục</th>
                        <th>Thao tác</th>
                    </tr>
                    <?php
                    if($show_category){ $i=0;
                        while($result = $show_category->fetch_assoc()){
                            $i++;
                    ?>           
                  
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['category_name'] ?></td>
                        <td>
                            <a href="category_update.php?category_id=<?php echo $result['category_id'] ?>"><span class='fa fa-pencil'></a>
                            <a href="category_delete.php?category_id=<?php echo $result['category_id'] ?>"><span class='fa fa-trash'></a>
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