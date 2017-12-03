<?php

$delimiter = '<br>';

echo '<pre>';
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j < 6; $j++) {
        printf("%8d x %d = %2d", $j, $i, $i * $j);
    }
    echo $delimiter;
}

echo $delimiter;

for ($i = 1; $i < 10; $i++) {
    for ($j = 6; $j < 11; $j++) {
        printf("%8d x %d = %2d", $j, $i, $i * $j);
    }
    echo $delimiter;
}
echo '</pre>';
