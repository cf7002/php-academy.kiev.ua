<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задачи по PHP</title>
    <style>
        div {
            margin: 15px 5px;
        }
        pre {
            margin: 0;
        }
    </style>
</head>
<body>
<!-- Задание №1 -->
<div>
    <strong>Задание №1:<br></strong>
    <?php
        require '01.php';
        printf('$name = %s;', $name)
    ?>
</div>
<!-- Задание №2 -->
<div>
    <strong>Задание №2:<br></strong>
    <?php
        require '02.php';
        printf('$age = %d;', $age)
    ?>
</div>
<!-- Задание №3 -->
<div>
    <strong>Задание №3:<br></strong>
    <?php include '03.php' ?>
</div>
<!-- Задание №4 -->
<div>
    <strong>Задание №4:<br></strong>
    <?php include '04.php' ?>
</div>
<!-- Задание №5 -->
<div>
    <strong>Задание №5:<br></strong>
    <?php include '05.php' ?>
</div>
<!-- Задание №6 -->
<div>
    <strong>Задание №6:<br></strong>
    <?php include '06.php' ?>
</div>
<!-- Задание №7 -->
<div>
    <strong>Задание №7:<br></strong>
    <?php include '07.php' ?>
</div>
<!-- Задание №8 -->
<div>
    <strong>Задание №8:<br></strong>
    <?php include '08.php' ?>
</div>
<!-- Задание №9 -->
<div>
    <strong>Задание №9:<br></strong>
    <?php
        require '09.php';
        printf('$day = %d;', $day)
    ?>
</div>
<!-- Задание №10 -->
<div>
    <strong>Задание №10:<br></strong>
    <?php include '10.php' ?>
</div>
<!-- Задание №11 -->
<div>
    <strong>Задание №11:<br></strong>
    <?php include '11.php' ?>
</div>
<!-- Задание №12 -->
<div>
    <strong>Задание №12:<br></strong>
    <?php include '12.php' ?>
</div>
<!-- Задание №13 -->
<div>
    <strong>Задание №13:<br></strong>
    <?php include '13.php' ?>
</div>
<!-- Задание №14 -->
<div>
    <strong>Задание №14:<br></strong>
    <?php include '14.php' ?>
</div>
<!-- Задание №15 -->
<div>
    <strong>Задание №15:<br></strong>
    <a href="15.php?a=3&b=5&operator=*">3 * 5</a><br>
    <a href="15.php?a=7&b=3&operator=%">7 % 3</a><br>
    <a href="15.php?a=4&b=0&operator=/">4 / 0</a><br>
    <a href="15.php?a=1&b=2&operator=\">1 \ 2</a><br>
    <a href="15.php?a=один&b=два&operator=/">один / два</a>
</div>
<!-- Задание №16 -->
<div>
    <strong>Задание №16:<br></strong>
    <?php include '16.php' ?>
</div>
<!-- Задание №17 -->
<div>
    <strong>Задание №17:<br></strong>
    <?php include '17.php' ?>
</div>
<!-- Задание №18 -->
<div>
    <strong>Задание №18:<br></strong>
    <?php include '18.php' ?>
</div>
<!-- Задание №19 -->
<div>
    <strong>Задание №19:<br></strong>
    <?php include '19.php' ?>
</div>
<!-- Задание №20 -->
<div>
    <strong>Задание №20:<br></strong>
    <?php include '20.php' ?>
</div>
<!-- Задание №21 -->
<div>
    <strong>Задание №21:<br></strong>
    <?php include '21.php' ?>
</div>
<!-- Задание №22 -->
<div>
    <strong>Задание №22:<br></strong>
    <?php include '22.php' ?>
</div>
<!-- Задание №23 -->
<div>
    <strong>Задание №23:<br></strong>
    <?php include '23.php' ?>
</div>
<!-- Задание №24 -->
<div>
    <strong>Задание №24:<br></strong>
    <code>
        <pre>
// Однострочный комментарий

/*
Многострочный
комментарий
*/

# Так же однострочный комментарий</pre>
    </code>
</div>
<!-- Задание №25 -->
<div>
    <strong>Задание №25:<br></strong>
    <code>
        <pre>
&lt;?php echo 'Hello world!' ?&gt;

&lt;?= 'Hello world!' ?&gt;

строки эквивалентны, во второй используется сокращенная запись комбинации тега php и функции echo</pre>
    </code>
</div>
<!-- Задание №26 -->
<div>
    <strong>Задание №26:<br></strong>
    <code>
        <pre>
define('DAYS_COUNT', 7);
const MONTH_COUNT = 12;</pre>
    </code>
</div>
<!-- Задание №27 -->
<div>
    <strong>Задание №27:<br></strong>
    <?php include '27/27.php' ?>
</div>

</body>
</html>
