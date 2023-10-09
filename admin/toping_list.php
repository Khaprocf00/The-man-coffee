<?php
include "header.php";

include "class/toping_class.php";
?>


<?php
$toping = new toping;
$show_toping = $toping->show_toping();
?>
<div class="admin-content-right">
    <div class="admin-content-right-category_list">
        <h1>Danh sách topping</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Name topping</th>
                <th>Price topping</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_toping) {
                $i = 0;
                while ($result = $show_toping->fetch_assoc()) {
                    $i++;
            ?>
                    <!--Xuất dữ liệu dưới dạng bảng-->
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['name'] ?></td>
                        <td><?php echo $result['price'] ?></td>
                        <td>
                            <a href="toping_update.php?toping_id=<?php echo $result['id'] ?>"><span class='fa fa-pencil'></a>
                            <a href="toping_delete.php?toping_id=<?php echo $result['id'] ?>"><span class='fa fa-trash'></a>
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