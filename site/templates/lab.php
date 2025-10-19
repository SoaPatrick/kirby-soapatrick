<?php snippet('layouts/header',['entry' => 'lab']) ?>

<header>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
</header>
<div id="lab"></div>

<?php snippet('layouts/footer',['entry' => 'factory']) ?>
