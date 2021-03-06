  <article>
    <header>
      <div class="sm:absolute sm:text-right sm:w-cover sm:right-cover">
        <div class="w-cover h-cover object-cover rounded-full sm:ml-auto bg-egg-100 dark:bg-blue-100 flex items-center justify-center">
          <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-1/3 h-auto"><path fill="currentColor" d="M434.9 410.7L288 218.6V32h26c3.3 0 6-2.7 6-6V6c0-3.3-2.7-6-6-6H134c-3.3 0-6 2.7-6 6v20c0 3.3 2.7 6 6 6h26v186.6L13.1 410.7C-18.6 452.2 11 512 63.1 512h321.8c52.2 0 81.7-59.8 50-101.3zm-50 69.3H63.1c-25.7 0-40.3-29.4-24.6-49.8l150.2-196.5c2.1-2.8 3.3-6.2 3.3-9.7V32h64v192c0 3.5 1.2 6.9 3.3 9.7l150.2 196.5c15.6 20.4 1.2 49.8-24.6 49.8z"></path></svg>
        </div>
      </div>
      <?php snippet('published', ['article' => $article]); ?>
      <p class="mt-0 mb-2 text-2xl">
        <?= $article->cover()->toFile()->caption() ?>
      </p>
    </header>
    <div class="content">
      <figure class="my-4">
        <?php if($image = $article->cover()->toFile()): ?>
          <?php if($article->format() == 'video'): ?>
            <a href="<?= $article->video()->toFile()->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox video-link">
          <?php else: ?>
            <a href="<?= $image->thumb('lightbox-' .$image->extension())->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox">
          <?php endif ?>
            <img 
              class="block w-full h-full object-cover rounded-md" 
              srcset="<?= $image->srcset('img-default-' .$image->extension()); ?>"
              loading="lazy" 
              alt="<?= $article->title()->html() ?>" 
              width="<?= $image->width() ?>" 
              height="<?= $image->height() ?>
            ">
            </a>
        <?php endif ?>
      </figure>
    </div>
  <footer class="bg-egg-100 dark:bg-blue-100 inline-block rounded-md py-1 px-2">
    <div class="tag-list">
      <?php $tags = $article->tags()->split(); ?>
      <?php sort($tags); ?>
      <?php foreach ($tags as $tag): ?>
        <a class="hashtag" href="<?= $article->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
  </article>