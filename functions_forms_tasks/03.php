<?php
/*
3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых
превыщает N символов. Значение N задавать через форму. Проверить работу на
кириллических строках - найти ошибку, найти решение.
*/
require_once 'lib/function_lib.php';

/**
 * @param string $str
 * @param string $len
 * @param string $code_page
 *
 * @return string
 */
function handlerFile($str, $len, $code_page)
{
    mb_regex_encoding($code_page);

    $pattern = "[a-zа-яєіїё\']{{$len},}";

    return mb_eregi_replace($pattern, '', $str, 'mpx');
}

/**
 *
 */
$error = null;
$file = 'user_data/test.txt';
$init_len = 5;

if (isset($_GET['length'])) {
    $len = trim($_GET['length']);
    if (strlen($len) > 0 && is_numeric($len)) {
        if (is_readable($file)) {
            if (!$str = file_get_contents($file)) {
                $message = 'Ошибка чтения файла.';
            } else {
                if (!$code_page = recognitionCodePage($str)) {
                    $message = 'Неизвестная кодировка символов.';
                } else {
                    $result = handlerFile($str, $len + 1, $code_page);
                }
            }
        } else {
            $message = 'Файл не существует или отсутствует доступ к нему.';
        }
    } else {
        $message = 'Не верно указанны данные.';
    }
} else {
    $len = $init_len;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 3</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php if (isset($result)):?>
    <div title="Оригинальный текст">
        <?= $str ?>
    </div>
    <div title="Обработанный текст">
        <?= $result ?>
    </div>
<?php endif; ?>
    <div class="err">
        <?php if (!empty($message)) echo $message ?>
    </div>
    <form method="get">
        <div>
            <label for="length">Выберите максимальную длину слова:</label>
            <select name="length" id="length">
                <?php for ($i = $init_len; $i <= 30; $i++): ?>
                <option value="<?= $i ?>"<?= $i == $len ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div>
            <button type="submit">Send</button>
        </div>
    </form>
</body>
</html>
