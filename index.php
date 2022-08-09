<?php

/**
 * @var array $lots
 * @var array $categories
 */

require_once 'helpers.php';
require_once 'data.php';
require_once 'function.php';

$page_content = include_template('main.php', ['lots' => $lots]);
$layout_content = include_template('layout.php',[
    'content' => $page_content,
    'categories' => $categories,
    'title' => 'Главная страница'
]);
print($layout_content);
