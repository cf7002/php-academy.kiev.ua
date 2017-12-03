<?php

$days = [
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    7 => 'Sunday'
];
$day = date('N'); // $day = date('l');

foreach ($days as $key => $value) {
    if ($key == $day) {
        echo "<em>{$value}</em>";
    } else {
        echo $value;
    }
    echo '<br>';
}
