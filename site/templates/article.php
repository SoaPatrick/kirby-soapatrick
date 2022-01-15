<?php snippet('header') ?>
<article>
  <header class="mb-4">
    <?php snippet('featured-img', ['article' => $page]) ?>
    <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $page->published()->toDate(DATE_ATOM) ?>">
      <?= $page->published()->toDate('F j, Y') ?>
    </time>
    <?php if ($kirby->user()): ?>
      <span class="text-xs"><span class="inline-block mx-2 opacity-50">/</span><a class="text-xs" href="<?= $page->panelUrl() ?>" target="_blank"><svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-3 h-3 inline-block"><path fill="currentColor" d="M493.255 56.236l-37.49-37.49c-24.993-24.993-65.515-24.994-90.51 0L12.838 371.162.151 485.346c-1.698 15.286 11.22 28.203 26.504 26.504l114.184-12.687 352.417-352.417c24.992-24.994 24.992-65.517-.001-90.51zm-95.196 140.45L174 420.745V386h-48v-48H91.255l224.059-224.059 82.745 82.745zM126.147 468.598l-58.995 6.555-30.305-30.305 6.555-58.995L63.255 366H98v48h48v34.745l-19.853 19.853zm344.48-344.48l-49.941 49.941-82.745-82.745 49.941-49.941c12.505-12.505 32.748-12.507 45.255 0l37.49 37.49c12.506 12.506 12.507 32.747 0 45.255z"></path></svg></a></span>
      <?php endif ?>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?php foreach ($page->text()->toBlocks() as $block): ?>
      <?= $block ?>
    <?php endforeach ?>
  </div>
  <footer>
    <div class="bg-egg-100 dark:bg-blue-100 rounded-md p-4 mt-8">
      <div class="text-xs opacity-70 mb-2">Tagged in</div>
      <div class="tag-list">
        <?php foreach ($page->tags()->split() as $tag): ?>
          <a class="hashtag" href="<?= $page->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
        <?php endforeach ?>
      </div>
    </div>
  </footer>
</article>

<?php snippet('pagination-single', ['page' => $page]) ?>
<?php snippet('subnavigation', ['subnav' => 'subnavbox']) ?>
<?php snippet('footer') ?>