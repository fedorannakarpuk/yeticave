<?php

$connection = mysqli_connect(
    'yeticave',
    'root',
    '',
    'yeticave'
);


    $sqlAllCat = "SELECT * FROM `cathegory`";

    $allCat = mysqli_query($connection, $sqlAllCat);

    if ($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $sqlDelete = "DELETE FROM `cathegory` WHERE id = {$id}";
        $delCat = mysqli_query($connection, $sqlDelete);
        if ($delCat) {
            header('Location: /admin/all-cat.php');
            echo "Категория удалена";
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
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>code</td>
            <td>update</td>
            <td>delete</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allCat as $category):
            ?>
            <tr>
                <td><?= $category['id']?></td>
                <td><?= $category['name']?></td>
                <td><?= $category['code']?></td>
                <td>
                    <a href="edit-cat.php?action=update&id=<?= $category['id']?>"
                       class="btn btn-success">Редактировать</a>
                </td>
                <td>
                    <a href="all-cat.php?action=delete&id=<?= $category['id']?>"
                       class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>