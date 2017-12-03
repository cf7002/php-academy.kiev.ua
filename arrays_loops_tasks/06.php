<?php

$arr = array('green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой');
$en =[];
$ru = [];

foreach ($arr as $key => $value) {
    $en[] = $key;
}

foreach ($arr as $value) {
    $ru[] = $value;
}
var_dump($en, $ru);
