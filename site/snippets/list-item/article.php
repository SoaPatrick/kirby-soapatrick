<article class="my-16">
  <header class="relative">
    <div class="marginal-icon mb-2 sm:mb-0 sm:absolute grid place-items-center w-4 h-5 rounded-full bg-primary">
      <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-1/3 h-auto"><path fill="currentColor" d="M493.255 56.236l-37.49-37.49c-24.993-24.993-65.515-24.994-90.51 0L12.838 371.162.151 485.346c-1.698 15.286 11.22 28.203 26.504 26.504l114.184-12.687 352.417-352.417c24.992-24.994 24.992-65.517-.001-90.51zm-95.196 140.45L174 420.745V386h-48v-48H91.255l224.059-224.059 82.745 82.745zM126.147 468.598l-58.995 6.555-30.305-30.305 6.555-58.995L63.255 366H98v48h48v34.745l-19.853 19.853zm344.48-344.48l-49.941 49.941-82.745-82.745 49.941-49.941c12.505-12.505 32.748-12.507 45.255 0l37.49 37.49c12.506 12.506 12.507 32.747 0 45.255z"></path></svg>
    </div>
    <div class="flex">
      <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $article->published()->toDate(DATE_ATOM) ?>">
        <?= $article->published()->toDate('F j, Y') ?>
      </time>
    </div>
    <h1 class="my-2 text-2xl"><a class="dark:text-white text-black" href="<?= $article->url() ?>"><?= $article->title()->html() ?></a></h1>
  </header>
  <div>
    <p class="my-4">
      <?= $article->text()->toBlocks()->excerpt(200) ?> <a href="<?= $article->url() ?>" class="font-serif font-bold">more →</a>
    </p>
  </div>
  <footer>
    <div>
      <?php foreach ($article->tags()->split() as $tag): ?>
        <a class="tag" href="<?= $article->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
</article>