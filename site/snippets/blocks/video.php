<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($video = video($block->url())): ?>
  <figure class="video-block my-8 cursor-pointer align-<?= $block->align() ?>">
    <?php if($page->intendedTemplate() == 'feed' ): ?>
      <div class="relative w-full aspect-video">
        <?= $video ?>
      </div>
    <?php else: ?>
      <div
        class="lazyframe relative w-full aspect-video bg-cover bg-center bg-no-repeat flex justify-center items-center rounded-md"
        <?php if(strpos($block->url(),'youtube')): ?>
          data-vendor="youtube"
        <?php else: ?>
          data-vendor="vimeo"
        <?php endif; ?>
        data-src="<?= $block->url() ?>"
      >
        <button type="button" class="w-16" aria-label="Play Video"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle class="fill-primary opacity-70 transition-opacity duration-300" cx="256" cy="256" r="256"></circle><path class="fill-egg-200" d="M371.91,244.63,198.36,144.43a13.69,13.69,0,0,0-20.54,11.86v200.4a13.69,13.69,0,0,0,20.54,11.86l173.55-100.2A13.69,13.69,0,0,0,371.91,244.63Z"></path></svg></button>
      </div>
    <?php endif; ?>
    <?php if ($block->caption()->isNotEmpty()): ?>
    <figcaption><?= $block->caption() ?></figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>