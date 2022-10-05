<?php

$user_name = "";

$is_auth = !empty($_SESSION["user"]);

if ($is_auth) {
    $user_name = $_SESSION["user"];
};

date_default_timezone_set('Europe/Moscow');

$title = 'Главная';


