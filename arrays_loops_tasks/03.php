<?php

$items = [26, 17, 136, 12, 79, 15];

$result = 0;

foreach ($items as $item) {
    $result += $item ** 2;
}

printf("Результат - %d", $result);
