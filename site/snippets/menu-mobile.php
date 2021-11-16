<div class="fixed z-50 bottom-0 left-0 right-0 text-white bounce sm:hidden flex flex-col" id="drag">
  <div class="m-0 h-20 text-center bg-primary text-base">
    <div id="drag-handle" class="absolute w-full text-center p-4 pb-6">
      drag up!
    </div>
  </div>
  <div class="bg-primary flex-1">
    <nav id="nav" class="h-full justify-center items-center -mt-20">
      <a href="<?= page('home')->url() ?>" <?php e($page->isHomePage(), 'class="active"') ?>>Home</a>
      <?php foreach($site->children()->listed() as $child): ?>
        <a <?php e($child->isActive(), 'class="active"') ?>href="<?= $child->url() ?>"><?= $child->title() ?></a>
      <?php endforeach ?>
      <span>Search</span>
    </nav>
  </div>
</div>
<form id="nav-search" action="<?= page('search')->url() ?>" method="get" class="px-8 py-16 fixed w-full top-16 z-50">
  <label for="search-collapse__input">
    <input type="text" name="q" id="nav-search__input" value="<?php echo get('s'); ?>" placeholder="Find Stuff..." aria-label="Find my Stuff..." tabindex="-1" class="w-full shadow-none border-none rounded-full text-2xl px-6 py-3 font-normal text-black bg-black-10 focus:outline-none placeholder-black placeholder-opacity-50">
  </label>
</form>  
  