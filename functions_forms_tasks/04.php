<?php
/*
4. Написать функцию, которая выводит список файлов в заданной директории.
Директория задается как параметр функции.
*/
require_once 'lib/function_lib.php';

$path = './'; // Необходимая директория
$path = substr($path, -1) != '/' ? $path . '/' : $path;

$message = '';

$dir_handle = folderCheck($path, $message);
if (is_resource($dir_handle)) {
    $arr_files = folderScan($path, $dir_handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 4</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="err">
        <?php if (!empty($message)) echo $message ?>
    </div>
    <?php if (isset($arr_files)): ?>
    <div>
        Список файлов в <?= $path == './' ? 'текущем каталоге' : 'каталоге "' . $path . '"' ?>
        <ul>
        <?php foreach ($arr_files as $file): ?>
            <li><?= $file ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</body>
</html>
