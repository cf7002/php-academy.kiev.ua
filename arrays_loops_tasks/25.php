<?php

$delimiter = '<br>';
$arr = [];

for ($i = 0; $i < 10; $i++) {
    $arr[$i] = rand();
}

var_dump($arr);

$min = min($arr);
$max = max($arr);

$key_min = array_search($min, $arr);
$key_max = array_search($max, $arr);

printf('Минимальное значение: %d => %d%sМаксимальное значение: %d => %d', $key_min, $min, $delimiter, $key_max, $max);

$arr[$key_min] = $max;
$arr[$key_max] = $min;

var_dump($arr);
