<?php
$color_options = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'grey', 'brown', 'black', 'teal'];
?>

<table id="color-table" style="width: 100%;">
    <?php for ($i = 0; $i < $colors; $i++): ?>
    <tr>
        <td style="width: 20%;">
            <?= Form::select('color' . $i, '', $color_options, ['class' => 'color-select']); ?>
        </td>
        <td style="width: 80%;">
            <?= Form::input('color-name' . $i, '', ['readonly' => 'readonly']); ?>
        </td>
    </tr>
    <?php endfor; ?>
</table>
