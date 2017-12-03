<?php

$items = [4, 2, 5, 19, 13, 0, 10];
$search = false;

foreach ($items as $item) {
    for ($e = 2; $e <= 4; $e++) {
        if ($item === $e ) {
            $search = true;
            break;
        }
    }
    if ($search) {
        echo 'Есть!<br>';
        $search = false;
    } else {
        echo 'Нет!<br>';
    }
}
