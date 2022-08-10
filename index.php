<?php

/**
 * @var array $lots
 * @var array $categories
 * @var array $user_name
 * @var array $is_auth
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
