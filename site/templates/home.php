<?php snippet('header'); ?>
<header class="mt-4 mb-16">
  <img src="<?= $site->url(); ?>/assets/img/patrick3.jpg?_t=20210911" alt="Patrick" width="400" height="400" class="text-center mx-auto rounded-full text-center w-32">
  <h1 class="text-center">Soa<span class="relative top-2">Patrick</span></h1>
  <p class="text-center text-lg">
    Welcome to my small nook of <strong>space-consuming</strong> bullshit where I babble about all kinds of stuff that interests me.
  </p>
</header>

<?php
  $boxItems = page('box')->children()->sortBy('published', 'desc')->limit(5);
  $factoryItems = page('factory')->children()->sortBy('published', 'desc')->limit(5);
  $labItems = page('lab')->children()->sortBy('published', 'desc')->limit(5);
  $latestContent = new Collection();
  $latestContent->add($boxItems);
  $latestContent->add($factoryItems);
  $latestContent->add($labItems);
?>
<?php 
  foreach($latestContent->sortBy('published', 'desc')->limit(5) as $article):
    switch($article->parent()) {
      case 'lab':
        snippet('list-item--lab-item', ['article' => $article]);
        break;
      case 'factory':
        snippet('list-item--factory-item', ['article' => $article]);
        break;
      default:
        snippet('list-item--article', ['article' => $article]);
    }
  endforeach 
?>

<?php snippet('footer'); ?>