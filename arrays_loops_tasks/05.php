<?php

$items = array('Коля' => '200', 'Вася' => '300', 'Петя' => '400');
$delimiter = '<br>';

foreach ($items as $key => $value) {
    printf('%s - зарпалата %d долларов.%s', $key, $value, $delimiter);
}
