<?php

/** @var \Kirby\Cms\Block $block */ 
?>
<div class="code-block">
  <div class="code-block__language"><?= $block->language()->or('text') ?></div>
  <pre><code class="language-<?= $block->language()->or('text') ?>"><?= $block->code()->html(false) ?></code></pre>
</div>