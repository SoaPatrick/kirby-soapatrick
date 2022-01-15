<nav class="sub-navigation">
  <?php foreach(page('home')->$subnav()->split($separator = ',') as $article): ?>
      <a href="<?= page($article)->url() ?>" <?php e(page($article)->isOpen(), ' class="active"') ?>><?= $article ?> </a>
  <?php endforeach ?>  
</nav>