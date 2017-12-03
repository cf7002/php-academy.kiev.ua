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

foreach ($days as $key => $value) {
    if ($key > 5) {
        echo "<strong>{$value}</strong>";
    } else {
        echo $value;
    }
    echo '<br>';
}
