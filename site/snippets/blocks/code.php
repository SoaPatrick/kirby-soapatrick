<?php

/** @var \Kirby\Cms\Block $block */ 
?>
<pre class="code-block"><div class="code-block__language"><?= $block->language()->or('text') ?></div><code class="language-<?= $block->language()->or('text') ?>"><?= $block->code()->html(false) ?></code></pre>