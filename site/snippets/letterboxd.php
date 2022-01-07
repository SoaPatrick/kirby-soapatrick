<section>
  <header>
    <h1>Last seen Movies</h1>
  </header>
  <div class="letterboxd">
    <?php foreach (page('movies')->children()->limit(4) as $item): ?>
      <?php
    $title = $item->title();
    $description = str_replace( '<img ', '<img alt="'.$title.'" height="750" width="500" loading="lazy"', $item->description() );
    $titleParts = explode( ' ', $title );
    $titlePartsLength = sizeof($titleParts);
    $rating = $titleParts[$titlePartsLength - 1];
    ?>
  <div>
    <a href="<?= $item->link() ?>" target="_blank" rel="noreferrer" aria-label="<?= $title; ?>">
      <div><?= $description ?></div>
      <span><?= $rating ?></span>
    </a>
  </div>
  <?php endforeach ?>
</div>
</section>