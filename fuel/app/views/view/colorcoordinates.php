<h1>Color Coordinate Generation</h1>

<?= Form::open(['action' => 'index/cont/generate', 'method' => 'get']); ?>

<?php if (Session::get_flash('error')): ?>
       <h2><?= Session::get_flash('error'); ?></h2>
<?php endif; ?>

<label for="rows">Number of rows/columns:</label>
<?= Form::input('rows', Input::get('rows'), ['type' => 'number', 'min' => 1, 'max' => 26]); ?><br>

<label for="colors">Number of colors:</label>
<?= Form::input('colors', Input::get('colors'), ['type' => 'number', 'min' => 1, 'max' => 10]); ?><br>

<?= Form::submit('submit', 'Generate'); ?>

<?= Form::close(); ?>

