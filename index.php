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

if (!$link) {
    http_response_code(500);
    header('Location: /error.php', true, 500);
    exit;
};

// Запрос на получение списка категорий
$categories_list = "SELECT * FROM categories ";

//Выполняем запрос и получаем результат
$result = mysqli_query($link, $categories_list);

// Запрос выполнен успешно
if ($result) {
    // Получаем все категории в виде двухмерного массива
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Получить текст последней ошибки
    http_response_code(404);
    $content = header('Location: /error.php', true, 404);
    exit;
}

$sql = 'SELECT l.name, l.start_price, l.img_link, MAX(b.price) AS max_price, c.name
        FROM lots l
        LEFT JOIN bet b ON l.id = b.lot_id
        JOIN categories c ON l.category_id = c.id
        WHERE l.end_date > NOW()
        GROUP BY l.id
        ORDER BY l.created_at DESC LIMIT 6';

$res = mysqli_query($link, $sql);

if ($res) {
    $lots = mysqli_fetch_all($res, MYSQLI_ASSOC);

} else {
    http_response_code(404);
    header('Location: /error.php',true, 404);
    exit;
}

$main_content = include_template('main.php', [
    'categories' => $categories,
    'lots' => $lots
]);

$layout_content = include_template('layout.php', [
    'content' => $main_content,
    'categories' => $categories,
    'title' => 'Главная',
    'is_auth' => $is_auth,
    'user_name' => $user_name
]);

print($layout_content);

