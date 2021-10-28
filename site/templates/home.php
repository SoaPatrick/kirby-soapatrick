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
<?php foreach($latestContent->sortBy('published', 'desc')->limit(5) as $article): ?>
  <article>
    <header>
      <div>
        <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $page->published()->toDate(DATE_ATOM) ?>">
          <?= $article->published()->toDate('F j, Y') ?>
        </time>
      </div>
      <a href="<?= $article->url() ?>">
        <h2 class="mt-0"><?= $article->title()->html() ?></h2>
      </a>
      <span class="text-xs opacity-75 mb-8 block -mt-4"><?php
        switch($article->parent()) {
          case 'lab':
            echo 'this is a lab item';
            break;
          case 'factory':
            echo 'this is a factory item';
            break;
          default:
            echo 'this is a blog item';
        }
      ?></span>
    </header>
  </article>
<?php endforeach ?>

<?php snippet('footer'); ?>