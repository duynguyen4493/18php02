<div>
    <table class="table">
        <thead>
            <tr>
                <th>Tên người dùng</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Chức Năng</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $data->fetch_assoc()) : ?>
                <tr>
                    <td><p><?php echo $row['name'] ?></p></td>
                    <td><p><?php echo $row['phone'] ?></p></td>
                     <td><p><?php echo $row['email'] ?></p></td>
                    <td>
                        <p>
                            <?php
                            if($row['role'] == 1) {
                                echo 'admin';
                            } else echo 'user'; ?>
                        </p>
                    </td>
                    <td><p><a href="admin.php?action=edit_user&id=<?php echo $row['id'] ?>">Sửa</a></p></td>
                    <td><p><a class="delete" href="admin.php?action=delete_user&id=<?php echo $row['id'] ?>">Xóa</a></p></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>