<?php

$a = $_GET['a'];
$b = $_GET['b'];
$operator = $_GET['operator'];

$result = false;
$error = 'на 0 делить нельзя!';

if (is_numeric($a) && is_numeric($b)) {
    switch ($operator) {
        case '+':
            $result = $a + $b;
            break;
        case '-':
            $result = $a - $b;
            break;
        case '*':
            $result = $a * $b;
            break;
        case '/':
            if ($b != 0) $result = $a / $b;
            break;
        case '%':
            if ($b != 0) $result = $a % $b;
            break;
        default:
            $error = 'недопустимый оператор!';
    }
    if ($result) {
        printf('%d %s %d = %d', $a, $operator, $b, $result);
    } else {
        printf('Ошибка: %s', $error);
    }
} else {
    echo 'Ошибка: недопустимое значение!';
}
