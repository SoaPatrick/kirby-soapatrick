<article>
  <header>
    <div class="sm:absolute sm:text-right sm:w-cover sm:right-cover">
      <div class="w-cover h-cover object-cover rounded-full sm:ml-auto bg-egg-100 dark:bg-blue-100 flex items-center justify-center">
        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-1/3 h-auto"><path fill="currentColor" d="M404 384h-40c-6.627 0-12-5.373-12-12v-40c0-6.627 5.373-12 12-12h40c6.627 0 12 5.373 12 12v40c0 6.627-5.373 12-12 12zm-116-12v-40c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12zm-128 0v-40c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12zm352-188v272c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h80c13.255 0 24 10.745 24 24v185.167l157.267-78.633C301.052 154.641 320 165.993 320 184v57.167l157.267-78.633C493.052 154.641 512 165.993 512 184zM96 280V64H32v384h448V196.944l-180.422 90.211C294.268 289.81 288 285.949 288 280v-83.056l-180.422 90.211C102.269 289.811 96 285.947 96 280z"></path></svg>
      </div>
    </div>
    <?php snippet('published', ['article' => $article]); ?>
    <h2 class="mt-0 mb-2">
      <a class="bold-link" href="<?= $article->url() ?>">
        <?= $article->title()->html() ?>
      </a>
    </h2>
  </header>
  <div class="content-list">
    <?= $article->text()->toBlocks()->first() ?>
  </div>
  <footer class="bg-egg-100 dark:bg-blue-100 inline-block rounded-md py-1 px-2">
    <div class="tag-list">
      <?php $tags = $article->tags()->split(); ?>
      <?php sort($tags); ?>
      <?php foreach ($tags as $tag): ?>
        <a class="hashtag" href="<?= $article->parent()->url(['params' => ['tag' => str_replace(' ', '-', $tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
</article>