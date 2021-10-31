<?php snippet('header') ?>
<?php snippet('breadcrumb') ?>

<h1><?= $page->title() ?></h1>
<h2>Date</h2>
<?= $page->published()->toDate('F j, Y') ?>
<h2>Tags</h2>
<ul>
  <?php foreach ($page->tags()->split() as $category): ?>
  <li><?= $category ?></li>
  <?php endforeach ?>
</ul>
<h2>Content</h2>
<?php foreach ($page->text()->toBlocks() as $block): ?>
<div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
  <h3>Block</h3>
  <?= $block ?>
</div>
<?php endforeach ?>

<?php snippet('footer') ?>