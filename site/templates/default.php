<?php snippet('header') ?>
<span class="block text-xs uppercase tracking-wide opacity-70 -mb-2"><?= $page->modified('F j, Y') ?></span>
<h1><?= $page->title() ?></h1>
<?= markdown($page->text()) ?>
<?php snippet('footer') ?>
