<?php

$row = 5;
$col = 7;
$colors = array('red', 'yellow', 'blue', 'gray', 'maroon', 'brown', 'green')
?>

<div>
    <table border="1">
    <?php for ($i = 1; $i <= $row; $i++): ?>
        <tr>
        <?php for ($j = 1; $j <= $col; $j++): ?>
            <td style="background-color: <?= $colors[rand(0, 6)] ?>; text-align: center"><?= rand() ?></td>
        <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </table>
</div>
