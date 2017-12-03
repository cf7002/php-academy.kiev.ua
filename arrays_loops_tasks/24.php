<?php

/**
 * @param $string string
 * @param $wanted string
 * @return int
 */
function countChar($string, $wanted)
{
    $count = 0;
    $length = strlen($string);

    for ($i = 0; $i < $length; $i++) {
        if ($string[$i] === $wanted) $count++;
    }

    return $count;
}

$number = 442158755745;
// Небольшое лирическое отступление
// поскольку на предполагаемое число нет ограничения, его величина может превысить максимальное целое,
// которое будет уже интерпретироваться как число с плавающей точкой, а float имеет определенные ограничения
// на точность. В связи с этим указаное число изначально будет рассматриваться как строка.

$string = strval($number);

// PHP-функция
echo substr_count($string, '5');
echo '<br>';

// handmade функция
echo 'Кол-во вхождений - ' . countChar($string, '5');
