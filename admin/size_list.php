<?php
include "header.php";

include "class/size_class.php";
?>


<?php
$size = new size;
$show_size = $size->show_size();
?>
<div class="admin-content-right">
    <div class="admin-content-right-category_list">
        <h1>Danh sách size</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Name size</th>
                <th>Price size</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_size) {
                $i = 0;
                while ($result = $show_size->fetch_assoc()) {
                    $i++;
            ?>
                    <!--Xuất dữ liệu dưới dạng bảng-->
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['name'] ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td>
                            <a href="size_update.php?size_id=<?php echo $result['id'] ?>"><span class='fa fa-pencil'></a>
                            <a href="size_delete.php?size_id=<?php echo $result['id'] ?>"><span class='fa fa-trash'></a>
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