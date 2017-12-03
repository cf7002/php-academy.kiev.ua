<?php

$items = [1, 20, 15, 17, 24, 35];

$result = 0;

foreach ($items as $item) {
    $result += $item;
}

printf("Результат - %d", $result);
