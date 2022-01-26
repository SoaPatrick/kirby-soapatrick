<?php
  $query = get('q');
  $boxItems = page('box')->children();
  $factoryItems = page('factory')->children();
  $labItems = page('lab')->children();
  $likes = page('likes')->children();
  $patrick = page('patrick');
  $content = new Collection();
  $content->add($boxItems);
  $content->add($factoryItems);
  $content->add($labItems);
  $content->add($likes);
  $content->add($patrick);
  $articles = $content->search($query, 'title|text|tags')->paginate(10);
?>

<?php snippet('layouts/header'); ?>

<?php if($articles->isNotEmpty()): ?>
  <header class="mb-16">
    <h1><?= $page->results_title() ?> <span class="text-primary"><?= $query ?></span></h1>
  </header>
  <div class="content--articles">
    <?php foreach($articles as $article): ?>
        <?php snippet('list-item/' . $article->intendedTemplate(), ['article' => $article]); ?>
    <?php endforeach ?>
  </div>
  <?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php else: ?>
  <header class="mb-4">
    <h1><?= $page->noresults_title() ?></h1>
  </header>
  <div class="content">
    <?= $page->noresults_text()->kt() ?>
    <form action="<?= page('search')->url() ?>" method="get" class="py-4">
      <label for="search-collapse__input">
        <input type="text" name="q" id="search-collapse__input" value="<?php echo get('s'); ?>" placeholder="Find Stuff..." aria-label="Find Stuff..." tabindex="-1" class="w-full shadow-none border-none rounded-full text-2xl px-6 py-3 font-normal focus:outline-none placeholder-opacity-50 bg-egg-100 dark:bg-blue-100 text-blue-100 dark:text-egg-200">
      </label>
    </form>
    <h2>Recent Posts</h2>
    <?php $articles = page('box')->children()->sortBy('published', 'desc')->listed()->limit(5); ?>
    <ul>
      <?php foreach($articles as $article): ?>
        <li><a href="<?= $article->url() ?>"><?= $article->title() ?></a></li>
      <?php endforeach ?>
    </ul>    
  </div>
<?php endif ?>

<?php snippet('layouts/footer'); ?>