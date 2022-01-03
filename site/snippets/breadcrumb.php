<?php if($page->template() != 'home'): ?>
  <nav class="breadcrumb flex flex-wrap text-sm my-8" aria-label="breadcrumb">
    <?php if (empty(param('tag') || param('category'))): ?>

      <?php foreach($site->breadcrumb() as $crumb): ?>
        <?php if(!$crumb->isActive()): ?>
          <span>
            <a href="<?= $crumb->url() ?>">
              <?= html($crumb->title()) ?>
            </a>
          </span>
        <?php else: ?>
          <?= html($crumb->title()) ?>
        <?php endif ?>
      <?php endforeach ?>

    <?php else: ?>

      <?php foreach($site->breadcrumb() as $crumb): ?>
        <span>
          <a href="<?= $crumb->url() ?>">
            <?= html($crumb->title()) ?>
          </a>
        </span>
      <?php endforeach ?>
      <?= html(urldecode(param('tag'))) ?>
      <?= html(urldecode(param('category'))) ?>
      
    <?php endif ?>
  </nav>
<?php endif ?>