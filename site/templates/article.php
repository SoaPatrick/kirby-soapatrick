<?php snippet('header') ?>
<article>
<h1><?= $page->title() ?></h1>
<h2>Date</h2>
<?= $page->published()->toDate('F j, Y') ?>
<h2>Format</h2>
<?= $page->format() ?>
<h2>Tags</h2>
<ul class="note-tags">
  <?php foreach ($page->tags()->split() as $tag): ?>
  <li>
    <a href="<?= $page->parent()->url(['params' => ['tag' => $tag]]) ?>"><?= html($tag) ?></a>
  </li>
  <?php endforeach ?>
</ul>
<h2>Category</h2>
<?= $page->category()->name() ?>
<?php if ($page->project()->isNotEmpty()): ?>
<h2>Related projects</h2>
  <ul>
    <?php 
      $items = $site->index()
        ->filterBy('template', 'factory-item')
        ->filterBy('project', $page->project(), ',');
      foreach ($items as $item): 
      ?>
        <li>
          <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
        </li>
        <?php 
      endforeach 
    ?>
  </ul>
<?php endif ?>
<h2>Content</h2>
<?php foreach ($page->text()->toBlocks() as $block): ?>
<div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
  <h3>Block</h3>
  <?= $block ?>
</div>
<?php endforeach ?>
</article>
<?php snippet('footer') ?>