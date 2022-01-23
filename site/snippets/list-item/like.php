<article>
  <header class="mb-2">
    <div class="sm:absolute sm:text-right sm:w-cover sm:right-cover">
      <div class="w-cover h-cover object-cover rounded-full sm:ml-auto bg-egg-100 dark:bg-blue-100 flex items-center justify-center">
        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-1/3 h-auto"><path fill="currentColor" d="M462.3 62.7c-54.5-46.4-136-38.7-186.6 13.5L256 96.6l-19.7-20.3C195.5 34.1 113.2 8.7 49.7 62.7c-62.8 53.6-66.1 149.8-9.9 207.8l193.5 199.8c6.2 6.4 14.4 9.7 22.6 9.7 8.2 0 16.4-3.2 22.6-9.7L472 270.5c56.4-58 53.1-154.2-9.7-207.8zm-13.1 185.6L256.4 448.1 62.8 248.3c-38.4-39.6-46.4-115.1 7.7-161.2 54.8-46.8 119.2-12.9 142.8 11.5l42.7 44.1 42.7-44.1c23.2-24 88.2-58 142.8-11.5 54 46 46.1 121.5 7.7 161.2z" class=""></path></svg>
      </div>
    </div>
    <?php snippet('published', ['article' => $article]); ?>
    <?php snippet('edit-page', ['page' => $article]); ?>
    <h2 class="mt-0 mb-2">
      <a class="bold-link" href="<?= $article->url() ?>">
        <?= $article->title()->html() ?>
      </a>
    </h2>
  </header>
  <div class="my-4">
    <div class="grid sm:grid-cols-4 gap-4 items-start">
      <?php if($image = $article->cover()->toFile()): ?>
        <img 
          srcset="<?= $image->srcset('img-wide-' . $image->extension() ); ?>"
          type="image/webp"
          class="rounded-md w-[33vw]"
          alt="<?= $page->title()->html() ?>" 
          width="<?= $image->width() ?>"
          height="<?= $image->height() ?>"
          loading="lazy">
      <?php endif ?>
      <div class="sm:col-span-3">
        <span class="text-xs font-bold">
          By <?= $article->from() ?> in <?= $article->released() ?>
        </span>
        <p class="my-0">
          <?= $article->text()->toBlocks()->excerpt(200) ?> <a href="<?= $article->url() ?>" class="bold-link whitespace-nowrap">more →</a>
        </p>
      </div>
    </div>
  </div>
  <footer class="bg-egg-100 dark:bg-blue-100 inline-block rounded-md py-1 px-2">
    <div class="tag-list">
      <?php $tags = $article->tags()->split(); ?>
      <?php sort($tags); ?>
      <?php foreach ($tags as $tag): ?>
        <a class="hashtag" href="<?= $article->parent()->url(['params' => ['category' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
</article>