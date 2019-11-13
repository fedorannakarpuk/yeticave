<?php
include "../function.php";

///  Перекидывает на лоты  (редактирование именно лотов), а должно редактирование быть не лотов, а пользователей.

$connection = mysqli_connect(
    'localhost', //localhost порт по которому связываемся с БД
    'root',
    '',
    'yeticave' //yeticave  название нашей бд
);



    $sqlAllCat = "SELECT * FROM `users`";

    $allCat = mysqli_query($connection, $sqlAllCat);

    if ($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $sqlDelete = "DELETE FROM `users` WHERE id = {$id}";
        $delCat = mysqli_query($connection, $sqlDelete);
        if ($delCat) {
            header('Location: users/users.php');
            echo "Пользователь удален (а) ";
        }
    };




/////////////








//////////


//$title = 'Тестовый тайтл';
$users = [];

//$block = renderTemplate('lot.php', [
//    'title' => $title
//]);

print renderTemplate('index.php', [
//    'title' => $title,
    'users' => $users,
    'allCat' => $allCat
]);
?>
    
    
    
    

    