<nav class="sub-navigation">
  <?php foreach(page('home')->$subnav()->toPages() as $article): ?>
      <a href="<?= page($article)->url() ?>" class="bold-link<?php e(page($article)->isOpen(), ' active') ?>"><?= $article ?> </a>
  <?php endforeach ?>  
</nav>