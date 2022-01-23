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
          $unlisted_factory_items = page('factory')->children()->unlisted()->pluck('id', ',');
          $movies = page('movies')->children()->pluck('id', ',');
          $ignore = array_merge($ignore, $log, $lab, $unlisted_factory_items, $movies);

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
  'thumbs' => [
    'srcsets' => [
      'cover-home' => [
        '1x' => ['width' => 200,'height' => 200,'quality' => 80,'format' => 'webp','crop' => 'center'],
        '2x' => ['width' => 400,'height' => 400,'quality' => 80,'format' => 'webp','crop' => 'center']
      ],
      'cover-list-jpg' => [
        '1x' => ['width' => 120, 'quality' => 80,'format' => 'webp'],
        '2x' => ['width' => 240, 'quality' => 80,'format' => 'webp']
      ],
      'cover-list-png' => [
        '1x' => ['width' => 120, 'quality' => 100,'format' => 'webp'],
        '2x' => ['width' => 240, 'quality' => 100,'format' => 'webp']
      ],
      'cover-default-jpg' => [
        '1x' => ['width' => 320, 'quality' => 80,'format' => 'webp'],
        '2x' => ['width' => 640, 'quality' => 80,'format' => 'webp']
      ],
      'cover-default-png' => [
        '1x' => ['width' => 320, 'quality' => 100,'format' => 'webp'],
        '2x' => ['width' => 640, 'quality' => 100,'format' => 'webp']
      ],
      'img-wide-jpg' => [
        '1x' => ['width' => 1200, 'quality' => 80,'format' => 'webp'],
        '2x' => ['width' => 2400, 'quality' => 80,'format' => 'webp']
      ],
      'img-wide-png' => [
        '1x' => ['width' => 1200, 'quality' => 100,'format' => 'webp'],
        '2x' => ['width' => 2400, 'quality' => 100,'format' => 'webp']
      ],
      'img-default-jpg' => [
        '1x' => ['width' => 850, 'quality' => 80,'format' => 'webp'],
        '2x' => ['width' => 1700, 'quality' => 80,'format' => 'webp']
      ],
      'img-default-png' => [
        '1x' => ['width' => 850, 'quality' => 100,'format' => 'webp'],
        '2x' => ['width' => 1700, 'quality' => 100,'format' => 'webp']
      ]
    ]
  ]
];