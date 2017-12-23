<?php
/*
9. Написать функцию, которая переворачивает строку. Было "abcde",
должна выдать "edcba". Ввод текста реализовать с помощью формы.
*/
require_once 'lib/function_lib.php';

/**
 * @param string $str
 * @param string $code_page
 *
 * @return string
 */
function stringRev($str, $code_page)
{
    $result = '';

    $len = mb_strlen($str, $code_page);

    while ($len > 0) {
        $result .= mb_substr($str, --$len, 1, $code_page);
    }

    return $result;
}

/**
 *
 */
$str_user = empty($_POST['user_text']) ? null : trim($_POST['user_text']);

if (!empty($str_user)) {
    if (!$code_page = recognitionCodePage($str_user)) {
        $message = 'Неизвестная кодировка символов.';
    } else {
        $new_str = stringRev($str_user, $code_page);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 9</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if (isset($new_str)): ?>
    <h4>Оригинальная строка:</h4>
    <?= $str_user ?>

    <h4>Перевернутая строка:</h4>
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
