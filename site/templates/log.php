<?php snippet('header') ?>
<h1><?= $page->title() ?></h1>

<?php
$callback = function($p) {
  return $p->published()->toDate('F j, Y');
};
$groupedItems = $page->children()->listed()->flip()->group($callback);
foreach($groupedItems as $day => $itemsPerDay): ?>
    <h2 class="capitalize"><?= $day ?></h2>
    <ul>
      <?php foreach($itemsPerDay as $item) : ?>
      <li><strong class="capitalize"><?= $item->type() ?></strong> <?= $item->title() ?></li>
      <?php endforeach; ?>
    </ul>
<?php endforeach ?>
<?php snippet('footer') ?>
