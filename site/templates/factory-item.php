<?php snippet('header') ?>
<?php snippet('breadcrumb') ?>
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


  <?php $articles = $site->index()->filterBy('template', 'article')->filterBy('project', $page->uri(), ','); ?>
  <?php if ($articles->isNotEmpty()): ?>
    <h2>Related Posts</h2>
    <?php foreach($articles as $article): ?>
      <?php snippet('list-item--article', ['article' => $article]) ?>
    <?php endforeach ?>
  <?php endif ?>



  <?php $labs = $site->index()->filterBy('template', 'lab-item')->filterBy('project', $page->uri(), ','); ?>
  <?php if ($labs->isNotEmpty()): ?>
    <h2>Related Lab Items</h2>
    <div class="grid-lab">
      <?php foreach($labs as $article): ?>
        <?php if($image = $article->cover()->toFile()): ?>
          <article>
            <?php if($article->format() == 'video'): ?>
              <a href="<?= $article->video()->toFile()->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox>
            <?php else: ?>
              <a href="<?= $image->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox>
            <?php endif ?>
            <?php $img_resize = $image->resize(390); ?>
            <img class="block w-full h-full object-cover rounded-md" src="<?= $img_resize->url() ?>" loading="lazy" alt="<?= $article->title()->html() ?>" width="<?= $img_resize->width() ?>" height="<?= $img_resize->height() ?>">
            </a>
          </article>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  <?php endif ?>


<?php snippet('footer') ?>