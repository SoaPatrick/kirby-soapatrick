<nav class="sub-navigation">
  <?php foreach(page('home')->$subnav()->split($separator = ',') as $article): ?>
      <a href="<?= page($article)->url() ?>" class="bold-link<?php e(page($article)->isOpen(), ' active') ?>"><?= $article ?> </a>
  <?php endforeach ?>  
</nav>