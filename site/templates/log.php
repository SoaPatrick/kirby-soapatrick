<?php snippet('header') ?>
<h1><?= $page->title() ?></h1>
<ul class="list-disc p-5">
  <?php foreach($page->children()->listed() as $log): ?>
    <li><?= $log->published() ?>: <?= $log->type() ?> <?= $log->title()->html() ?></li>
  <?php endforeach ?>
</ul>
<?php snippet('footer') ?>
