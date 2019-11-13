<!doctype html>
<html lang="ru">
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
            <td>e-mail</td>
            <td>update</td>
            <td>delete</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allCat as $users):
            ?>
            <tr>
                <td><?= $users['id']?></td>
                <td><?= $users['name']?></td>
                <td><?= $users['email']?></td>
                <td>
                    <a href="/users/edit-cat.php?action=update&id=<?= $users['id']?>"
                    
                       class="btn btn-success">Редактировать</a>
                </td>
                <td>
                    <a href="template.php?action=delete&id=<?= $users['id']?>"
                       class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>