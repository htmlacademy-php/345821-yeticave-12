<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'helpers.php';
require_once 'data.php';
require_once 'function.php';
require_once 'source/init.php';

/**
 * @var array $lots  // переменная массива товаров
 * @var array $categories // переменная масива категорий
 * @var array $user_name // имя пользователя
 * @var array $is_auth // авторизация пользователя
 * @var array $title
 * @var array $link // зарпрос к бд
 */

$link = getDb();
$categories = getCategories($link);
$lotID = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!$lotID) {
    header("Location: pages/404.html");
    exit;
} else {
    $lot = getLot($link, $lotID);

    $content = include_template('lot_layout.php', [
        'categories' => $categories,
        'lot' => $lot ]
    );


}

$layout_content = include_template('layout.php',  [
    'content' => $content,
    'categories' => $categories,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);







print($layout_content);
