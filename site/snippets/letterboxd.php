<section class="mt-16 ml-auto w-full max-w-content letterboxd">
  <header>
    <h1>Last seen Movies</h1>
  </header>
  <div class="grid grid-cols-3 gap-4">
    <?php $movies = page('movies')->children()->limit(6); ?>
    <?php if ($movies->count() > 0): ?>
      <?php foreach ($movies as $item): ?>
        <?php
          $title = $item->title();
          $description = str_replace( '<img ', '<img alt="'.$title.'" height="750" width="500" loading="lazy" class="block rounded-t-md"', $item->description() );
          $titleParts = explode( ' ', $title );
          $titlePartsLength = sizeof($titleParts);
          $rating = $titleParts[$titlePartsLength - 1];
        ?>
        <a href="<?= $item->link() ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= $title; ?>" class="img-link img-link--external relative inline-block p-0 m-0 decoration-transparent">
          <div><?= $description ?></div>
          <span class="relative bg-blue-100 block text-center pb-1 rounded-b-md tracking-widest z-30 text-egg-200"><?= $rating ?></span>
        </a>
      <?php endforeach ?>
    <?php else: ?>
      <p>No movies found</p>
    <?php endif ?>
  </div>
</section>