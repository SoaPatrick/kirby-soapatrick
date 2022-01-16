<?php
$template = $page->template();
$box = false;
$factory = false;
$patrick = false;

if($template == 'box' || $template == 'article' || $template == 'storage'):
   $box = true;
elseif($template == 'factory' || $template == 'factory-item' || $template == 'lab'):
   $factory = true;
elseif($template == 'patrick' || $template == 'likes' || $template == 'like'):
   $patrick = true;
endif;
?>

<header>
  <nav class="main-navigation">
    <a aria-label="SoaPatrick" href="/" class="logo">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 274.66 314.5">
          <path fill="currentColor" d="M99.39,314.4,175.77,60.64h54.39c15.9,0,27.6,2,34.6,6,6.7,3.8,9.9,10.7,9.9,21,0,8.29-1.9,18.49-5.6,30.39l-14.6,48.59c-3.5,11.4-7.3,21-11.4,28.5a55.09,55.09,0,0,1-14.39,17.5,51.09,51.09,0,0,1-19.8,9.19c-7.7,1.9-17.2,2.8-28.2,2.8h-10.8l-27,89.89h0l-43.49-.1ZM222,132.7c1.37-5.27,4.21-16.67,4.21-19.47,0-3.4-1.1-5.5-3.2-6.4a16.93,16.93,0,0,0-6.2-.9l-11.7.1-20.4,67.89-1.5,5,12.3.1a15.84,15.84,0,0,0,6.9-1.5,14.81,14.81,0,0,0,5.9-5.6c2.89-4.06,5.55-11.69,7.24-17.14C217,150,219.68,141.42,222,132.7Z"></path>
          <path fill="currentColor" d="M86.49,78.09a31.07,31.07,0,0,0,5,17.29,177.31,177.31,0,0,0,10.8,14.1c2.5,3,5.1,6.3,7.8,9.7a76,76,0,0,1,6.9,11.2,74.66,74.66,0,0,1,5.19,13.8,63,63,0,0,1,2.1,16.89,106.54,106.54,0,0,1-1.2,15.2,138.85,138.85,0,0,1-4,17.7,205.56,205.56,0,0,1-12.8,33.49,76,76,0,0,1-15.7,21.3c-5.9,5.3-11.89,8.56-20.6,11.3-14.43,3.76-25.73,3.34-34.89,3s-18.4-2.8-24.4-6.9c-7-4.8-10.5-12.7-10.7-24.3-.1-7.8,1.5-17.59,4.8-29l5.7-19.8H52.3l-3.9,12.8c-1.4,5.4-2.1,9.3-2.1,12.2.1,6.1,3.34,9.46,9.3,9.59,6.14,0,9.33-2.22,12-5.19,2.34-2.7,5.3-8.5,7.6-15.8a55.67,55.67,0,0,0,2.2-14.6c0-7.5-1.8-14.1-5.4-19.4-3.4-5-7.1-10.09-11.2-15.09-2.6-3-5.19-6.3-7.79-9.7a63.23,63.23,0,0,1-6.7-11,65.57,65.57,0,0,1-4.8-13.1,63.82,63.82,0,0,1-1.9-16c0-9.49,1.9-20.59,5.6-33.19a171.38,171.38,0,0,1,11.9-29.7,70.91,70.91,0,0,1,15.49-20A57.13,57.13,0,0,1,93.29,3.6,95.93,95.93,0,0,1,121,0c14.2,0,24.9,2.5,32,7.4,6.9,4.8,10.3,12.8,10.3,24.49,0,7.8-1.8,17.5-5.2,28.9l-6,19.7H110.59l3.8-13.4c1.5-5.3,2.3-9.3,2.3-12.1,0-6.2-3.4-9.7-9.4-9.7a14.65,14.65,0,0,0-11.7,5.4c-2.9,3.4-4.84,8.47-6.39,13.2A44.67,44.67,0,0,0,86.49,78.09Z"></path>
      </svg>
    </a>
    <a class="nav-item sm:before:content-['Soap']<?php e($box, ' active') ?>" aria-label="<?= page('box')->title() ?>" href="<?= page('box')->url() ?>">
      <span class="nav-icon sm:hidden"><?= page('box')->icon() ?></span>
      <span class="hidden sm:inline-block"><?= page('box')->title() ?></span>
    </a>
    <a class="nav-item sm:before:content-['Soap']<?php e($factory, ' active') ?>" aria-label="<?= page('factory')->title() ?>" href="<?= page('factory')->url() ?>">
      <span class="nav-icon sm:hidden"><?= page('factory')->icon() ?></span>
      <span class="hidden sm:inline-block"><?= page('factory')->title() ?></span>
    </a>
    <a class="nav-item sm:before:content-['Soa'] sm:hover:pl-[2.2rem]<?php e($patrick, ' active') ?>" aria-label="<?= page('patrick')->title() ?>" href="<?= page('patrick')->url() ?>">
      <span class="nav-icon sm:hidden"><?= page('patrick')->icon() ?></span>
      <span class="hidden sm:inline-block"><?= page('patrick')->title() ?></span>
    </a>
    <button aria-label="toggle search" class="nav-item sm:before:content-['Soap']" id="searchToggle">
      <span class="hidden sm:inline-block">Search</span>
      <span class="nav-icon sm:hidden">
        <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M507.3 484.7l-141.5-141.5C397 306.8 415.1 259.7 415.1 208c0-114.9-93.13-208-208-208S-.0002 93.13-.0002 208S93.12 416 207.1 416c51.68 0 98.85-18.96 135.2-50.15l141.5 141.5C487.8 510.4 491.9 512 496 512s8.188-1.562 11.31-4.688C513.6 501.1 513.6 490.9 507.3 484.7zM208 384C110.1 384 32 305 32 208S110.1 32 208 32S384 110.1 384 208S305 384 208 384z"></path>
        </svg>
      </span>
    </button>
  </nav>
  <?php
    if($box):
      snippet('layouts/subnavigation', ['subnav' => 'subnavbox']);
    elseif($factory):
      snippet('layouts/subnavigation', ['subnav' => 'subnavfactory']);
    elseif($patrick):
      snippet('layouts/subnavigation', ['subnav' => 'subnavpatrick']);
    endif;
  ?>
</header>