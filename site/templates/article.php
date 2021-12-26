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
      <?= $block ?>
    <?php endforeach ?>
  </div>
  <footer>
    <div>
      <?php foreach ($page->tags()->split() as $tag): ?>
        <a class="hashtag" href="<?= $page->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
  <!-- <?php if ($page->project()->isNotEmpty()): ?>
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
  <?php endif ?> -->
</article>
<nav class="pagination">
      <?php if ($page->hasPrevListed()): ?>
    <a class="prev" href="<?= $page->prevListed()->url() ?>">← older</a>
  <?php endif ?>
  <?php if ($page->hasNextListed()): ?>
    <a class="next" href="<?= $page->nextListed()->url() ?>">newer →</a>
  <?php endif ?>
</nav>
      
<?php snippet('footer') ?>