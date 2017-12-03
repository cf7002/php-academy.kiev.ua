<?php

$delimiter = '<br>';
$arr = [];

for ($i = 0; $i < 10; $i++) {
    $arr[$i] = rand(1, 100);
}

var_dump($arr);

$even = 1;
for ($i = 2; $i < 10; $i = $i + 2) {
    if ($arr[$i] > 0) $even *= $arr[$i];
}
echo $even;

echo $delimiter;

for ($i = 1; $i < 10; $i = $i + 2) {
    if ($arr[$i] > 0) echo $arr[$i] . $delimiter;
}
