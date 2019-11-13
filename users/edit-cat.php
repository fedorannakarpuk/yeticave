<?php

$connection = mysqli_connect(
    'yeticave',
    'root',
    '',
    'yeticave'
);


if (isset($_GET['id']) && ($_GET['action'] == 'update')) {
    $id = $_GET['id'];

    $sqlShowCat = "SELECT * FROM `cathegory` WHERE id = {$id}";

    $showCat = mysqli_query($connection, $sqlShowCat);

    foreach ($showCat as $category) {
        $category_name = $category['name'];
        $category_code = $category['code'];
        $category_id = $category['id'];
    }
}

if (isset($_POST['update'])) {
    $name = htmlspecialchars($_POST['name']);
    $code = htmlspecialchars($_POST['code']);
    $id = $_POST['id'];

    $sqlUpdateCat = "UPDATE `cathegory` 
SET `name`='{$name}',`code`='{$code}' WHERE id = {$id}";

    $result = mysqli_query($connection, $sqlUpdateCat);

    if ($result) {
        header('Location: /admin/all-cat.php');
    } else {
        echo mysqli_error($connection);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= isset($category_id) ? $category_id : ''?>">
        <input type="text" name="name" value="<?= isset($category_name) ? $category_name : ''?>"
               placeholder="Имя категории" class="form-control mb-3">
        <input type="text" name="code" value="<?= isset($category_code) ? $category_code : ''?>"
               placeholder="Лого категории" class="form-control mb-3">
        <input type="submit" name="update" class="btn btn-primary">
    </form>
</div>
</body>
</html>


