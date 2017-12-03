<?php

require '02.php';
$age /= $age;

if ($age > 0 && $age < 18) {
    echo "Вам $age, еще рано работать.";
} elseif ($age > 17 && $age < 60) {
    echo "Вам $age, еще работать и работать.";
} elseif ($age > 59) {
    echo "Вам $age, пора на пенсию.";
}
