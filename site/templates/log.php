<?php snippet('header') ?>
<header class="relative">
  <div class="marginal-icon marginal-icon--large mb-2 sm:mb-0 sm:absolute grid place-items-center">
    <?= $page->icon(); ?>
  </div>
  <h1><?= $page->title() ?></h1>
  <p class="text-lg"><?= $page->description() ?></p>
</header>

<?php
$callback = function($p) {
  return $p->published()->toDate('F j, Y');
};
$groupedItems = $page->children()->listed()->flip()->group($callback);
foreach($groupedItems as $day => $itemsPerDay): ?>
    <h2 class="capitalize"><?= $day ?></h2>
    <ul class="list-none mb-12 pl-6 leading-6">
      <?php foreach($itemsPerDay as $item) : ?>
        <li class="relative"><?php snippet('log-icon', ['icon' => $item->type()]) ?><strong class="capitalize"><?= $item->type() ?></strong> <?= $item->title() ?></li>
      <?php endforeach; ?>
    </ul>
<?php endforeach ?>
<?php snippet('footer') ?>
