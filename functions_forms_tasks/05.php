<?php
/*
5. Написать функцию, которая выводит список файлов в заданной директории, которые
содержат искомое слово. Директория и искомое слово задаются как параметры функции.
*/
require_once 'lib/function_lib.php';

$path = './'; // Необходимая директория
$pattern = 'php'; // Паттерн поиска

$message = '';
$path = substr($path, -1) != '/' ? $path . '/' : $path;
if (preg_match('/[^a-z0-9]/i', $pattern)) {
    $message = 'В шаблоне допускаются только буквы и цифры.';
} else {
    $dir_handle = folderCheck($path, $message);

    if (is_resource($dir_handle)) {
        $arr_files = folderScan($path, $dir_handle, $pattern);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task 5</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="err">
        <?php if (!empty($message)) echo $message ?>
    </div>
    <?php if (isset($arr_files)): ?>
    <div>
        Список файлов в <?= $path == './' ? 'текущем каталоге' : 'каталоге "' . $path . '"' ?><br>
        который соответствует маске "<?= $pattern ?>"
        <ul>
        <?php foreach ($arr_files as $file): ?>
            <li><?= $file ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</body>
</html>
