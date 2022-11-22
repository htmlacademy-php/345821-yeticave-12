<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * @var array $lots  // переменная массива товаров
 * @var array $categories // переменная масива категорий
 * @var array $user_name // имя пользователя
 * @var array $is_auth // авторизация пользователя
 * @var array $title
 * @var array $link // зарпрос к бд
 */

require_once 'helpers.php';
require_once 'data.php';
require_once 'function.php';
require_once 'source/init.php';


$link = getDb();
$categories = getCategories($link);
$lots = getLots($link);


$main_content = include_template('main.php', [
    'categories' => $categories,
    'lots' => $lots
]);

$layout_content = include_template('layout.php',  [
    'main' => true,
    'content' => $main_content,
    'categories' => $categories,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print($layout_content);

