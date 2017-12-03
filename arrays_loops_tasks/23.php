<?php

/**
 * @param $something string
 * @return bool|int
 */
function determineSum($something)
{
    if (!is_int($something)) {
        $something = str_replace('.', '', $something);
    }

    $some_number = intval($something);
    $sum = 0;

    while ($some_number > 0) {
        $sum += $some_number % 10;
        $some_number = intval($some_number / 10);
    }

    return $sum;
}

//$something = $_GET['something'];
//$something = '123';
$something = 123.456;

if (is_numeric($something)) {
    echo determineSum($something);
}  else {
    echo 'Ошибка. Введеное значение не является числом.';
}
