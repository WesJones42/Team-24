<table id="coordinate-table" style="width: 100%;">
<tr>
<th></th>
<?php for ($i = 0; $i < $rows; $i++): ?>
<th><?= chr(65 + $i); ?></th>
<?php endfor; ?>
</tr>
<?php for ($i = 1; $i <= $rows; $i++): ?>
<tr>
<td><?= $i; ?></td>
<?php for ($j = 0; $j < $rows; $j++): ?>
<td></td>
<?php endfor; ?>
</tr>
<?php endfor; ?>

</table>