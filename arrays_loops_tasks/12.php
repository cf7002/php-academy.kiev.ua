<?php

$n = 1000;
$num = 0;
$delimiter = '<br>';

do {
    $num++;
    $n /= 2;
} while ($n >= 50);

printf('Результат деления - %1.2f%sКоличество итераций - %d', $n, $delimiter, $num);
