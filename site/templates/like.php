<?php snippet('header') ?>
<article>
  <header>
    <div>
      <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $page->published()->toDate(DATE_ATOM) ?>">
        <?= $page->published()->toDate('F j, Y') ?>
      </time>
      <?php if ($kirby->user()): ?>
        <span class="text-xs"><span class="inline-block mx-2 opacity-50">/</span><a class="text-xs" href="<?= $page->panelUrl() ?>" target="_blank">Edit</a></span>
      <?php endif ?>    </div>
    <h1><?= $page->title() ?></h1>
  </header>
  <?php if($image = $page->cover()->toFile()): ?>
    <?php $img_resize = $image->resize(400); ?>
    <img class="block rounded-md" src="<?= $img_resize->url() ?>" loading="lazy" alt="<?= $page->title()->html() ?>" width="<?= $img_resize->width() ?>" height="<?= $img_resize->height() ?>">
  <?php endif ?>
</article>

<?php snippet('pagination-single', ['page' => $page]) ?>
<?php snippet('subnavigation', ['subnav' => 'subnavpatrick']) ?>
<?php snippet('footer') ?>