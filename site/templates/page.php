<?php snippet('header') ?>
<?php snippet('breadcrumb') ?>

<h1><?= $page->title() ?></h1>
<?= $page->text()->markdown() ?>

<?php snippet('footer') ?>