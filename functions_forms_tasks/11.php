<?php
/*
11. Написать функцию, которая в качестве аргумента принимает строку, и форматирует
ее таким образом, что каждое новое предложение начиняется с большой буквы.
*/
require_once 'lib/function_lib.php';

/**
 * @param string $str
 * @param string $code_page
 *
 * @return string
 */
function upperCase($str, $code_page)
{
    $result = '';

    $arr = explode('.', $str);
    $arr = array_map(function ($data) {return trim($data) . '.';}, $arr);

    foreach ($arr as $item) {
        $result .= mb_strtoupper(mb_substr($item, 0, 1, $code_page), $code_page) . mb_substr($item, 1, null, $code_page);
        $result .= ' ';
    }

    return $result;
}

/**
 *
 */
$str_user = empty($_POST['user_text']) ? null : trim($_POST['user_text'], ' .');

if (!empty($str_user)) {
    if (!$code_page = recognitionCodePage($str_user)) {
        $message = 'Неизвестная кодировка символов.';
    } else {
        $new_str = upperCase($str_user, $code_page);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 11</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if (isset($new_str)): ?>
    <h4>Оригинальная строка:</h4>
    <?= $str_user ?>

    <h4>Результат:</h4>
    <?= $new_str ?>
    <?php endif; ?>

    <div class="err">
        <?php if (isset($message)) echo $message ?>
    </div>

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
