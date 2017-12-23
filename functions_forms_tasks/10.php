<?php
/*
10. Написать функцию, которая считает количество уникальных слов в тексте.
Слова разделяются пробелами. Текст должен вводиться с формы.
*/
require_once 'lib/function_lib.php';

/**
 * @param string $str
 * @param string $code_page
 *
 * @return array
 */
function countUniqueWords($str, $code_page)
{
    $str = clearOtherChars($str, $code_page, false);
    $arr = explode(' ', $str);
    $result = array_count_values($arr);
    arsort($result);

    return $result;
}

/**
 *
 */
// $left_str - строка из задачи №13
$str_user = empty($_POST['user_text']) ? (empty($left_str) ? null : $left_str) : trim($_POST['user_text']);

if (!empty($str_user)) {
    if (!$code_page = recognitionCodePage($str_user)) {
        $message = 'Неизвестная кодировка символов.';
    } else {
        $words = countUniqueWords($str_user, $code_page);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 10</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if (isset($words)): ?>
    <h4>Оригинальная строка:</h4>
    <?= $str_user ?>

    <h4>Результат:</h4>
    <?php
        foreach ($words as $key => $value) {
            printf('<li>%s - %s</li>', $key, $value);
        }
    ?>
    <?php endif; ?>

    <div class="err">
        <?php if (isset($message)) echo $message ?>
    </div>

    <?php if (empty($left_str)): ?>
    <form method="post">
        <div>
            <textarea name="user_text" title="Text area" cols="35" rows="5" maxlength="300"></textarea>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
    <?php endif; ?>

</body>
</html>
