<?php

echo '<pre>';
$items = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

foreach ($items as $item_1) {
    foreach ($items as $item_2) {
        printf("%5d x %2d = %2d", $item_2, $item_1, $item_1 * $item_2);
    }
    echo '<br>';
}
echo '</pre>';
