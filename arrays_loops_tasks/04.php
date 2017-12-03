<?php

$arr = array('green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой');

foreach ($arr as $key => $value) {
    echo $key;
    echo "<br>";
}

echo "<br>";

foreach ($arr as $value) {
    echo $value;
    echo "<br>";
}
