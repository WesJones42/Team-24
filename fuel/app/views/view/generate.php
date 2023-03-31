<h1>Color Coordinate Generation</h1>

<?php if (Session::get_flash('error')): ?>
<p class="alert alert-danger"><?= Session::get_flash('error'); ?></p>
<?php endif; ?>

<div id="color-coordinate-wrapper">
    <?= render('view/_color_table', ['colors' => $colors]); ?>
    <?= render('view/_coordinate_table', ['rows' => $rows]); ?>
</div>

<?= Html::anchor('colorcoordinates/print_view', 'Printable View', ['class' => 'btn btn-primary', 'target' => '_blank']); ?>
