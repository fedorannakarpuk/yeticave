<?php

include "function.php";
include "db.php";

$title = 'Регистрация пользователя';
$categories = ['Category 1', 'Category 2'];

$errors = [];
$post = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;
//    if (filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
//        $errors['email'] = "Не валидный email";
//    }
    $required = ['email', 'password', 'name'];

    foreach ($required as $field) {
        if(empty($post[$field])) {
            $errors[$field] = "Поле {$field} не заполнено";
        }
    }

    if(!$errors) {
        $email = htmlspecialchars($post['email']);
        $login = htmlspecialchars($post['name']);
        $phone = $post['message'];
        $avatar = 'uploads/default.jpg';
        $password = password_hash($post['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`(`login`, `email`, `password`, `avatar`, `phone`) 
VALUES ('{$login}', '{$email}', '{$password}', '{$avatar}', '{$phone}')";

        $result = mysqli_query($connection, $sql);

        if(!$result) {
            echo mysqli_error($connection);
        } else {
            header('Location: /index.php');
        }
    }

}

$main = renderTemplate('sign-up.php', [
    'post' => $post,
    'errors' => $errors
]);

$content = renderTemplate('index.php', [
    'title' => $title,
    'categories' => $categories,
    'content' => $main
]);
print $content;