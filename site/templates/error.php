<?php snippet('layouts/header') ?>
<article>
  <header>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?= markdown($page->text()->kt()) ?>
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
</article>

<?php snippet('layouts/footer') ?>
