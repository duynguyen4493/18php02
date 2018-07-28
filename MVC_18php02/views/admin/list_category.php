<div>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Tên danh mục</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $data->fetch_assoc()) : ?>
                <tr>
                    <td><p><?php echo $row['categoryId'] ?></p></td>
                    <td><p><?php echo $row['categoryName'] ?></p></td>
                    <td><p><a href="admin.php?action=edit_category&id=<?php echo $row['categoryId'] ?>">Sửa</a></p></td>
                    <td><p><a class="delete" href="admin.php?action=delete_category&id=<?php echo $row['categoryId'] ?>">Xóa</a></p></td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>