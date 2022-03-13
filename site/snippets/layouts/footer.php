<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>
  </main>
  <footer class="mt-16 text-xs mb-36 sm:mb-8 mx-auto w-full max-w-content flex flex-wrap">
    <span class="after:mx-2 after:text-xs after:content-['|']">Stuff from 2000 to <?= date('Y'); ?></span>
    <span class="after:mx-2 after:text-xs after:content-['|']"><a href="https://github.com/SoaPatrick/kirby-soapatrick/commits/main" target="_blank" >Changelog</a></span>
    <span><a href="<?= page('privacy')->url() ?>">Privacy</a></span>
  </footer>
</div>
<?= vite()->js($entry) ?>
</body>
</html>