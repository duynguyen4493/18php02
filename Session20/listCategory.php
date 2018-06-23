<?php
    session_start();
    require_once 'db/connect.php';
    if (isset($_POST['btn'])) {
        //add category name
        $categoryName = isset($_POST['categoryName']) ? trim($_POST['categoryName']) : "";
        if ($categoryName == NULL) {
            $error = 'Hãy nhập tên danh mục';
        } else {
            $sql = "SELECT * FROM categories WHERE categoryName = '".$categoryName."'";
            $result = $conn->query($sql);
            if ($result->num_rows == 0) {
               $sql = "INSERT INTO categories (categoryName) VALUES ('".$categoryName."')";
               $result = $conn->query($sql);
                if ($result) {
                    $success = "Đã thêm danh mục $categoryName thành công!";
                }
            } else $error = "Danh mục đã tồn tại";
        }
    }

    //show list category
    $sql = "SELECT * FROM categories WHERE del = 0";
    $result = $conn->query($sql);

    //disconnect
    require_once 'db/disconnect.php';    
?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title></title>
     <link rel="stylesheet" type="text/css" href="css/style_for_categorylist.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container">
        <div class="alert row">
            <div class="col-md-4">
                <?php if (isset($success)) : ?>
                    <p><?php echo $success ?></p>
                <?php endif ?>
                <?php if (isset($error)) : ?>
                    <p><?php echo $error ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form">
            <form class="form-check" action="" method="POST">
                <label for="category"><p>Danh Mục</p></label>
                <input type="text" name="categoryName">
                <input class="btn-success" type="submit" name="btn" value="Add">
            </form>
        </div>
        <div class="row">
            <div class="col-md-5">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category_name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result->num_rows > 0) : ?>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['categoryId'] ?></td>
                                    <td><?php echo $row['categoryName'] ?></td>
                                    <td><a href="page_category/form_edit.php?id=<?php echo $row['categoryId'] ?>">Sửa</a></td>
                                    <td><a href="page_category/delete.php?id=<?php echo $row['categoryId'] ?>">Xóa</a></td>
                                </tr>
                            <?php endwhile ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
 </body>
 </html>