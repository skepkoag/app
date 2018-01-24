<?php

include_once 'CustomException.php';

try {
    $title = $_GET['title'];
    if (strlen($title) > 10) {
        throw new CustomException('Заголовак поста 
            слишком длинный', 4);
    }
    //....
} catch (CustomException $e) {
    echo 'Ошибка: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Общая ошибка: ' . $e->getMessage();
}