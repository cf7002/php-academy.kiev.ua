<?php

$a = 3;
$b = 5;

printf('Два числа %d и %d.%sМаксимальное - ', $a, $b, '<br>');

if ($a > $b) {
    echo $a;
} elseif ($a < $b) {
    echo $b;
} else {
    echo 'Числа равны';
}
