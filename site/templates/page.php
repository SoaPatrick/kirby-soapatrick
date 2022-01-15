<?php snippet('layouts/header') ?>

<h1><?= $page->title() ?></h1>
<?= $page->text()->markdown() ?>

<?php snippet('layouts/footer') ?>