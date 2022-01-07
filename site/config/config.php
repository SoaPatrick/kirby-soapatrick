<?php

return [
  'debug' => true,
  'optionApiUrl' => 'https://kirby.soapatrick.com/api/',
  'panel' => [
    'slug' => 'yygang',
    'css' => 'assets/css/custom-panel.css',
    'favicon' => [
      'apple-touch-icon' => [
        'type' => 'image/png',
        'url'  =>  'assets/img/apple-touch-icon.png',
      ],
      'shortcut icon' => [
        'type' => 'image/svg+xml',
        'url'  => 'assets/img/icon.svg',
      ]
    ]
  ],
  'routes' => [
    [
      'pattern' => 'sitemap.xml',
      'action'  => function() {
          $pages = site()->pages()->index();

          // fetch the pages to ignore from the config settings,
          // if nothing is set, we ignore the error page
          $ignore = kirby()->option('sitemap.ignore', ['error']);
          $log = page('log')->children()->pluck('id', ',');
          $lab = page('lab')->children()->pluck('id', ',');
          $lab = page('movies')->children()->pluck('id', ',');
          $ignore = array_merge($ignore, $log, $lab);

          $content = snippet('sitemap', compact('pages', 'ignore'), true);

          return new Kirby\Cms\Response($content, 'application/xml');
      }
    ],
    [
      'pattern' => 'sitemap',
      'action'  => function() {
        return go('sitemap.xml', 301);
      }
    ]
  ],
  'sitemap.ignore' => ['log', 'factory', 'box', 'movies'],
];