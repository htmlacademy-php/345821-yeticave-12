<?php
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
?>
