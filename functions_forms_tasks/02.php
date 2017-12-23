<?php
/*
2. Создать форму с элементом textarea. При отправке формы скрипт должен
выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.
*/
require_once 'lib/function_lib.php';

/**
 * @param array $arr
 *
 * @return array
 */
function getLongWords(&$arr)
{
    $result = [];
    $arr_temp = explode(' ', $arr['string']);
    if (count($arr_temp) > 3) {
        foreach ($arr_temp as $key => $value) {
            $arr_temp[$key] = mb_strtolower($value, $arr['code_page']);
        }

        $arr['words'] = array_unique($arr_temp);
        unset($arr_temp);

        foreach ($arr['words'] as $word) {
            $result[$word] = mb_strlen($word);
        }
        arsort($result);
        $result = count($result) > 3 ? array_slice($result, 0, 3) : $result;
    } else {
        $result = $arr_temp;
    }

    return $result;
}

/**
 *
 */
if (!empty($_POST['user_text'])) {
    $arr_text = strPrepare(trim($_POST['user_text']));

    $top_words = !$arr_text ? null : getLongWords($arr_text);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 2</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
if (isset($top_words)) {
    echo '<h4>Top three long words:</h4>', '<ol>';
    foreach ($top_words as $key => $value) {
        echo '<li>', $key, '</li>';
    }
    echo '</ol>';
} ?>
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
