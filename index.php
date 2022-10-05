<?php

/**
 * @var array $lots  // переменная массива товаров
 * @var array $categories // переменная масива категорий
 * @var array $user_name // имя пользователя
 * @var array $is_auth // авторизация пользователя
 */

require_once 'helpers.php';
require_once 'data.php';
require_once 'function.php';

$page_content = include_template('main.php', ['lots' => $lots]);
$layout_content = include_template('layout.php',[
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная страница',
    'is_auth' => $is_auth,
    'user_name' => $user_name

]);
print($layout_content);
