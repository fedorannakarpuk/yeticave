<?php

include "function.php";

$title = 'Тестовый тайтл';
$categories = ['Category 1', 'Category 2'];

$block = renderTemplate('lot.php', [
    'title' => $title
]);

print renderTemplate('index.php', [
    'title' => $title,
    'categories' => $categories,
    'content' => $block
]);