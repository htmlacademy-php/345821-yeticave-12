<?php

date_default_timezone_set("Europe/Moscow");

 function retail_price($number)
{
    $numbers = ceil($number);
    if ($numbers < 1000) {
        $total_number = $numbers;
    } else  {

        $total_number = number_format($numbers, 0,'', ' ');

    }

    return $total_number .' ₽';
}

function expired_time($val)
{
    $total_end = strtotime($val);
    $dt_now = time();
    $total_time = $total_end - $dt_now;
    $hours = floor($total_time / 3600);
    $minutes = floor(($total_time % 3600) / 60);
    return "$hours : $minutes";
}

function view_class($val)
{
    $class_name = '';
    $total_end = strtotime($val);
    $dt_now = time();
    $total_time = $total_end - $dt_now;

    if ($total_time < 3600) {
        $class_name = 'timer--finishing';
    }

    return $class_name;
}


function getLots($link)
{
    $sql = 'SELECT l.id, l.name AS lot_name, l.end_date, l.start_price, l.img_link, MAX(b.price) AS max_price, c.name AS category_name
        FROM lots l
        LEFT JOIN bet b ON l.id = b.lot_id
        JOIN categories c ON l.category_id = c.id
        WHERE l.end_date > NOW()
        GROUP BY l.id
        ORDER BY l.created_at DESC LIMIT 6';

    $res = mysqli_query($link, $sql);

    if (!$res) {
        echo mysqli_error($link);
    }
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}


function getCategories($link)
{
// Запрос на получение списка категорий
    $categories_list = "SELECT * FROM categories ";

//Выполняем запрос и получаем результат
    $result = mysqli_query($link, $categories_list);

// Запрос выполнен успешно
    if (!$result) {
        echo mysqli_error($link);
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


