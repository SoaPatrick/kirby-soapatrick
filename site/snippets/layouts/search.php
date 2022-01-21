<div class="search-panel bg-primary max-h-0 overflow-hidden transition-height duration-300 ease-in-out relative z-50" id="search-collapse">
  <form action="<?= page('search')->url() ?>" method="get" class="mx-auto px-4 py-16 max-w-widest">
    <label for="search-collapse__input">
      <input type="text" name="q" id="search-collapse__input" value="<?php echo get('s'); ?>" placeholder="Find Stuff..." aria-label="Find Stuff..." tabindex="-1" class="w-full shadow-none border-none rounded-full text-2xl px-6 py-3 font-normal focus:outline-none placeholder-opacity-50 bg-egg-200 text-blue-100">
    </label>
  </form>
</div>