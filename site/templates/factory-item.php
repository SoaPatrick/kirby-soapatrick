<?php snippet('header') ?>
<article>
  <header>
    <div>
      <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $page->published()->toDate(DATE_ATOM) ?>">
        <?= $page->published()->toDate('F j, Y') ?>
      </time>
    </div>
    <h1><?= $page->title() ?></h1>
  </header>
  <div>
    <?php foreach ($page->text()->toBlocks() as $block): ?>
      <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
        <?= $block ?>
      </div>
    <?php endforeach ?>
  </div>
  <footer>
    <div>
      <?php foreach ($page->tags()->split() as $tag): ?>
        <a class="tag" href="<?= $page->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>

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

<?php snippet('footer') ?>