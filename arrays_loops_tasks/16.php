<?php

$items = [1, 2, 3, 4, 5, 6, 7, 8, 9];

foreach ($items as $item) {
    echo $item;
    if ($item % 3 === 0) {
        echo '<br>';
    } else {
        echo ', ';
    }
}
