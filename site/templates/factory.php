<?php snippet('layouts/header',['entry' => 'factory']) ?>

<header>
  <h1><?= $page->title() ?></h1>
  <p class="text-lg"><?= $page->description() ?></p>
</header>
<div id="factory"></div>

<?php snippet('layouts/footer',['entry' => 'factory']) ?>
