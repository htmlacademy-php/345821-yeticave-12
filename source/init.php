<?php

function getDb(): mysqli
{
    $db = require_once 'source/db.php';
    $link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['database']);
    mysqli_set_charset($link, "utf8");;

    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    return $link;
}

