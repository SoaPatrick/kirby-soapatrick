<?php snippet('header') ?>
<h1><?= $page->title() ?></h1>
<ul>
  <?php foreach($page->children()->listed() as $article): ?>

  <article>
    <h2><?= $article->title()->html() ?></h2>
    <a href="<?= $article->url() ?>">Read more…</a>
  </article>

  <?php endforeach ?>
</ul>
<?php snippet('footer') ?>
