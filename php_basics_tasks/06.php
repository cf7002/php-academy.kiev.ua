<?php

require '02.php';
$age *= 2;

if ($age > 17 && $age < 60) {
    echo "Вам $age, еще работать и работать.";
} elseif ($age > 59) {
    echo "Вам $age, пора на пенсию.";
}
