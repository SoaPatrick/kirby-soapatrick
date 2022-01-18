<?php snippet('layouts/header') ?>

<header>
  <h1><?= $page->title() ?></h1>
  <p class="text-lg"><?= $page->description() ?></p>
</header>
<div class="content">
  <div class="grid grid-cols-storage gap-4">
    <?php
      $callbackYear = function($p) {
        return $p->published()->toDate('Y');
      };
      $callbackMonth = function($p) {
        return $p->published()->toDate('F');
      };
      $articles = page('box')->children()->listed()->flip();
      $groupsYear = $articles->group($callbackYear);
      foreach($groupsYear as $year => $listYear): 
        ?>
          <div>
            <h2 class="mt-0"><?= $year ?></h2>
            <nav class="flex flex-col items-start mb-12">
              <?php 
                $groupsMonth = $listYear->group($callbackMonth);
                foreach($groupsMonth as $month => $listMonth):
                  $month = ucfirst($month);
                  ?>
                    <a href="<?= page('box')->url(); ?>/storage:<?= $month ?>+<?= $year ?>"><?= $month ?> <span class="text-xs text-cyan-35 dark:text-cyan-62">(<?= $listMonth->count() ?>)</span></a>
                  <?php 
                endforeach;
              ?>
            </nav>
          </div>
        <?php
      endforeach
    ?>
  </div>

  <?php 
    $posts = page('box')->children()->listed();
    $tags = page('box')->children()->listed()->pluck('tags', ',', true); 
    $tags = new Collection($tags);
    $tags = $tags->sortBy('name', 'desc')
  ?>
  <div class="bg-egg-100 dark:bg-blue-100 rounded-md p-4 mt-8">
    <div class="text-xs opacity-70 mb-2">Tag-Cloud</div>
    <div class="tag-list">
      <?php foreach($tags as $tag): ?>
        <a class="hashtag" href="<?= url(page('box')->url(), ['params' => ['tag' => $tag]]) ?>">
          <?= html($tag) ?> <span class="text-xs text-cyan-35 dark:text-cyan-62">(<?= $posts->filterBy('tags', $tag, ',')->count() ?>)</span>
        </a>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php snippet('layouts/footer') ?>