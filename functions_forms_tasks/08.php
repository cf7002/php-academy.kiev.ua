<?php
/*
8. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом
поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.
Реализовать проверку на наличие в тексте запрещенных слов, матов. При наличии таких
слов - выводить сообщение "Некорректный комментарий". Реализовать удаление из
комментария всех тегов, кроме тега <b>.
*/
require_once 'lib/function_lib.php';

define('USER_COMMENTS_FILE', 'user_data/user_comments.txt'); // файл где хранятся комментарии пользователей

/**
 * @param string $comment
 * @param string $code_page
 *
 * @return bool
 */
function checkStopWords($comment, $code_page)
{
    $stop = false;
    $stop_words = ['автомоб', 'самол', 'кораб'];
    $comment = ';' . $comment;

    foreach ($stop_words as $word) {
        if ($stop = mb_stripos($comment, $word, 0 , $code_page)) {
            break;
        }
    }
    return $stop;
}

/**
 *
 */
$arr_messages = [];
$br = '<br>';

if (!empty($_POST['comment'])) {
    $comment = trim($_POST['comment']);

    if (strlen($comment) > 0) {
        if (!$code_page = recognitionCodePage($comment)) {
            $arr_messages[] = 'Неизвестная кодировка символов.';
        } else {
            if (checkStopWords($comment, $code_page)) {
                $arr_messages[] = 'Некорректный комментарий.';
            } else {
                $comment = strip_tags($comment, '<b>');
                $comment = str_replace(PHP_EOL, '<br>', $comment);
                $data = serialize('[' . date('Y-m-d H:i:s') . ']' . $br . $comment) . PHP_EOL;
                $arr_messages[] = addComment($data, USER_COMMENTS_FILE);
            }
        }
    }
}
$comments = getComments(USER_COMMENTS_FILE);

if (empty($comments))
    $arr_messages[] = 'Еще никто не оставлял комментариев.';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 8</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div>
    <?php
        if (!empty($comments)) {
            echo 'Комментарии пользователей:';
            echo '<ul>';
            foreach ($comments as $comment) {
                echo '<li>', unserialize($comment), '</li>';
            }
            echo '</ul>';
        }
    ?>
</div>

<div>
    <?php if (!empty($arr_messages)) {
        foreach ($arr_messages as $message){
            echo $message, $br;
        }
    } ?>
</div>

<footer>
    <form method="post">
        <div>
            <textarea name="comment" title="User comment" cols="45" rows="5" maxlength="250"></textarea>
        </div>
        <div>
            <button type="submit">Send</button>
        </div>
    </form>
</footer>
</body>
</html>
