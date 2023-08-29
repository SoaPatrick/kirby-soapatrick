<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($video = video($block->url())): ?>
  <figure class="video-block my-8 align-<?= $block->align() ?>">
    <?php if($page->intendedTemplate() == 'feed' ): ?>
      <div class="relative w-full aspect-video cursor-pointer">
        <?= $video ?>
      </div>
    <?php else: ?>
      <div class="relative">
        <div
          class="lazyframe relative w-full aspect-video bg-cover bg-center bg-no-repeat flex justify-center items-center rounded-md cursor-pointer"
          <?php if(strpos($block->url(),'youtube')): ?>
            data-vendor="youtube"
          <?php else: ?>
            data-vendor="vimeo"
          <?php endif; ?>
          data-src="<?= $block->url() ?>"
        >
          <button type="button" class="w-16" aria-label="Play Video"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle class="fill-primary opacity-70 transition-opacity duration-300" cx="256" cy="256" r="256"></circle><path class="fill-egg-200" d="M371.91,244.63,198.36,144.43a13.69,13.69,0,0,0-20.54,11.86v200.4a13.69,13.69,0,0,0,20.54,11.86l173.55-100.2A13.69,13.69,0,0,0,371.91,244.63Z"></path></svg></button>
        </div>
        <div class="mt-2 sm:mt-0 sm:absolute flex bg-blue-100 text-egg-200 dark:bg-egg-200 dark:text-blue-100 bottom-0 sm:bottom-2 left-0 sm:left-2 right-0 sm:right-2 px-2 sm:px-4 p-4 text-xs sm:text-sm rounded-md leading-tight sm:leading-normal gap-2 sm:gap-4 dark:drop-shadow-[0_0_0.5rem_rgba(0,0,0,0.25)] drop-shadow-[0_0_2rem_rgba(255,255,255,0.25)]">
          <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 17q.425 0 .713-.288T13 16v-4q0-.425-.288-.713T12 11q-.425 0-.713.288T11 12v4q0 .425.288.713T12 17Zm0-8q.425 0 .713-.288T13 8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8q0 .425.288.713T12 9Zm0 12.9q-.175 0-.325-.025t-.3-.075Q8 20.675 6 17.637T4 11.1V6.375q0-.625.363-1.125t.937-.725l6-2.25q.35-.125.7-.125t.7.125l6 2.25q.575.225.938.725T20 6.375V11.1q0 3.5-2 6.538T12.625 21.8q-.15.05-.3.075T12 21.9Zm0-2q2.6-.825 4.3-3.3t1.7-5.5V6.375l-6-2.25l-6 2.25V11.1q0 3.025 1.7 5.5t4.3 3.3Zm0-7.9Z"/></svg>
          </div>
          <span>
            By clicking on the video, I agree to external content being displayed to me. This may transmit personal data to third-party platforms. <a href="/privacy">Read more in my privacy policy.</a>
          </span>
        </div>
      </div>
    <?php endif; ?>
    <?php if ($block->caption()->isNotEmpty()): ?>
      <figcaption><?= $block->caption() ?></figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>