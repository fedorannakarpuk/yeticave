<?php

$connection = mysqli_connect(
//    'localhost', // наш путь
    'yeticave', // наш путь
    'root',
    '',
    'yeticave'  // наша баз аданных
);

if (isset($_POST['create'])) {
    $name = htmlspecialchars($_POST['name']);
    $code = htmlspecialchars($_POST['code']);

    $sqlCreateCat = "INSERT INTO `categories`(`name`, `code`) 
VALUES ('{$name}', '{$code}')";

    mysqli_query($connection, $sqlCreateCat);
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
    <form action="index.php" method="post">
        <input type="text" name="name"
               placeholder="Имя категории" class="form-control mb-3">
        <input type="text" name="code"
               placeholder="Лого категории" class="form-control mb-3">
        <input type="submit" name="create" class="btn btn-primary">
    </form>
</div>
</body>
</html>


