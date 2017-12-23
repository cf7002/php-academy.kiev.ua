<?php
/*
1. Создать форму с двумя элементами textarea.
При отправке формы скрипт должен выдавать только те слова, которые есть и в
первом и во втором поле ввода. Реализацию это логики необходимо поместить в
функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами.
*/
require_once 'lib/function_lib.php';

/**
 * @param array $arr_a
 * @param array $arr_b
 *
 * @return array
 */
function getCommonWords(&$arr_a, &$arr_b)
{
    $result = [];
    $arr_a['words'] = explode(' ', $arr_a['string']);
    $arr_b['words'] = explode(' ', $arr_b['string']);

    foreach ($arr_a['words'] as $item_a) {
        $model = mb_strtolower(trim($item_a), $arr_a['code_page']);
        foreach ($arr_b['words'] as $item_b) {
            if ($model === mb_strtolower(trim($item_b), $arr_a['code_page'])) {
                $result[] = $item_a;
                break;
            }
        }
    }
    return $result;
}

/**
 *
 */
if (!empty($_POST['text_a']) && !empty($_POST['text_b'])) {
    $arr_text_a = strPrepare(trim($_POST['text_a']));
    $arr_text_b = strPrepare(trim($_POST['text_b']));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 1</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
if (!empty($arr_text_a) && !empty($arr_text_b)) {
    $list = getCommonWords($arr_text_a, $arr_text_b);
    echo '<h4>Список совпадений</h4>';
    if (empty($list)) {
        echo 'Совпадений не найдено.';
    } else {
        echo '<ul>';
        foreach ($list as $item) {
            echo '<li>', $item, '</li>';
        }
        echo '</ul>';
    }
} ?>
<form method="post">
    <div>
        <textarea name="text_a" title="First text area" cols="35" rows="5" maxlength="250"></textarea>
    </div>
    <div>
        <textarea name="text_b" title="Second text area" cols="35" rows="5" maxlength="250"></textarea>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>

</body>
</html>
