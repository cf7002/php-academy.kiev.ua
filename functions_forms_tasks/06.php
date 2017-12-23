<?php
/*
6. Создать страницу, на которой можно загрузить несколько фотографий в галерею.
Все загруженные фото должны помещаться в папку gallery и выводиться на странице
в виде таблицы.
*/
require_once 'lib/function_lib.php';

/**
 * @param $arr
 *
 * @return array
 */
function rebuildArray($arr)
{
    $result = [];
    foreach ($arr as $key_ext => $value_ext) {
        foreach ($value_ext as $key_int => $value_int) {
            $result[$key_int][$key_ext] = $value_int;
        }
    }

    return $result;
}

/**
 * @param $arr
 *
 * @return void
 */
function checkError(&$arr)
{
    $errors = [
        0 => 'There is no error, the file uploaded with success. ',
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini. ',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form. ',
        3 => 'The uploaded file was only partially uploaded .',
        4 => 'No file was uploaded. ',
        6 => 'Missing a temporary folder. ',
        7 => 'Failed to write file to disk. ',
        8 => 'A PHP extension stopped the file upload. '
    ];

    foreach ($arr as $key => $value) {
        if ($value['error'] != 0) {
            $arr[$key]['check']['err'] = array_key_exists($value['error'], $errors) ? $errors[$value['error']] : 'Unknown error. ';
        }
    }
}

/**
 * @param $arr
 *
 * @return void
 */
function checkType(&$arr)
{
    foreach ($arr as $key => $value) {
        switch (mime_content_type($value['tmp_name'])) {
            case 'image/jpeg':
            case 'image/png':
            case 'image/gif':
                break;
            default:
                $arr[$key]['check']['type'] = 'Invalid file format. ';
        }
    }
}

/**
 *
 */
$path = './gallery'; // Необходимая директория
$pattern = '.+\.(jpg|gif|png)'; // Паттерн поиска
$column = 3; // Кол-во столбцов таблицы галлереи

$path = substr($path, -1) != '/' ? $path . '/' : $path;
$arr_messages = [];
$count = false;
$br = '<br>';
$i = 0;

if (isset($_FILES['photos']) && !empty($_FILES['photos']['name'][0])) {
    $arr_info = rebuildArray($_FILES['photos']);
    checkError($arr_info);
    checkType($arr_info);
    foreach ($arr_info as $value) {
        if (array_key_exists('check', $value)) {
            $message = '';
            foreach ($value['check'] as $item) {
                $message .= $item;
            }
            $arr_messages[] = sprintf('Error. %s was not saved - %s%s', $value['name'], $message, $br);
        } else {
            $file_name = $path .
                str_replace('.', '', microtime(true)) . '.' .
                pathinfo($value['name'], PATHINFO_EXTENSION);
            move_uploaded_file($value['tmp_name'], $file_name);
            usleep(10000);
        }
    }
}

$dir_handle = folderCheck($path, $message);
if (is_resource($dir_handle)) {
    $arr_files = folderScan($path, $dir_handle, $pattern);
    $count = count($arr_files);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 6</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php if ($count): ?>
    <table border="1">
    <?php while ($i < $count): ?>
        <tr>
        <?php for ($j = 0; $j < $column; $j++): ?>
            <td class="text-center" width="<?= (int)(90/$column) ?>%">
                <img src="<?= $path . $arr_files[$i] ?>" alt="image" width="98%">
            </td>
            <?php if (++$i >= $count) break; ?>
        <?php endfor; ?>
        </tr>
    <?php endwhile; ?>
    </table>
    <?php endif; ?>

    <div class="err">
        <?php if (!empty($arr_messages)) {
            foreach ($arr_messages as $message){
                echo $message, $br;
            }
        } ?>
    </div>

    <form method="post" enctype="multipart/form-data">
        <div>
            <input type="file" name="photos[]" accept="image/jpeg,image/gif,image/png" multiple>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

</body>
</html>
