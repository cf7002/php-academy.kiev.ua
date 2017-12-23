<?php

/**
 *  Returns an array containing the prepared string and its encoding
 *  array [
 *      'code_page' => string,
 *      'string' => string
 * ]
 *
 * @param string $str
 *
 * @return array|bool
 */
function strPrepare($str)
{
    $result = [];

    if (strlen($str) > 0) {
        $result['code_page'] = recognitionCodePage($str);
        if (!$result['code_page']) {
            exit('Неизвестная кодировка символов.');
        }

        $result['string'] = clearOtherChars($str, $result['code_page']);
    } else {
        $result = false;
    }

    return $result;
}

/**
 * @param string $str
 *
 * @return bool|string
 */
function recognitionCodePage($str)
{
//    var_dump(mb_list_encodings());
    $detect = mb_detect_order();
    $code_page = mb_detect_encoding($str, $detect, true);

    if (mb_convert_encoding($str, $code_page) === $str) {
        return $code_page;
    } else {
        return false;
    }
}

/**
 * @param string $str
 * @param string $code_page
 * @param bool $with_digits
 *
 * @return string
 */
function clearOtherChars($str, $code_page, $with_digits = true)
{
    mb_regex_encoding($code_page);

    $pattern = $with_digits ? '[^a-zа-яєіїё0-9\']' : '[^a-zа-яєіїё\']';

    $result = mb_eregi_replace($pattern, ' ', $str, 'mpx');

    do {
        $result = mb_ereg_replace('  ', ' ', $result);
    } while (mb_strpos($result, '  '));

    return trim($result);
}

/**
 * @param string $path
 * @param string $message
 *
 * @return bool|resource
 */
function folderCheck($path, &$message)
{
    if (is_dir($path)) {
        if (!$dir_handle = opendir($path)) {
            $message = 'Невозможно открыть указанный каталог.';
        } else {
            return $dir_handle;
        }
    } else {
        $message = 'Каталог не существует или отсутствует доступ к нему.';
    }

    return false;
}

/**
 * @param string $path
 * @param resource $dir_handle
 * @param string $pattern
 * @param bool $sort_desc
 *
 * @return array
 */
function folderScan($path, $dir_handle, $pattern = null, $sort_desc = false)
{
    $result = [];
//    $pattern = isset($pattern) ? "/{$pattern}+.*\./i" : "//";
    $pattern = isset($pattern) ? "/{$pattern}+/i" : "//";

    while (($entity = readdir($dir_handle)) !== false) {
        if (is_file($path . $entity)) {
            if (preg_match($pattern, $entity))
                $result[] = $entity;
        }
    }
    closedir($dir_handle);

    if ($sort_desc)
        rsort($result);

    return $result;
}

/**
 * @param string $file_comments
 *
 * @return array
 */
function getComments($file_comments)
{
    if (is_readable($file_comments)) {
        $comments = file($file_comments, FILE_IGNORE_NEW_LINES);
    } else {
        $comments = [];
    }

    return $comments;
}

/**
 * @param string $comment
 * @param string $file_comments
 *
 * @return string
 */
function addComment($comment, $file_comments)
{
    if (!$f = fopen($file_comments, 'a')) {
        $message = 'Невозможно открыть или создать файла.';
    } else {
        if (fwrite($f, $comment) === false) {
            $message = 'Ошибка записи в файл.';
        } else {
            $message = 'Ваш комментарий добавлен.';
        }
        fclose($f);
    }

    return $message;
}
