<section class="mt-16 ml-auto w-full max-w-content">
  <header>
    <h1>Last seen Movies</h1>
  </header>
  <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-4 -mt-4">
    <?php foreach ($movies as $movie): ?>
      <div title="<?= $movie['title'] ?> · <?= date('F j, Y', strtotime($movie['date'])) ?>">
        <img class="block rounded-t-md aspect-7/10" src="<?= $movie['poster'] ?>" alt="<?= $movie['title'] ?>">
        <div class="relative flex items-center justify-center dark:bg-blue-100 bg-egg-100 text-center rounded-b-md tracking-widest z-30 h-8 dark:text-egg-200 text-blue-200<?= !$movie['stars'] ? ' text-[12px] uppercase pb-0' : 'pb-1' ?>">
          <?= $movie['stars'] ?: 'not rated' ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>

<section class="mt-16 ml-auto w-full max-w-content">
  <header>
    <h1>Last seen Episodes</h1>
  </header>
  <div class="grid grid-cols-2 gap-2 sm:grid-cols-3 sm:gap-4 -mt-4">
    <?php foreach ($episodes as $episode): ?>
      <div title="<?= $episode['title'] ?> · <?= date('F j, Y', strtotime($episode['date'])) ?>">
        <img class="block rounded-t-md aspect-7/10" src="<?= $episode['poster'] ?>" alt="<?= $episode['title'] ?>">
        <div class="relative flex items-center justify-center dark:bg-blue-100 bg-egg-100 text-center rounded-b-md tracking-widest z-30 h-8 dark:text-egg-200 text-blue-200 text-[16px] uppercase">
          <?= $episode['code'] ?>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</section>