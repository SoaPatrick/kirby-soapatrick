<?php

//https://getkirby.com/docs/cookbook/panel/block-collection

Kirby::plugin('your-project/blocks-factory', [
  'blueprints' => [
    'blocks/box' => __DIR__ . '/blueprints/blocks/box.yml',
    'blocks/statement' => __DIR__ . '/blueprints/blocks/statement.yml',    
    'blocks/video-self' => __DIR__ . '/blueprints/blocks/video-self.yml'
  ],
  'snippets' => [
    'blocks/box' => __DIR__ . '/snippets/blocks/box.php',
    'blocks/statement' => __DIR__ . '/snippets/blocks/statement.php',
    'blocks/video-self' => __DIR__ . '/snippets/blocks/video-self.php'
  ]
]);