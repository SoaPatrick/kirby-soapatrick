<?php snippet('layouts/header') ?>

<header>
  <h1><?= $page->title() ?></h1>
</header>

<?php snippet('layouts/subnavigation', ['subnav' => 'subnavbox']) ?>
<?php snippet('layouts/footer') ?>