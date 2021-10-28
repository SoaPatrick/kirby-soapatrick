<?php
  $query = get('q');
  $results = $site->search($query, 'title|text');
?>


<?php snippet('header'); ?>
  <?php if($results->isNotEmpty()): ?>
  <h1><?= $page->title() ?>: <?= $query ?></h1>
  <ul>
    <?php foreach($site->search(get('q'),'title|text|tags') as $article): ?>
      <li>
        <a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a>
      </li>
    <?php endforeach ?>
  </ul>
<?php else: ?>
  <h1>Nothing found</h1>
<?php endif ?>

<?php snippet('footer'); ?>