<?php
/*
12. Написать функцию, которая в качестве аргумента принимает строку, и
форматирует ее таким образом, что предложения идут в обратном порядке.
*/
require_once 'lib/function_lib.php';

/**
 * @param string $str
 *
 * @return string
 */
function sentencesRev($str)
{
    $result = '';

    $arr = explode('.', $str);
    $arr = array_map(function ($data) {return trim($data) . '.';}, $arr);
    $arr = array_reverse($arr);

    foreach ($arr as $item) {
        $result .= $item . ' ';
    }

    return $result;
}

/**
 *
 */
$str_user = empty($_POST['user_text']) ? null : trim($_POST['user_text'], ' .');

if (!empty($str_user)) {
    $new_str = sentencesRev($str_user);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 12</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if (isset($new_str)): ?>
    <h4>Оригинальная строка:</h4>
    <?= $str_user ?>

    <h4>Результат:</h4>
    <?= $new_str ?>
    <?php endif; ?>

    <form method="post">
        <div>
            <textarea name="user_text" title="Text area" cols="35" rows="5" maxlength="250"></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

</body>
</html>
