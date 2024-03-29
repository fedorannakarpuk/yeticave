<?php

function renderTemplate($name, $data = []) {
    $name = "templates/" . $name;

    $result = "";
    // Определяет существование файла и доступен ли он для чтения
    if (!is_readable($name)) {
        return $result;
    }

    // Включение буферизации вывода
    ob_start();

    // Импортирует переменные из массива в отдельные переменные
    extract($data);

    require $name;

    // Получить содержимое текущего буфера и удалить его
    $result = ob_get_clean();

    return $result;
}