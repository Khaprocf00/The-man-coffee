<?php
include "header.php";

include "class/user_class.php";
?>


<?php
$user = new user;
$show_user = $user->show_user();
?>
<div class="admin-content-right">
    <div class="admin-content-right-category_list">
        <h1>Danh sách tài khoản</h1>
        <table>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if ($show_user) {
                $i = 0;
                while ($result = $show_user->fetch_assoc()) {
                    $i++;
            ?>
                    <!--Xuất dữ liệu dưới dạng bảng-->
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['username'] ?></td>
                        <td><?php echo $result['password'] ?></td>
                        <td><?php echo $result['status'] ?></td>
                        <td>
                            <a href="user_update.php?user_id=<?php echo $result['user_id'] ?>"><span class='fa fa-pencil'></a>
                            <a href="user_delete.php?user_id=<?php echo $result['user_id'] ?>"><span class='fa fa-trash'></a>
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