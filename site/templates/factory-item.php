<?php snippet('header') ?>

<h1><?= $page->title() ?></h1>
<h2>Date</h2>
<?= $page->published()->toDate('F j, Y') ?>
<h2>Tags</h2>
<ul>
  <?php foreach ($page->tags()->split() as $category): ?>
  <li><?= $category ?></li>
  <?php endforeach ?>
</ul>
<?php if ($page->project()->isNotEmpty()): ?>
  <h2>Related Posts</h2>
  <ul>
    <?php 
      $articles = $site->index()
        ->filterBy('template', 'article')
        ->filterBy('project', $page->project(), ',');
      foreach ($articles as $article): 
        ?>
          <li>
            <a href="<?= $article->url() ?>"><?= $article->title() ?></a>
            <div><?= $article->text()->toBlocks()->excerpt(65, true, ' …')  ?></div>
          </li>
        <?php 
      endforeach 
    ?>
  </ul>
<?php endif ?>
<?php if ($page->project()->isNotEmpty()): ?>
  <h2>Related Lab</h2>
  <ul>
    <?php 
      $labs = $site->index()
        ->filterBy('template', 'lab-item');
        //->filterBy('project', $page->project(), ',');
      foreach ($labs as $lab): 
        ?>
          <li>
            <a href="<?= $lab->url() ?>"><?= $lab->title() ?></a>
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

<?php snippet('footer') ?>