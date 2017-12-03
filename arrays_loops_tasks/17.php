<?php

//Вариант 1
$arr = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$month = date('F');

foreach ($arr as $item) {
    if ($item === $month) {
        echo "<strong>{$item}</strong>";
    } else {
        echo $item;
    }
    echo '<br>';
}

echo '<br>';

//Вариант 2
$arr = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
];
$month = date('n');

foreach ($arr as $key => $value) {
    if ($key == $month) {
        echo "<strong>{$value}</strong>";
    } else {
        echo $value;
    }
    echo '<br>';
}

